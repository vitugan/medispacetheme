# Design: pen.dev → WordPress FSE pattern/template-part skill

## Summary

This document defines a Claude Code skill, **`pen-to-fse`**, that converts one section of a
pen.dev (Pencil) design into a ready WordPress FSE (block theme) file for the **medispace**
theme — either a block pattern (`inc/patterns/<flow>/<slug>.php`) or a template part
(`parts/<slug>.html`), plus any design tokens the section genuinely needs.

The skill reads the section either from a live Pencil MCP connection or from a pasted,
already-exported node-tree JSON. It writes the block markup by judgement against a
node-to-block mapping table (not a mechanical 1:1 converter), presents a compact
"design node → chosen block" outline for approval *before* writing anything, then writes the
file and runs a shipped Node validator over the result. Registration of new patterns is
automatic (a one-time glob-based change to `inc/block-patterns.php`, made as part of this
plan, replaces the theme's current hand-maintained pattern list).

Two flows exist in this theme today — **medical** and **construction** — each with its own
style variation (`styles/flow-3-medical.json`, `styles/flow-2-construction.json`) holding
colors and font families, while spacing and font sizes are shared in the root `theme.json`.
The skill always works within one flow at a time and never invents new tokens — it reuses
the nearest existing one from the correct file for that flow.

## Terms

- **section** — one top-level band of a pen.dev design (hero, features, testimonials) that
  becomes exactly one WordPress output file.
  *Avoid:* screen, page, frame.
- **flow** — a medispace design variant, currently `medical` or `construction`, each with its
  own style variation JSON, header/footer template parts, and pattern folder.
  *Avoid:* theme, variant, skin.
- **pattern file** — `inc/patterns/<flow>/<slug>.php` returning
  `['title' => .., 'categories' => .., 'content' => ..]`, picked up automatically by a glob
  in `inc/block-patterns.php`.
  *Avoid:* template, partial.
- **token** — a preset value reachable as `var:preset|...` — colors and font families come
  from the flow's own style variation file, font sizes and spacing sizes come from the shared
  root `theme.json`.
  *Avoid:* variable, CSS var.
- **escape hatch** — the route taken when a design node has no clean core-block equivalent: a
  `.medispace-*` class plus a rule in `assets/css/patterns.css`, reached only after native
  block supports and a wrapping group have both been tried and failed.
  *Avoid:* hack, workaround.

## Why

The user wants to turn pen.dev design sections into working WordPress FSE output for this
theme without hand-transcribing block markup each time, while keeping the result
indistinguishable from what's already in the codebase: valid, escaped, token-driven, and
registered the way the theme already registers things. The brief specifically named the
places this tends to go wrong — telling a pattern from a template part, mapping design intent
to the right core block (not just visually similar markup), tokens vs. hand-written CSS,
naming, responsiveness, image handling, and design nodes with no block equivalent — and asked
that the skill be grilled on exactly those points before anything was built.

## Locked decisions

**Q1 — Pattern registration.** New pattern files are picked up automatically: `inc/block-patterns.php`
is changed once, from a hand-maintained `$block_patterns` array to a glob over
`inc/patterns/*/*.php`. After that one-time change, the skill only ever writes one new file
per section — no shared registry file to edit or forget.
*Rejected:* Keep the hand-maintained list and have the skill edit it every run — honest to
the current code, but makes every run touch a shared file two runs could conflict over, and a
missed line means a pattern that silently doesn't exist. Move to WordPress-standard
header-comment auto-registration in `patterns/*.php` — the cleanest long-term answer, but it
strands the two existing patterns and their PHP-built image URLs until a separate migration.

**Q2 — Pattern vs. template part.** Zero guessing from content: the skill never infers
template-part-vs-pattern from a section's name. It is either told explicitly in the
invocation, or (per Q5) defaults to pattern when nothing is said.
*Rejected:* A name-based rule (header/footer/nav → template part) — correct most of the time,
but still a silent guess for the cases where it isn't.

**Q3 — How the conversion actually happens.** Hybrid: the agent writes the block tree by
judgement, guided by a node-to-block mapping table in the skill, then a shipped validator
script checks the mechanical parts of the result (see Q10).
*Rejected:* Instructions-only, no validator — leaves exactly the attribute/serialized-HTML
mirroring bugs that are easy to get subtly wrong on a deeply nested group. A pure converter
script with no judgement — pen layout is intent-free (a row of three cards could be columns,
a grid, or a flexed group), so a mechanical converter produces technically valid markup
nobody actually wants.

**Q6 — Pre-generation approval.** Before any file is written, the skill shows a compact outline
— one line per design node mapping to its chosen block (e.g. *"Row of 3 cards → core/columns,
each card → core/group with core/heading + core/paragraph + core/button"*) — and only writes
the file after that's approved or corrected.
*Rejected:* Showing the full generated markup for review instead of an outline — buries the one
decision that matters (which block for which node) inside hundreds of lines of
comment-mirrored HTML. No preview step at all — skips the checkpoint entirely.

**Q7 — Escape-hatch escalation order.** When a design node has no clean block equivalent, the
skill escalates in order: (1) try native block supports (`style.spacing`/`border`/`typography`/
`color` attributes), (2) then a wrapping `core/group` with an inline style, (3) only as a last
resort, a `.medispace-<section>-<element>` class plus a new rule in `assets/css/patterns.css`.
Every case that reaches step 3 is called out explicitly in the Q6 outline.
*Rejected:* Skipping straight to custom CSS for anything not an exact 1:1 mapping — would have
turned the existing hero's plain border-radius and padding (both ordinary block supports) into
needless custom CSS. Stopping to ask the user for every node with no clean mapping — stalls the
whole conversion on the one node in twenty that actually needs it.

**Q8 — Tokens: reuse only, never invent.** The skill never adds new tokens. Colors and font
families are always taken from the correct flow's own file — `styles/flow-2-construction.json`
for construction, `styles/flow-3-medical.json` for medical — and spacing/font sizes from the
shared root `theme.json`. Every design value in the pen section is snapped to the nearest
existing token from those files, and every substitution is called out in the Q6 outline (e.g.
*"design color #5a89dc → token `primary` #5886d8"*).
*Rejected:* Always adding a new token for anything not an exact match — risks palette bloat,
several near-duplicate blues from different sections rounding differently. A hybrid that adds
a new token only when nothing is close enough — was the agent's own recommendation, but the
user explicitly chose strict reuse-only instead: tokens come only from the existing files, no
exceptions, confirmed in the Q8 thread.

**Q9 — Input formats.** The skill supports both inputs from the brief, tried in this order:
(1) the Pencil MCP tools, when an app link is given and the desktop app is reachable; (2) a
pasted JSON blob, which — since `.pen` files are encrypted and off-limits to `Read`/`Grep` —
is always an already-exported node-tree (e.g. from a Pencil `execute` call), never the raw
`.pen` file itself. This session hit the MCP-unavailable case directly: `get_app_state` and
`read_skill` both failed with *"failed to connect to running Pencil app: desktop"* while
grounding this plan, confirming the pasted-JSON fallback is a real, not hypothetical, need.
*Rejected:* MCP-only, failing cleanly when the app isn't running — would have made this very
planning session a dead end. JSON-only, never touching Pencil MCP tools — throws away a real
convenience whenever the app is available.

**Q10 — Validator script scope.** A Node script shipped in the skill folder, run after every
generated file, checks: (1) every attribute in the leading block comment matches the
serialized HTML that follows it, (2) every `var:preset|category|slug` reference resolves to a
real entry in root `theme.json` or the flow's style variation, (3) every image `src` points at
a file that actually exists under `assets/images/`, (4) no raw, un-escaped string
concatenation appears outside `esc_url`/`esc_attr`/`esc_html`/`wp_kses_post`. A failure blocks
the Q6 approval step until fixed.
*Rejected:* An eyeball checklist in SKILL.md with no separate script — reintroduces exactly the
judgement-misses-mechanical-bugs risk that motivated the Q3 hybrid in the first place. A
WP-CLI command that parses the pattern through WordPress's real block parser — the most
rigorous option, but assumes a working WP-CLI and database context this environment doesn't
guarantee (the Pencil MCP failure earlier in this session is a reminder that assumed tooling
isn't always there).

**Q11 — Image handling.** Each image is copied/exported into
`assets/images/<flow>/<section-slug>/<name>.<ext>`, preserving its original format, and
referenced exactly like the existing hero pattern (`MEDISPACE_THEME_URL` + `esc_url`), with
alt text wrapped for i18n (`esc_attr__()`). When a specific image can't be copied (no MCP
access to the asset, or it wasn't included in the pasted JSON), the skill inserts a
placeholder — `assets/images/placeholder.svg`, sized to match the original's aspect ratio —
and flags that node explicitly in the Q6 outline (`⚠ placeholder — needs manual replacement`)
so it's never missed after approval.
*Rejected:* Leaving images as external URLs from pen.dev's own asset host — breaks the
self-contained-theme expectation an Envato review checks for, and ties every page load to an
asset host that may not be reachable once the design tool is out of the loop. Force-converting
every image to WebP on import — a reasonable idea, but not this skill's call to make unasked;
some assets (e.g. `icon-mark.svg`, `icon-money.svg` in the construction hero) are already
optimized SVGs where re-encoding could lose quality.

**Q12 — Responsive behavior.** The skill defaults to WordPress's own responsive block behavior
— `core/columns` auto-stacks below the mobile breakpoint, group layouts wrap — and only writes
a custom `@media` rule in `patterns.css` when an effect needs something blocks don't do
natively, following the same escalation spirit as Q7. This mirrors the theme's one existing
precedent: `.medispace-hero-badge`'s `@media (max-width: 782px)` rule switching it from
absolute to static positioning.
*Rejected:* Always asking the user for explicit breakpoint behavior per section — most sections
(a heading-paragraph-button stack, a 3-column feature grid) get correct mobile behavior for
free from core blocks; asking every time contradicts the same don't-interrupt-the-common-case
reasoning already settled in Q5 and Q7. Desktop-only for v1, mobile as a manual follow-up —
ships something that visibly breaks on a phone the moment it's previewed.

## Routine choices

- **Q4 — File naming convention.** Keep the theme's existing layout exactly as-is:
  `inc/patterns/<flow>/<section-slug>.php`, kebab-case section slug, category auto-derived as
  `medispace-<flow>` from the folder name. No migration needed — this is already the layout
  the two existing hero patterns use, so the Q1 glob change works with zero file moves.
- **Q5 — Default when pattern-vs-part isn't specified.** When an invocation doesn't say
  `--part` (or otherwise name a template part), the skill silently defaults to generating a
  **pattern** — the overwhelming majority case. A template part is only ever produced when the
  invocation explicitly asks for one. (Note: the agent's own recommendation was a narrower
  hybrid — default to pattern except ask via a clarifying question specifically when the
  section's name contains header/footer/nav — but the user chose the simpler always-default
  rule instead.)

## Verified facts

- `patterns/` is currently empty; the theme's two real patterns live at
  `inc/patterns/medical/hero.php` and `inc/patterns/construction/hero.php`.
- Registration was, before this plan, a hand-maintained `$block_patterns` array in
  `inc/block-patterns.php` that silently `continue`s past any listed file that doesn't exist —
  a deliberate development-time guard, not an error case to preserve.
- Colors and font families live per-flow in `styles/flow-2-construction.json` and
  `styles/flow-3-medical.json`; spacing sizes and font sizes live in the shared root
  `theme.json`, whose own color palette is intentionally empty
  (`"custom": true, "defaultPalette": false, "palette": []`) — colors only ever come from the
  active style variation.
- `theme.json`'s `templateParts` currently lists only header/footer entries per flow, each with
  an explicit `area`.
- `assets/css/patterns.css` already contains a real example of the Q7 escape hatch:
  `.medispace-hero-badge` (absolute positioning) plus a `@media (max-width: 782px)` rule
  switching it to static — proof this pattern is already how the theme handles what blocks
  can't do natively.
- The existing hero patterns already mirror every style attribute between the leading block
  comment and the serialized HTML (a WordPress requirement for the block to parse as valid),
  and already build image URLs with `MEDISPACE_THEME_URL` + `esc_url`. Alt text is currently
  hardcoded and not i18n-wrapped (`alt="Медичний кабінет"` in an otherwise-English theme) — a
  pre-existing inconsistency, out of scope to fix here, but the new skill will always produce
  i18n-wrapped alt text going forward.
- The Pencil MCP tools (`get_app_state`, `read_skill`) failed to connect during this planning
  session — `"failed to connect to running Pencil app: desktop"` — confirming the Q9
  pasted-JSON fallback addresses a real, observed failure mode, not a hypothetical one.
- `inc/block-patterns.php` already registers exactly two pattern categories,
  `medispace-medical` and `medispace-construction`, matching the Q4 folder-derived category
  convention.

## Risks

- The Q1 glob change to `inc/block-patterns.php` is a one-time edit to a shared file; done
  carelessly it could register a stray `.php` left under `inc/patterns/`. Mitigation: scope the
  glob tightly to `inc/patterns/*/*.php` and validate each returned array has the required
  keys (`title`, `categories`, `content`) before calling `register_block_pattern`.
- The Q11 placeholder-image fallback means a generated pattern can ship with a visibly fake
  image if the `⚠ placeholder` flag in the Q6 outline is missed before commit — the outline is
  the only safeguard, there's no second check later.
- Q8's strict reuse-only policy means a genuinely new brand color introduced by a future design
  will always be silently rounded to the nearest existing token, by design. If a real palette
  expansion is ever needed, that stays a manual `theme.json`/style-variation edit outside this
  skill's scope.
- The Q10 validator only catches what it's coded to catch (attribute mirroring, token
  resolution, image existence, escaping) — it does not and cannot judge whether the chosen
  Gutenberg block is the right one for the design's intent. That call rests entirely on the Q6
  outline approval, with no automated backstop behind it.

## Deferred

None — no question was deferred during this interview.

## Open threads

None left open. The two threaded discussions (Q8 on token sourcing, Q11 on the placeholder
fallback) both resolved into their question's final answer rather than remaining unresolved.
