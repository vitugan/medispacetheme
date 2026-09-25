This file is a merged representation of a subset of the codebase, containing files not matching ignore patterns, combined into a single document by Repomix.

# File Summary

## Purpose
This file contains a packed representation of a subset of the repository's contents that is considered the most important context.
It is designed to be easily consumable by AI systems for analysis, code review,
or other automated processes.

## File Format
The content is organized as follows:
1. This summary section
2. Repository information
3. Directory structure
4. Repository files (if enabled)
5. Multiple file entries, each consisting of:
  a. A header with the file path (## File: path/to/file)
  b. The full contents of the file in a code block

## Usage Guidelines
- This file should be treated as read-only. Any changes should be made to the
  original repository files, not this packed version.
- When processing this file, use the file path to distinguish
  between different files in the repository.
- Be aware that this file may contain sensitive information. Handle it with
  the same level of security as you would the original repository.

## Notes
- Some files may have been excluded based on .gitignore rules and Repomix's configuration
- Binary files are not included in this packed representation. Please refer to the Repository Structure section for a complete list of file paths, including binary files
- Files matching these patterns are excluded: node_modules/**, vendor/**, *.min.js, *.min.css, dist/**, build/**, .git/**, *.zip, *.log, composer.lock, package-lock.json, yarn.lock
- Files matching patterns in .gitignore are excluded
- Files matching default ignore patterns are excluded
- Files are sorted by Git change count (files with more changes are at the bottom)

# Directory Structure
```
.agents/
  COMPLETION_PLAN.md
  pen-to-fse-skill-design.md
assets/
  css/
    patterns.css
  fonts/
    lora/
      font-face.css
      lora-400-700-italic.woff2
      lora-400-700.woff2
      lora-cyrillic-400-700-italic.woff2
      lora-cyrillic-400-700.woff2
      lora-cyrillic-ext-400-700-italic.woff2
      lora-cyrillic-ext-400-700.woff2
      lora-latin-ext-400-700-italic.woff2
      lora-latin-ext-400-700.woff2
      lora-vietnamese-400-700-italic.woff2
      lora-vietnamese-400-700.woff2
    rubik/
      font-face.css
      rubik-300-900-italic.woff2
      rubik-300-900.woff2
      rubik-cyrillic-300-900-italic.woff2
      rubik-cyrillic-300-900.woff2
      rubik-cyrillic-ext-300-900-italic.woff2
      rubik-cyrillic-ext-300-900.woff2
      rubik-hebrew-300-900-italic.woff2
      rubik-hebrew-300-900.woff2
      rubik-latin-ext-300-900-italic.woff2
      rubik-latin-ext-300-900.woff2
  images/
    construction/
      hero/
        hero.webp
        icon-mark.svg
        icon-money.svg
        icon-process.svg
    medical/
      hero/
        hero-collage.png
        trusted-badge.png
    placeholder.svg
inc/
  admin/
    flow-selector.php
  patterns/
    construction/
      hero.php
    medical/
      hero.php
  block-patterns.php
  flow-template-resolver.php
  flows.php
parts/
  footer-construction.html
  footer-medical.html
  header-construction.html
  header-medical.html
styles/
  flow-2-construction.json
  flow-3-medical.json
templates/
  front-page-medical.html
  index.html
  template-construction-home.html
functions.php
index.php
style.css
theme.json
```

# Files

## File: .agents/COMPLETION_PLAN.md
```markdown
# Completion & Release Plan: MediSpace WordPress Theme (Envato Ready)

This plan outlines the steps required to prepare the **MediSpace** block theme for a final production release on Envato (ThemeForest). It covers registering plugin dependencies, setting up demo content imports, cleaning up code, manually verifying quality, and packaging the theme.

---

## Phase 1: Core (Theme Foundations & Demo Import)

- [ ] **1.1. Setup TGM Plugin Activation (TGMPA)**
  - Integrate the TGMPA library to recommend and/or force-install the required plugins:
    - **Safe SVG** (for secure SVG uploads)
    - **One Click Demo Import** (OCDI)
    - **The Icon Block** (`outermost/icon-block`)
    - **MediSpace Core** (companion plugin containing custom blocks and CPTs)
  - Place TGMPA configuration in `inc/tgmpa.php` and require it in `functions.php`.

- [ ] **1.2. Configure One Click Demo Import (OCDI)**
  - Prepare the demo import files structure inside `inc/demo-import/` (or a dedicated folder):
    - Content XML file (`content.xml`) containing demo pages, posts, and navigation menus.
    - Customizer data (`widgets.wie` / `customizer.dat` if applicable).
  - Register the demos for the active flows (e.g., `Medical Coworking` and `Construction Firm`) via the `ocdi/import_files` filter.
  - Set up default front page and menu assignments after import completes using the `ocdi/after_import` hook.

- [ ] **1.3. Implement Core Page Templates & Patterns from Figma**
  - Implement full page block patterns (e.g., Home, About, Services, Contact, Portfolio) for both current designs:
    - **Medical Coworking**
    - **Construction Firm**
  - Register any additional block templates or style variations inside `styles/` as JSON.

---

## Phase 2: Refactoring & Clean up (Envato Standards & i18n)

- [ ] **2.1. Code Comments & Structural Clean Up**
  - Search and remove all Ukrainian comments from PHP/CSS/JS files (translating code explanations to English where necessary, or deleting redundant ones).
  - Clean up any unused files, helper scripts, or commented-out code snippets.

- [ ] **2.2. Internationalization (i18n)**
  - Ensure all hardcoded strings (especially in `inc/admin/flow-selector.php` and template files) are wrapped in standard WordPress translation functions: `__()`, `_e()`, `esc_html__()`, `esc_html_e()`, `esc_attr__()`, etc.
  - Standardize text domain to `medispace`.
  - Prepare for POT generation (to be run as part of final release preparation).

- [ ] **2.3. Manage Flow Selector Visibility**
  - Add a flag/constant or helper function to easily toggle the dynamic development flow selector.
  - Before Envato submission, ensure the flow selector screen is disabled/hidden so only the user's selected flow is active and packaged, or configure it so it is only visible in development environments.

- [ ] **2.4. Envato Coding Standards Validation**
  - Ensure strict security guidelines are followed:
    - Escaping all outputs (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).
    - Using proper database sanitization and prepared queries.
    - Checking for prefixing on all functions, classes, and globals to prevent naming collisions.

---

## Phase 3: Tests (Manual QA Checklist)

- [ ] **3.1. Create manual verification scenarios for QA:**
  - **Cross-Browser Verification:** Verify rendering in Chrome, Safari, Firefox, and Edge.
  - **Responsiveness Check:** Test mobile, tablet, and desktop viewports.
  - **Flow Switching Validation:** Confirm that switching between designs via the flow selector applies the correct font families, color palettes, templates, and header/footer areas without database residue.
  - **Plugin Interoperability:** Validate that block layouts render correctly when dependent plugins (like *The Icon Block* or *MediSpace Core*) are active or inactive.

---

## Phase 4: Deploy (Packaging Script)

- [ ] **4.1. Write a Theme Packager Script**
  - Create a lightweight CLI script (e.g., `bin/package.php` or `package.sh`) to bundle the theme for release.
  - The script must build a clean ZIP file named `medispace.zip` containing only production files.
  - **Excluded paths:**
    - `.git/` and `.gitignore`
    - `.agents/`
    - `repomix-output.xml`
    - Any developer configurations (e.g., `composer.json` / `package.json` if only used for dev tools)
```

## File: .agents/pen-to-fse-skill-design.md
```markdown
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
```

## File: assets/images/placeholder.svg
```xml
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600" width="800" height="600" role="img" aria-label="Placeholder image">
	<rect width="800" height="600" fill="#e2e8ec"/>
	<rect x="1" y="1" width="798" height="598" fill="none" stroke="#c2ccd1" stroke-width="2"/>
	<g stroke="#9aa7ad" stroke-width="2" fill="none">
		<path d="M320 220h160v160H320z"/>
		<circle cx="360" cy="260" r="14"/>
		<path d="M320 350l50-50 40 40 70-70 40 40v60H320z"/>
	</g>
</svg>
```

## File: assets/css/patterns.css
```css
/* ==========================================================================
   Hero — Home
   ========================================================================== */

.medispace-hero-badge {
	position: absolute;
	top: 8px;
	right: 0;
}

@media (max-width: 782px) {
	.medispace-hero-badge {
		position: static;
		margin-top: 16px;
	}
}

/* ==========================================================================
   Why Choose Us
   ========================================================================== */

/* ... наступна секція, коли дійдемо ... */
```

## File: assets/fonts/lora/font-face.css
```css
/* cyrillic-ext */
@font-face {
	font-family: 'Lora';
	font-style: italic;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-cyrillic-ext-400-700-italic.woff2) format('woff2');
	unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}

/* cyrillic */
@font-face {
	font-family: 'Lora';
	font-style: italic;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-cyrillic-400-700-italic.woff2) format('woff2');
	unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}

/* vietnamese */
@font-face {
	font-family: 'Lora';
	font-style: italic;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-vietnamese-400-700-italic.woff2) format('woff2');
	unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}

/* latin-ext */
@font-face {
	font-family: 'Lora';
	font-style: italic;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-latin-ext-400-700-italic.woff2) format('woff2');
	unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}

/* latin */
@font-face {
	font-family: 'Lora';
	font-style: italic;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-400-700-italic.woff2) format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

/* cyrillic-ext */
@font-face {
	font-family: 'Lora';
	font-style: normal;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-cyrillic-ext-400-700.woff2) format('woff2');
	unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}

/* cyrillic */
@font-face {
	font-family: 'Lora';
	font-style: normal;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-cyrillic-400-700.woff2) format('woff2');
	unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}

/* vietnamese */
@font-face {
	font-family: 'Lora';
	font-style: normal;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-vietnamese-400-700.woff2) format('woff2');
	unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
}

/* latin-ext */
@font-face {
	font-family: 'Lora';
	font-style: normal;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-latin-ext-400-700.woff2) format('woff2');
	unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}

/* latin */
@font-face {
	font-family: 'Lora';
	font-style: normal;
	font-weight: 400 700;
	font-display: swap;
	src: url(./lora-400-700.woff2) format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
```

## File: assets/fonts/rubik/font-face.css
```css
/* cyrillic-ext */
@font-face {
	font-family: 'Rubik';
	font-style: italic;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-cyrillic-ext-300-900-italic.woff2) format('woff2');
	unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}

/* cyrillic */
@font-face {
	font-family: 'Rubik';
	font-style: italic;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-cyrillic-300-900-italic.woff2) format('woff2');
	unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}

/* hebrew */
@font-face {
	font-family: 'Rubik';
	font-style: italic;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-hebrew-300-900-italic.woff2) format('woff2');
	unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
}

/* latin-ext */
@font-face {
	font-family: 'Rubik';
	font-style: italic;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-latin-ext-300-900-italic.woff2) format('woff2');
	unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}

/* latin */
@font-face {
	font-family: 'Rubik';
	font-style: italic;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-300-900-italic.woff2) format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

/* cyrillic-ext */
@font-face {
	font-family: 'Rubik';
	font-style: normal;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-cyrillic-ext-300-900.woff2) format('woff2');
	unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
}

/* cyrillic */
@font-face {
	font-family: 'Rubik';
	font-style: normal;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-cyrillic-300-900.woff2) format('woff2');
	unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
}

/* hebrew */
@font-face {
	font-family: 'Rubik';
	font-style: normal;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-hebrew-300-900.woff2) format('woff2');
	unicode-range: U+0590-05FF, U+200C-2010, U+20AA, U+25CC, U+FB1D-FB4F;
}

/* latin-ext */
@font-face {
	font-family: 'Rubik';
	font-style: normal;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-latin-ext-300-900.woff2) format('woff2');
	unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}

/* latin */
@font-face {
	font-family: 'Rubik';
	font-style: normal;
	font-weight: 300 900;
	font-display: swap;
	src: url(./rubik-300-900.woff2) format('woff2');
	unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
```

## File: assets/images/construction/hero/icon-mark.svg
```xml
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_896_3871)">
<path d="M5.64434 5.64434C5.23176 6.05692 4.99997 6.6165 4.99997 7.19997V8.19997C4.99964 8.78087 4.76957 9.33806 4.35997 9.74997L3.65997 10.45C3.45437 10.6544 3.29121 10.8975 3.17988 11.1652C3.06855 11.4329 3.01123 11.72 3.01123 12.01C3.01123 12.2999 3.06855 12.587 3.17988 12.8547C3.29121 13.1225 3.45437 13.3655 3.65997 13.57L4.35997 14.27C4.76957 14.6819 4.99964 15.2391 4.99997 15.82V16.82C4.99997 17.4034 5.23176 17.963 5.64434 18.3756C6.05692 18.7882 6.6165 19.02 7.19997 19.02H8.19997C8.78087 19.0203 9.33806 19.2504 9.74997 19.66L10.45 20.36C10.6544 20.5656 10.8975 20.7287 11.1652 20.8401C11.4329 20.9514 11.72 21.0087 12.01 21.0087C12.2999 21.0087 12.587 20.9514 12.8547 20.8401C13.1225 20.7287 13.3655 20.5656 13.57 20.36L14.27 19.66C14.6819 19.2504 15.2391 19.0203 15.82 19.02H16.82C17.4034 19.02 17.963 18.7882 18.3756 18.3756C18.7882 17.963 19.02 17.4034 19.02 16.82V15.82C19.0203 15.2391 19.2504 14.6819 19.66 14.27L20.36 13.57C20.5656 13.3655 20.7287 13.1225 20.8401 12.8547C20.9514 12.587 21.0087 12.2999 21.0087 12.01C21.0087 11.72 20.9514 11.4329 20.8401 11.1652C20.7287 10.8975 20.5656 10.6544 20.36 10.45L19.66 9.74997C19.25 9.33797 19.02 8.77997 19.02 8.19997V7.19997C19.02 6.6165 18.7882 6.05692 18.3756 5.64434C17.963 5.23176 17.4034 4.99997 16.82 4.99997H15.82C15.24 4.99997 14.682 4.76997 14.27 4.35997L13.57 3.65997C13.3655 3.45437 13.1225 3.29121 12.8547 3.17988C12.587 3.06855 12.2999 3.01123 12.01 3.01123C11.72 3.01123 11.4329 3.06855 11.1652 3.17988C10.8975 3.29121 10.6544 3.45437 10.45 3.65997L9.74997 4.35997C9.33806 4.76957 8.78087 4.99964 8.19997 4.99997H7.19997C6.6165 4.99997 6.05692 5.23176 5.64434 5.64434Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M9 12L11 14L15 10" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_896_3871">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
```

## File: assets/images/construction/hero/icon-money.svg
```xml
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_896_3849)">
<path d="M3.68508 15.4442C3.23279 14.3522 3 13.1819 3 12C3 10.8181 3.23279 9.64778 3.68508 8.55585C4.13738 7.46392 4.80031 6.47177 5.63604 5.63604C6.47177 4.80031 7.46392 4.13738 8.55585 3.68508C9.64778 3.23279 10.8181 3 12 3C13.1819 3 14.3522 3.23279 15.4442 3.68508C16.5361 4.13738 17.5282 4.80031 18.364 5.63604C19.1997 6.47177 19.8626 7.46392 20.3149 8.55585C20.7672 9.64778 21 10.8181 21 12C21 13.1819 20.7672 14.3522 20.3149 15.4442C19.8626 16.5361 19.1997 17.5282 18.364 18.364C17.5282 19.1997 16.5361 19.8626 15.4442 20.3149C14.3522 20.7672 13.1819 21 12 21C10.8181 21 9.64778 20.7672 8.55585 20.3149C7.46392 19.8626 6.47177 19.1997 5.63604 18.364C4.80031 17.5282 4.13738 16.5361 3.68508 15.4442Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M13.867 9.75003C13.621 9.27003 13.159 8.98103 12.667 9.00003H11.333C10.597 9.00003 10 9.67003 10 10.5C10 11.327 10.597 11.999 11.333 11.999H12.667C13.403 11.999 14 12.67 14 13.499C14 14.327 13.403 14.998 12.667 14.998H11.333C10.841 15.017 10.379 14.728 10.133 14.248" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 7V9" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 15V17" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_896_3849">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
```

## File: assets/images/construction/hero/icon-process.svg
```xml
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_896_3830)">
<path d="M3.58579 7.41421C3.21071 7.03914 3 6.53043 3 6C3 5.46957 3.21071 4.96086 3.58579 4.58579C3.96086 4.21071 4.46957 4 5 4C5.53043 4 6.03914 4.21071 6.41421 4.58579C6.78929 4.96086 7 5.46957 7 6C7 6.53043 6.78929 7.03914 6.41421 7.41421C6.03914 7.78929 5.53043 8 5 8C4.46957 8 3.96086 7.78929 3.58579 7.41421Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10.5858 7.41421C10.2107 7.03914 10 6.53043 10 6C10 5.46957 10.2107 4.96086 10.5858 4.58579C10.9609 4.21071 11.4696 4 12 4C12.5304 4 13.0391 4.21071 13.4142 4.58579C13.7893 4.96086 14 5.46957 14 6C14 6.53043 13.7893 7.03914 13.4142 7.41421C13.0391 7.78929 12.5304 8 12 8C11.4696 8 10.9609 7.78929 10.5858 7.41421Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M17.5858 7.41421C17.2107 7.03914 17 6.53043 17 6C17 5.46957 17.2107 4.96086 17.5858 4.58579C17.9609 4.21071 18.4696 4 19 4C19.5304 4 20.0391 4.21071 20.4142 4.58579C20.7893 4.96086 21 5.46957 21 6C21 6.53043 20.7893 7.03914 20.4142 7.41421C20.0391 7.78929 19.5304 8 19 8C18.4696 8 17.9609 7.78929 17.5858 7.41421Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M3.58579 19.4142C3.21071 19.0391 3 18.5304 3 18C3 17.4696 3.21071 16.9609 3.58579 16.5858C3.96086 16.2107 4.46957 16 5 16C5.53043 16 6.03914 16.2107 6.41421 16.5858C6.78929 16.9609 7 17.4696 7 18C7 18.5304 6.78929 19.0391 6.41421 19.4142C6.03914 19.7893 5.53043 20 5 20C4.46957 20 3.96086 19.7893 3.58579 19.4142Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M10 18C10 18.5304 10.2107 19.0391 10.5858 19.4142C10.9609 19.7893 11.4696 20 12 20C12.5304 20 13.0391 19.7893 13.4142 19.4142C13.7893 19.0391 14 18.5304 14 18C14 17.4696 13.7893 16.9609 13.4142 16.5858C13.0391 16.2107 12.5304 16 12 16C11.4696 16 10.9609 16.2107 10.5858 16.5858C10.2107 16.9609 10 17.4696 10 18Z" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M5 8V16" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12 8V16" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M19 8V10C19 10.5304 18.7893 11.0391 18.4142 11.4142C18.0391 11.7893 17.5304 12 17 12H5" stroke="#0385CB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</g>
<defs>
<clipPath id="clip0_896_3830">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
```

## File: inc/admin/flow-selector.php
```php
<?php
/**
 * Medispace Theme: Flow Selector (admin setup screen)
 *
 * @package Medispace
 */

/**
 * 1. On theme activation, set a flag to show the welcome notice.
 */
add_action("after_switch_theme", function () {
    if (!medispace_get_active_flow()) {
        set_transient("medispace_show_flow_notice", true, WEEK_IN_SECONDS);
    }
});

/**
 * 2. Unobtrusive admin notice linking to the flow selection page.
 */
add_action("admin_notices", function () {
    if (!current_user_can("switch_themes")) {
        return;
    }

    if (!get_transient("medispace_show_flow_notice")) {
        return;
    }

    if (medispace_get_active_flow()) {
        delete_transient("medispace_show_flow_notice");
        return;
    }

    printf(
        '<div class="notice notice-info"><p>%s <a href="%s" class="button button-primary">%s</a></p></div>',
        esc_html__(
            "MediSpace: обери демо-дизайн для сайту, перш ніж продовжити.",
            "medispace",
        ),
        esc_url(admin_url("themes.php?page=medispace-setup")),
        esc_html__("Обрати демо", "medispace"),
    );
});

/**
 * 3. Register the Appearance → MediSpace Setup page.
 */
add_action("admin_menu", function () {
    add_theme_page(
        __("MediSpace Setup", "medispace"),
        __("MediSpace Setup", "medispace"),
        "switch_themes",
        "medispace-setup",
        "medispace_render_flow_selector_page",
    );
});

/**
 * 4. Render the flow selection page itself.
 */
function medispace_render_flow_selector_page()
{
    $flows = medispace_get_available_flows();
    $active_flow = medispace_get_active_flow();
    ?>
	<div class="wrap">
		<h1><?php esc_html_e("MediSpace — оберіть демо-дизайн", "medispace"); ?></h1>

		<?php if (isset($_GET["medispace_updated"])): ?>
			<div class="notice notice-success is-dismissible">
				<p><?php esc_html_e("Демо-дизайн активовано.", "medispace"); ?></p>
			</div>
		<?php endif; ?>

		<?php if (isset($_GET["medispace_styles_customized"], $_GET["flow"])): ?>
			<?php $blocked_flow = sanitize_key(wp_unslash($_GET["flow"])); ?>
			<div class="notice notice-warning">
				<p><?php esc_html_e(
        "Кольори/шрифти сайту було змінено вручну через Site Editor після останнього вибору демо. Header/Footer вже оновлені, але кольори не перезаписані, щоб не втратити твої зміни.",
        "medispace",
    ); ?></p>
				<form method="post" action="<?php echo esc_url(
        admin_url("admin-post.php"),
    ); ?>">
					<input type="hidden" name="action" value="medispace_set_flow" />
					<input type="hidden" name="flow" value="<?php echo esc_attr(
         $blocked_flow,
     ); ?>" />
					<input type="hidden" name="force" value="1" />
					<?php wp_nonce_field("medispace_set_flow_" . $blocked_flow); ?>
					<button type="submit" class="button">
						<?php esc_html_e("Все одно перезаписати кольори", "medispace"); ?>
					</button>
				</form>
			</div>
		<?php endif; ?>

		<div style="display:flex; gap:24px; flex-wrap:wrap; margin-top:24px;">
			<?php foreach ($flows as $flow_slug => $flow): ?>
				<div style="border:1px solid #ccd0d4; border-radius:8px; padding:20px; width:320px; background:#fff;">

					<h2 style="margin-top:0;">
						<?php echo esc_html($flow["label"]); ?>
						<?php if ($active_flow === $flow_slug): ?>
							<span style="font-size:12px; font-weight:normal; color:#2271b1;">
								(<?php esc_html_e("активний", "medispace"); ?>)
							</span>
						<?php endif; ?>
					</h2>

					<p><?php echo esc_html($flow["description"]); ?></p>

					<form method="post" action="<?php echo esc_url(
         admin_url("admin-post.php"),
     ); ?>">
						<input type="hidden" name="action" value="medispace_set_flow" />
						<input type="hidden" name="flow" value="<?php echo esc_attr($flow_slug); ?>" />
						<?php wp_nonce_field("medispace_set_flow_" . $flow_slug); ?>

						<button type="submit" class="button <?php echo $active_flow === $flow_slug
          ? ""
          : "button-primary"; ?>">
							<?php echo $active_flow === $flow_slug
           ? esc_html__("Активовано", "medispace")
           : esc_html__("Обрати цей флоу", "medispace"); ?>
						</button>
					</form>

				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}

/**
 * 5. Form handler — saves the option and applies the Style Variation.
 */
add_action("admin_post_medispace_set_flow", function () {
    if (!current_user_can("switch_themes")) {
        wp_die(esc_html__("Недостатньо прав.", "medispace"));
    }

    $flow_slug = isset($_POST["flow"])
        ? sanitize_key(wp_unslash($_POST["flow"]))
        : "";

    check_admin_referer("medispace_set_flow_" . $flow_slug);

    $flows = medispace_get_available_flows();

    if (!isset($flows[$flow_slug])) {
        wp_die(esc_html__("Невідомий флоу.", "medispace"));
    }

    update_option("medispace_active_flow", $flow_slug);

    $force = !empty($_POST["force"]);

    $applied = medispace_apply_style_variation(
        $flows[$flow_slug]["style_variation"],
        $force,
    );

    delete_transient("medispace_show_flow_notice");

    // Style variation was skipped because manual customizations were
    // detected — send the user back with a warning instead of a
    // silent success message.
    if ("blocked" === $applied) {
        wp_safe_redirect(
            add_query_arg(
                [
                    "medispace_styles_customized" => "1",
                    "flow" => $flow_slug,
                ],
                admin_url("themes.php?page=medispace-setup"),
            ),
        );
        exit();
    }

    // Clear DB customizations for templates and parts to prevent blocking the new flow.
    $overrides = get_posts([
        "post_type" => ["wp_template", "wp_template_part"],
        "post_name__in" => ["front-page", "home", "header", "footer"],
        "posts_per_page" => -1,
        "post_status" => "any",
    ]);

    foreach ($overrides as $override) {
        wp_delete_post($override->ID, true);
    }

    wp_safe_redirect(
        add_query_arg(
            "medispace_updated",
            "1",
            admin_url("themes.php?page=medispace-setup"),
        ),
    );
    exit();
});

/**
 * Programmatically apply a Style Variation (styles/*.json) — the same
 * mechanism as clicking a card in Site Editor → Styles → Browse styles.
 *
 * Guarded: if the current global styles content doesn't match what we
 * last wrote ourselves (meaning someone customized colors/fonts by hand
 * since), it refuses to overwrite unless $force is true.
 *
 * @param string $variation_slug File name without .json (e.g. 'flow-3-medical').
 * @param bool   $force          Overwrite even if manual customizations are detected.
 * @return bool|string true on success, false on failure, 'blocked' if customizations detected.
 */
function medispace_apply_style_variation($variation_slug, $force = false)
{
    $variation_file =
        MEDISPACE_THEME_PATH . "/styles/" . $variation_slug . ".json";

    if (!file_exists($variation_file)) {
        return false;
    }

    $variation_data = json_decode(file_get_contents($variation_file), true);

    if (!is_array($variation_data)) {
        return false;
    }

    if (!class_exists("WP_Theme_JSON_Resolver")) {
        return false;
    }

    $global_styles_id = WP_Theme_JSON_Resolver::get_user_global_styles_post_id();

    if (!$force && medispace_styles_were_customized($global_styles_id)) {
        return "blocked";
    }

    $user_theme_json = [
        "version" => isset($variation_data["version"])
            ? $variation_data["version"]
            : 3,
        "isGlobalStylesUserThemeJSON" => true,
        "settings" => isset($variation_data["settings"])
            ? $variation_data["settings"]
            : new stdClass(),
        "styles" => isset($variation_data["styles"])
            ? $variation_data["styles"]
            : new stdClass(),
    ];

    $json_string = wp_json_encode($user_theme_json);

    wp_update_post([
        "ID" => $global_styles_id,
        // wp_update_post() assumes slashed input (like raw $_POST data)
        // and strips backslashes internally via sanitize_post(). Without
        // wp_slash() here, our legitimate `\"` escape sequences inside
        // the JSON get stripped, corrupting the JSON syntax.
        "post_content" => wp_slash($json_string),
    ]);

    // Remember the hash of what we just wrote, so a future apply can tell
    // whether anyone has customized it by hand since.
    update_option("medispace_style_variation_hash", md5($json_string));

    // The resolver caches theme.json/global styles within a request — clear it.
    if (method_exists("WP_Theme_JSON_Resolver", "clean_cached_data")) {
        WP_Theme_JSON_Resolver::clean_cached_data();
    }

    return true;
}

/**
 * Whether the current global styles post content differs from the hash
 * we recorded after our own last write — i.e. someone customized it by
 * hand (via Site Editor → Styles) since we last applied a variation.
 *
 * @param int $global_styles_id Post ID of the user global styles CPT entry.
 * @return bool
 */
function medispace_styles_were_customized($global_styles_id)
{
    $last_hash = get_option("medispace_style_variation_hash", "");

    // We never applied a variation before — nothing to protect yet.
    if ("" === $last_hash) {
        return false;
    }

    $post = get_post($global_styles_id);

    if (!$post) {
        return false;
    }

    return md5($post->post_content) !== $last_hash;
}
```

## File: inc/patterns/construction/hero.php
```php
<?php

return [
    "title" => __("Hero - Construction", "medispace"),
    "categories" => ["medispace-construction"],
    // 'inserter' => false,
    "content" =>
        '<!-- wp:group {"metadata":{"name":"Home hero"},"className":"home-hero","align":"full","style":{"spacing":{"padding":{"top":"0px","bottom":"0px"},"margin":{"top":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull home-hero" style="margin-top:0px;padding-top:0px;padding-bottom:0px"><!-- wp:cover {"url":"' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/hero.webp","id":472,"dimRatio":0,"customOverlayColor":"#475663","isUserOverlayColor":false,"sizeSlug":"large","align":"full","style":{"spacing":{"padding":{"bottom":"0px","top":"150px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover alignfull" style="padding-top:150px;padding-bottom:0px"><img class="wp-block-cover__image-background wp-image-472 size-large" alt="" src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/hero.webp" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim" style="background-color:#475663"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"style":{"typography":{"textAlign":"center"}},"fontSize":"large"} -->
<h1 class="wp-block-heading has-text-align-center has-large-font-size">Designing &amp; managing <br>healthcare-grade spaces</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background"} -->
<p class="has-text-align-center has-background-color has-text-color has-link-color">We\'re here to help you create your dream workspace without <br>traditional upfront costs or long-term leases.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button">Talk to an expert</a></div>
<!-- /wp:button -->

<!-- wp:button {"textColor":"background","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"borderColor":"background"} -->
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-background-color has-text-color has-link-color has-border-color has-background-border-color wp-element-button">View portfolio</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"color":{"background":"#ffffff61"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignfull has-background hero-line" style="background-color:#ffffff61"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/icon-process.svg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|dark-gray"}}}},"textColor":"dark-gray"} -->
<p class="has-dark-gray-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700">Simple process</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/icon-money.svg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|dark-gray"}}}},"textColor":"dark-gray"} -->
<p class="has-dark-gray-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700">Transparent pricing</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="' .
        MEDISPACE_THEME_URL .
        '/assets/images/construction/hero/icon-mark.svg" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|dark-gray"}}}},"textColor":"dark-gray"} -->
<p class="has-dark-gray-color has-text-color has-link-color" style="font-size:18px;font-style:normal;font-weight:700">Licensed &amp; certified</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
];
```

## File: inc/patterns/medical/hero.php
```php
<?php
/**
 * Pattern: Hero - Medical
 *
 * @package Medispace
 */

$hero_photo_url = esc_url(
    MEDISPACE_THEME_URL . "/assets/images/medical/hero/hero-collage.png",
);
$badge_url = esc_url(
    MEDISPACE_THEME_URL . "/assets/images/medical/hero/trusted-badge.png",
);

return [
    "title" => __("Hero - Medical", "medispace"),
    "categories" => ["medispace-medical"],
    "content" =>
        '<!-- wp:group {"align":"full","backgroundColor":"light-blue","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|10","left":"var:preset|spacing|100","right":"var:preset|spacing|100"}}},"layout":{"type":"constrained","contentSize":"1640px"}} -->
<div class="wp-block-group alignfull has-light-blue-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--10);padding-left:var(--wp--preset--spacing--100)">

	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"64px","top":"32px"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-center">

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:heading {"level":1,"fontSize":"h1"} -->
			<h1 class="wp-block-heading has-h1-font-size">Flexible Medical &amp; Therapy Office Spaces for Rent</h1>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"body-m","style":{"spacing":{"margin":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|50"}}}} -->
			<p class="has-body-m-font-size" style="margin-top:var(--wp--preset--spacing--40);margin-bottom:var(--wp--preset--spacing--50)">Rent private exam rooms &#8211; daily, weekly, monthly, or annual medical office rentals</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"fontSize":"button"} -->
				<div class="wp-block-button has-button-font-size">
					<a class="wp-block-button__link has-button-font-size has-custom-font-size wp-element-button" href="#">Schedule Tour</a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">

			<!-- wp:image {"style":{"border":{"radius":"30px"}},"className":"medispace-hero-photo"} -->
			<figure class="wp-block-image medispace-hero-photo has-custom-border">
				<img src="' .
        $hero_photo_url .
        '" alt="Медичний кабінет" style="border-radius:30px" />
			</figure>
			<!-- /wp:image -->

			<!-- wp:image {"className":"medispace-hero-badge"} -->
			<figure class="wp-block-image medispace-hero-badge">
				<img src="' .
        $badge_url .
        '" alt="Trusted by 100+ doctors and therapists" />
			</figure>
			<!-- /wp:image -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"backgroundColor":"white","style":{"spacing":{"margin":{"top":"-40px"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"}},"border":{"radius":{"topRight":"80px"}}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group has-white-background-color has-background" style="border-top-right-radius:80px;margin-top:-40px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"50px"}}}} -->
		<div class="wp-block-columns">

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"h3","textColor":"primary"} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-h3-font-size">100+</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"fontSize":"body-s"} -->
				<p class="has-body-s-font-size">Healthcare providers launch their practices</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"h3","textColor":"primary"} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-h3-font-size">95%</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"fontSize":"body-s"} -->
				<p class="has-body-s-font-size">Satisfaction rate from our clients</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:heading {"level":3,"fontSize":"h3","textColor":"primary"} -->
				<h3 class="wp-block-heading has-primary-color has-text-color has-h3-font-size">200+</h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"fontSize":"body-s"} -->
				<p class="has-body-s-font-size">Fully stocked exam rooms</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:column -->

		</div>
		<!-- /wp:columns -->

	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->',
];
```

## File: inc/block-patterns.php
```php
<?php
/**
 * Medispace Theme: Block Patterns
 *
 * @package Medispace
 */

if (!function_exists("medispace_register_block_patterns")):
    function medispace_register_block_patterns()
    {
        $block_pattern_categories = [
            "medispace-medical" => [
                "label" => __("MediSpace: Medical", "medispace"),
            ],
            "medispace-construction" => [
                "label" => __("MediSpace: Construction", "medispace"),
            ],
        ];

        /**
         * Filters the theme block pattern categories.
         *
         * @param array $block_pattern_categories Array of block pattern categories.
         */
        $block_pattern_categories = apply_filters(
            "medispace_block_pattern_categories",
            $block_pattern_categories,
        );

        foreach (
            $block_pattern_categories
            as $slug => $block_pattern_category
        ) {
            register_block_pattern_category($slug, $block_pattern_category);
        }

        // Auto-discovery: every inc/patterns/<flow>/<slug>.php file is a pattern.
        // There is no manual list to keep in sync anymore — drop a file in and
        // it registers itself on the next request. A file that isn't ready yet
        // (missing title/content) is skipped rather than fataling the site.
        $pattern_files = glob(get_theme_file_path("/inc/patterns/*/*.php"));

        /**
         * Filters the discovered pattern file paths before they're required.
         *
         * @param array $pattern_files Absolute paths to pattern files.
         */
        $pattern_files = apply_filters(
            "medispace_block_pattern_files",
            $pattern_files ?: [],
        );

        foreach ($pattern_files as $pattern_path) {
            // inc/patterns/<flow>/<slug>.php -> registered as medispace/<flow>-<slug>.
            $relative = str_replace(
                get_theme_file_path("/inc/patterns/"),
                "",
                $pattern_path,
            );
            $block_pattern = str_replace(["/", ".php"], ["-", ""], $relative);

            $pattern = require $pattern_path;

            if (
                !is_array($pattern) ||
                empty($pattern["title"]) ||
                empty($pattern["content"])
            ) {
                continue;
            }

            register_block_pattern("medispace/" . $block_pattern, $pattern);
        }
    }
endif;

add_action("init", "medispace_register_block_patterns", 9);
```

## File: inc/flow-template-resolver.php
```php
<?php
/**
 * Medispace Theme: Flow Template Resolution
 *
 * Resolves the generic "header" / "footer" / "front-page" slugs to the
 * active flow's source file, entirely in-memory, at render time.
 *
 * Why this hook and not `get_block_file_template`:
 * WordPress checks the database FIRST, and only calls the final
 * `get_block_template` filter with a non-null $template when a DB
 * override already exists (e.g. the user customized it in the Site
 * Editor). In that case this filter returns early and never touches
 * the result — so once a user edits a template, their edit always
 * wins, automatically, with no extra bookkeeping needed.
 *
 * This filter only fires with $template === null, meaning neither a
 * DB override nor a matching theme file (header.html etc.) exists —
 * exactly the gap we need to fill for the generic, flow-agnostic slugs.
 *
 * @package Medispace
 */

add_filter("get_block_template", "medispace_resolve_flow_template", 10, 3);

/**
 * @param WP_Block_Template|null $template      Result so far (null = nothing found in DB or theme files).
 * @param string                 $id            "{$theme}//{$slug}".
 * @param string                 $template_type 'wp_template' or 'wp_template_part'.
 * @return WP_Block_Template|null
 */
function medispace_resolve_flow_template($template, $id, $template_type)
{
    // Something already resolved it (DB customization or a real file) — never override that.
    if (null !== $template) {
        return $template;
    }

    $parts = explode("//", $id, 2);

    if (count($parts) < 2 || get_stylesheet() !== $parts[0]) {
        return $template;
    }

    $slug = $parts[1];

    // Map of managed generic slugs to their registry key, scoped by template type.
    $managed = [
        "wp_template" => [
            "front-page" => "front_page_template",
            "home"       => "front_page_template",
        ],
        "wp_template_part" => [
            "header" => "header_template_part",
            "footer" => "footer_template_part",
        ],
    ];

    if (empty($managed[$template_type][$slug])) {
        return $template;
    }

    $flow_slug = medispace_get_active_flow();

    if (!$flow_slug) {
        return $template;
    }

    $flows = medispace_get_available_flows();

    if (!isset($flows[$flow_slug])) {
        return $template;
    }

    $file_key = $managed[$template_type][$slug];
    $file_path = MEDISPACE_THEME_PATH . $flows[$flow_slug][$file_key];

    if (!is_readable($file_path)) {
        return $template;
    }

    $content = file_get_contents($file_path);

    if (false === $content) {
        return $template;
    }

    $new_template = new WP_Block_Template();
    $new_template->id = $id;
    $new_template->theme = get_stylesheet();
    $new_template->slug = $slug;
    $new_template->type = $template_type;
    $new_template->title = ucwords(str_replace("-", " ", $slug));
    $new_template->content = $content;
    $new_template->source = "theme";
    $new_template->status = "publish";
    $new_template->has_theme_file = true;
    $new_template->is_custom = false;
    $new_template->post_types = [];

    if ("wp_template_part" === $template_type) {
        $new_template->area =
            "header" === $slug
                ? WP_TEMPLATE_PART_AREA_HEADER
                : WP_TEMPLATE_PART_AREA_FOOTER;
    }

    return $new_template;
}

add_filter("get_block_templates", "medispace_resolve_flow_templates", 10, 3);

/**
 * Filters the list of queried block templates to inject the active flow's home template.
 *
 * Why this filter is needed:
 * On the front end, WordPress resolves the main page template by calling `get_block_templates()`
 * with a query for the template hierarchy (e.g. ['front-page', 'index'] or ['home', 'index']).
 * This queries multiple templates at once and applies the plural `get_block_templates` filter,
 * completely bypassing the singular `get_block_template` filter. To ensure the active flow's
 * home template is selected, we must hook here and inject it into the queried templates array.
 *
 * @param WP_Block_Template[] $query_result Array of found block templates.
 * @param array               $query        Query variables.
 * @param string              $template_type 'wp_template' or 'wp_template_part'.
 * @return WP_Block_Template[]
 */
function medispace_resolve_flow_templates($query_result, $query, $template_type)
{
    if ("wp_template" !== $template_type) {
        return $query_result;
    }

    $slugs = isset($query["slug__in"]) ? $query["slug__in"] : [];

    if (empty($slugs)) {
        return $query_result;
    }

    // Slugs we want to resolve dynamically.
    $target_slugs = ["front-page", "home"];
    $intersect = array_intersect($slugs, $target_slugs);

    if (empty($intersect)) {
        return $query_result;
    }

    // If there is already a database override (user customization) for a target slug, let it win.
    foreach ($query_result as $tpl) {
        if (in_array($tpl->slug, $target_slugs) && "custom" === $tpl->source) {
            return $query_result;
        }
    }

    $flow_slug = medispace_get_active_flow();
    if (!$flow_slug) {
        return $query_result;
    }

    $flows = medispace_get_available_flows();
    if (!isset($flows[$flow_slug])) {
        return $query_result;
    }

    foreach ($intersect as $slug) {
        // Check if this slug was already resolved (e.g. from the DB or a physical file).
        $exists = false;
        foreach ($query_result as $tpl) {
            if ($tpl->slug === $slug) {
                $exists = true;
                break;
            }
        }

        if (!$exists) {
            $id = get_stylesheet() . "//" . $slug;
            $resolved = medispace_resolve_flow_template(null, $id, "wp_template");
            if ($resolved) {
                $query_result[] = $resolved;
            }
        }
    }

    return $query_result;
}
```

## File: inc/flows.php
```php
<?php
/**
 * Medispace Theme: Flow Registry
 *
 * Єдине джерело правди про доступні демо-флоу теми.
 * Усі інші частини системи (адмін-сторінка вибору, майбутній
 * demo-import) читають список звідси, а не дублюють його.
 *
 * @package Medispace
 */

if (!function_exists("medispace_get_available_flows")):
    /**
     * @return array<string, array{label:string, description:string, style_variation:string, screenshot:string}>
     */
    function medispace_get_available_flows()
    {
        $flows = [
            "medical" => [
                "label" => __("Medical Coworking", "medispace"),
                "description" => __(
                    "Healthcare & therapy office space rental design.",
                    "medispace",
                ),
                "style_variation" => "flow-3-medical",
                "screenshot" => "/assets/images/medical/screenshot-flow.png",
                "front_page_template" => "/templates/front-page-medical.html",
                "header_template_part" => "/parts/header-medical.html",
                "footer_template_part" => "/parts/footer-medical.html",
            ],
            "construction" => [
                "label" => __("Construction Firm", "medispace"),
                "description" => __(
                    "Company / construction firm design.",
                    "medispace",
                ),
                "style_variation" => "flow-2-construction",
                "screenshot" =>
                    "/assets/images/construction/screenshot-flow.png",
                "front_page_template" =>
                    "/templates/template-construction-home.html",
                "header_template_part" => "/parts/header-construction.html",
                "footer_template_part" => "/parts/footer-construction.html",
            ],
        ];

        /**
         * Filters the list of available theme flows.
         *
         * @param array $flows Array of flow definitions keyed by flow slug.
         */
        return apply_filters("medispace_available_flows", $flows);
    }
endif;

if (!function_exists("medispace_get_active_flow")):
    /**
     * @return string|false Slug активного флоу, або false, якщо ще не обрано.
     */
    function medispace_get_active_flow()
    {
        $flow = get_option("medispace_active_flow", false);

        $flows = medispace_get_available_flows();

        // Захист: якщо в опції лишився slug флоу, якого більше нема в реєстрі.
        if ($flow && !isset($flows[$flow])) {
            return false;
        }

        return $flow;
    }
endif;
```

## File: parts/footer-construction.html
```html
<!-- wp:group {"metadata":{"name":"Footer default"},"className":"alignwide","style":{"spacing":{"padding":{"top":"80px","bottom":"24px"}}},"backgroundColor":"gray-100","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-gray-100-background-color has-background" style="padding-top:80px;padding-bottom:24px"><!-- wp:columns {"className":"alignwide footer-inner"} -->
<div class="wp-block-columns alignwide footer-inner"><!-- wp:column {"metadata":{"name":"Contact"}} -->
<div class="wp-block-column"><!-- wp:columns {"isStackedOnMobile":false,"metadata":{"categories":["contact"],"patternName":"core/block/90","name":"Contact item footer"},"className":"footer-contact"} -->
<div class="wp-block-columns is-not-stacked-on-mobile footer-contact"><!-- wp:column {"width":"48px"} -->
<div class="wp-block-column" style="flex-basis:48px"><!-- wp:group {"style":{"color":{"background":"#0d2c3c"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-background" style="background-color:#0d2c3c;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"","label":"Envelop","width":"24px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Envelop"><g clip-path="url(#clip0_199_8602)"><path d="M3 7C3 6.46957 3.21071 5.96086 3.58579 5.58579C3.96086 5.21071 4.46957 5 5 5H19C19.5304 5 20.0391 5.21071 20.4142 5.58579C20.7893 5.96086 21 6.46957 21 7V17C21 17.5304 20.7893 18.0391 20.4142 18.4142C20.0391 18.7893 19.5304 19 19 19H5C4.46957 19 3.96086 18.7893 3.58579 18.4142C3.21071 18.0391 3 17.5304 3 17V7Z" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 7L12 13L21 7" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_199_8602"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg></div></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-50"}}}},"textColor":"gray-50","fontSize":"small"} -->
<p class="has-gray-50-color has-text-color has-link-color has-small-font-size">Email:</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-margin-top","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"small"} -->
<p class="no-margin-top has-background-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:600"><a href="#">contact@medicalspace.com</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"isStackedOnMobile":false,"metadata":{"categories":["contact"],"patternName":"core/block/90","name":"Contact item footer"},"className":"footer-contact"} -->
<div class="wp-block-columns is-not-stacked-on-mobile footer-contact"><!-- wp:column {"width":"48px"} -->
<div class="wp-block-column" style="flex-basis:48px"><!-- wp:group {"style":{"color":{"background":"#0d2c3c"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-background" style="background-color:#0d2c3c;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"","label":"Envelop","width":"24px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Envelop"><g clip-path="url(#clip0_199_8612)"><path d="M5 4H9L11 9L8.5 10.5C9.57096 12.6715 11.3285 14.429 13.5 15.5L15 13L20 15V19C20 19.5304 19.7893 20.0391 19.4142 20.4142C19.0391 20.7893 18.5304 21 18 21C14.0993 20.763 10.4202 19.1065 7.65683 16.3432C4.8935 13.5798 3.23705 9.90074 3 6C3 5.46957 3.21071 4.96086 3.58579 4.58579C3.96086 4.21071 4.46957 4 5 4Z" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 7C15.5304 7 16.0391 7.21071 16.4142 7.58579C16.7893 7.96086 17 8.46957 17 9" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 3C16.5913 3 18.1174 3.63214 19.2426 4.75736C20.3679 5.88258 21 7.4087 21 9" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_199_8612"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg></div></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-50"}}}},"textColor":"gray-50","fontSize":"small"} -->
<p class="has-gray-50-color has-text-color has-link-color has-small-font-size">Phone:</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-margin-top","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"small"} -->
<p class="no-margin-top has-background-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:600"><a href="#">(414) 687 - 5892</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"isStackedOnMobile":false,"metadata":{"categories":["contact"],"patternName":"core/block/90","name":"Contact item footer"},"className":"footer-contact"} -->
<div class="wp-block-columns is-not-stacked-on-mobile footer-contact"><!-- wp:column {"width":"48px"} -->
<div class="wp-block-column" style="flex-basis:48px"><!-- wp:group {"style":{"color":{"background":"#0d2c3c"},"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group has-background" style="background-color:#0d2c3c;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px"><!-- wp:outermost/icon-block {"iconName":"","label":"Envelop","width":"24px"} -->
<div class="wp-block-outermost-icon-block"><div class="icon-container" style="width:24px;transform:rotate(0deg) scaleX(1) scaleY(1)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Envelop"><g clip-path="url(#clip0_199_8623)"><path d="M9 11C9 11.7956 9.31607 12.5587 9.87868 13.1213C10.4413 13.6839 11.2044 14 12 14C12.7956 14 13.5587 13.6839 14.1213 13.1213C14.6839 12.5587 15 11.7956 15 11C15 10.2044 14.6839 9.44129 14.1213 8.87868C13.5587 8.31607 12.7956 8 12 8C11.2044 8 10.4413 8.31607 9.87868 8.87868C9.31607 9.44129 9 10.2044 9 11Z" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17.657 16.6572L13.414 20.9002C13.039 21.2748 12.5306 21.4853 12.0005 21.4853C11.4704 21.4853 10.962 21.2748 10.587 20.9002L6.343 16.6572C5.22422 15.5384 4.46234 14.1129 4.15369 12.5611C3.84504 11.0092 4.00349 9.40071 4.60901 7.93893C5.21452 6.47714 6.2399 5.22774 7.55548 4.3487C8.87107 3.46967 10.4178 3.00049 12 3.00049C13.5822 3.00049 15.1289 3.46967 16.4445 4.3487C17.7601 5.22774 18.7855 6.47714 19.391 7.93893C19.9965 9.40071 20.155 11.0092 19.8463 12.5611C19.5377 14.1129 18.7758 15.5384 17.657 16.6572Z" stroke="#0B94DE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></g><defs><clipPath id="clip0_199_8623"><rect width="24" height="24" fill="white"></rect></clipPath></defs></svg></div></div>
<!-- /wp:outermost/icon-block --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-50"}}}},"textColor":"gray-50","fontSize":"small"} -->
<p class="has-gray-50-color has-text-color has-link-color has-small-font-size">Location</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"no-margin-top","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|background"}}}},"textColor":"background","fontSize":"small"} -->
<p class="no-margin-top has-background-color has-text-color has-link-color has-small-font-size" style="font-style:normal;font-weight:600">10 Booth Place, Balcatta WA 6021</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Menus"},"className":"footer-menus","style":{"spacing":{"padding":{"right":"var:preset|spacing|extra-large","left":"var:preset|spacing|extra-large"}}}} -->
<div class="wp-block-column footer-menus" style="padding-right:var(--wp--preset--spacing--extra-large);padding-left:var(--wp--preset--spacing--extra-large)"><!-- wp:columns {"isStackedOnMobile":false} -->
<div class="wp-block-columns is-not-stacked-on-mobile"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:navigation {"ref":1074,"textColor":"background","overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical"}} /--></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:navigation {"ref":1082,"textColor":"background","overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|small"}},"layout":{"type":"flex","orientation":"vertical","flexWrap":"nowrap"}} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column -->

<!-- wp:column {"metadata":{"name":"Logo"},"className":"footer-logo"} -->
<div class="wp-block-column footer-logo"><!-- wp:medispace-core/site-logo-custom /-->

<!-- wp:paragraph {"className":"has-gray-50-color has-text-color has-link-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-50"}}},"typography":{"textAlign":"left"}},"textColor":"gray-50"} -->
<p class="has-text-align-left has-gray-50-color has-text-color has-link-color">Builders Number — PN10983</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"metadata":{"name":"Footer bottom"},"className":"footer-copyright","style":{"spacing":{"padding":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group footer-copyright" style="padding-top:0px;padding-bottom:0px"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-50"}}}},"textColor":"gray-50"} -->
<p class="has-gray-50-color has-text-color has-link-color">Copyright © 2026 MedicalSpace</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|gray-50"}}}},"textColor":"gray-50"} -->
<p class="has-gray-50-color has-text-color has-link-color">All Rights Reserved</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#">Terms and Conditions</a></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p><a href="#">Privacy Policy</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
```

## File: parts/footer-medical.html
```html
<!-- wp:group {"tagName":"footer","align":"full","backgroundColor":"light-gray","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"0","left":"var:preset|spacing|100","right":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<footer class="wp-block-group alignfull has-light-gray-background-color has-background" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--100);padding-bottom:0;padding-left:var(--wp--preset--spacing--100)">

	<!-- wp:columns -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"33%"} -->
		<div class="wp-block-column" style="flex-basis:33%">
			<!-- wp:site-logo {"width":170} /-->
			<!-- wp:paragraph {"fontSize":"body-m","textColor":"gray-80","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
			<p class="has-gray-80-color has-text-color has-body-m-font-size" style="margin-top:var(--wp--preset--spacing--50)">MedicalSpace provides a flexible solution to rent furnished medical office space with no lease commitments or up-front costs.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"17%"} -->
		<div class="wp-block-column" style="flex-basis:17%">
			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">› About Us</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">› FAQs</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">› Pricing</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"17%"} -->
		<div class="wp-block-column" style="flex-basis:17%">
			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">› Location</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">› Blog</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">› Contact Us</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33%"} -->
		<div class="wp-block-column" style="flex-basis:33%">

			<!-- wp:paragraph {"fontSize":"body-s"} -->
			<p class="has-body-s-font-size"><span style="color:#52636b">Email:</span><br/><strong>contact@medicalspace.com</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"body-s"} -->
			<p class="has-body-s-font-size"><span style="color:#52636b">Phone:</span><br/><strong>(414) 687 - 5892</strong></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"body-s"} -->
			<p class="has-body-s-font-size"><span style="color:#52636b">Location:</span><br/><strong>1133 21st St NW, WA, DC 20036, United States</strong></p>
			<!-- /wp:paragraph -->

		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}},"border":{"top":{"color":"#ced2d5","width":"1px"}}},"layout":{"type":"flex","justifyContent":"space-between"}} -->
	<div class="wp-block-group" style="border-top-color:#ced2d5;border-top-width:1px;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">

		<!-- wp:paragraph {"fontSize":"body-m","textColor":"gray-50"} -->
		<p class="has-gray-50-color has-text-color has-body-m-font-size">Copyright © 2026 MedicalSpace | All Rights Reserved</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"layout":{"type":"flex"}} -->
		<div class="wp-block-group">

			<!-- wp:paragraph {"fontSize":"body-m","textColor":"primary"} -->
			<p class="has-primary-color has-text-color has-body-m-font-size">Terms and Conditions | Privacy Policy</p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"gray-70","iconColorValue":"#52636b","size":"has-normal-icon-size","className":"is-style-default"} -->
			<ul class="wp-block-social-links has-normal-icon-size is-style-default">
				<!-- wp:social-link {"url":"#","service":"facebook"} /-->
				<!-- wp:social-link {"url":"#","service":"instagram"} /-->
				<!-- wp:social-link {"url":"#","service":"linkedin"} /-->
			</ul>
			<!-- /wp:social-links -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</footer>
<!-- /wp:group -->
```

## File: parts/header-construction.html
```html
<!-- wp:group {"metadata":{"name":"Header inner"},"align":"full","className":"header-inner","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"1380px"}} -->
<div
    class="wp-block-group alignfull header-inner"
    style="padding-top: 0; padding-right: 0; padding-bottom: 0; padding-left: 0"
>
    <!-- wp:group {"align":"wide","className":"top-bar","style":{"spacing":{"padding":{"top":"14px","bottom":"14px"},"margin":{"top":"0px","bottom":"0px"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
    <div
        class="wp-block-group alignwide top-bar"
        style="
            margin-top: 0px;
            margin-bottom: 0px;
            padding-top: 20px;
            padding-bottom: 20px;
        "
    >
        <!-- wp:medispace-core/site-logo-sticky {"width":128} /-->

        <!-- wp:navigation {"textColor":"gray-100","overlayMenu":"never","icon":"menu","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"normal","layout":{"type":"flex","justifyContent":"center"},"blockScreenSize":{"hideOnMobile":true,"hideOnTablet":true}} -->
        <!-- wp:navigation-link {"label":"About","url":"/about","kind":"custom","isTopLevelLink":true} /-->
        <!-- wp:navigation-submenu {"label":"Services","url":"/services","kind":"custom","isTopLevelItem":true} -->
        <!-- wp:navigation-link {"label":"Custom cabinetry","url":"/custom-cubinatory/","kind":"custom","isTopLevelLink":false} /-->
        <!-- wp:navigation-link {"label":"Medical office design","url":"/medical-office-design/","kind":"custom","isTopLevelLink":false} /-->
        <!-- wp:navigation-link {"label":"Project case template","url":"/project-case-template/","kind":"custom","isTopLevelLink":false} /-->
        <!-- /wp:navigation-submenu -->
        <!-- wp:navigation-link {"label":"Portfolio","url":"/portfolio/","kind":"custom","isTopLevelLink":true} /-->
        <!-- wp:navigation-link {"label":"Blog","url":"/blog/","kind":"custom","isTopLevelLink":true} /-->
        <!-- wp:navigation-link {"label":"Contact","url":"/contact/","kind":"custom","isTopLevelLink":true} /-->
        <!-- /wp:navigation -->

        <!-- wp:group {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div
            class="wp-block-group"
            style="
                padding-top: 0;
                padding-right: 0;
                padding-bottom: 0;
                padding-left: 0;
            "
        >
            <!-- wp:buttons {"blockScreenSize":{"hideOnMobile":true,"hideOnTablet":false}} -->
            <div class="wp-block-buttons">
                <!-- wp:button -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link wp-element-button"
                        >Request proposal</a
                    >
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

            <!-- wp:navigation {"ref":1155,"textColor":"gray-100","overlayMenu":"always","icon":"menu","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"normal","layout":{"type":"flex","justifyContent":"center"},"blockScreenSize":{"hideOnDesktop":true}} /-->
        </div>

        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->
```

## File: parts/header-medical.html
```html
<!-- wp:group {"tagName":"header","align":"full","backgroundColor":"white","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|100","right":"var:preset|spacing|100"}}},"layout":{"type":"constrained"}} -->
<header class="wp-block-group alignfull has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--100);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--100)">

	<!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between","flexWrap":"nowrap"}} -->
	<div class="wp-block-group">

		<!-- wp:site-logo {"width":170} /-->

		<!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"center"},"style":{"typography":{"fontSize":"16px"}}} -->
		<!-- wp:navigation-link {"label":"Spaces","url":"#"} /-->
		<!-- wp:navigation-link {"label":"Location","url":"#"} /-->
		<!-- wp:navigation-link {"label":"Pricing","url":"#"} /-->
		<!-- wp:navigation-link {"label":"About Us","url":"#"} /-->
		<!-- wp:navigation-link {"label":"FAQ","url":"#"} /-->
		<!-- wp:navigation-link {"label":"Blog","url":"#"} /-->
		<!-- wp:navigation-link {"label":"Contact Us","url":"#"} /-->
		<!-- /wp:navigation -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">

			<!-- wp:paragraph {"fontSize":"body-m"} -->
			<p class="has-body-m-font-size">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;margin-right:6px"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" stroke="#5886D8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>+68 685 88666
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"fontSize":"button"} -->
				<div class="wp-block-button has-button-font-size">
					<a class="wp-block-button__link has-button-font-size has-custom-font-size wp-element-button" href="#">Book Now</a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->

		</div>
		<!-- /wp:group -->

	</div>
	<!-- /wp:group -->

</header>
<!-- /wp:group -->
```

## File: styles/flow-2-construction.json
```json
{
	"$schema": "https://schemas.wp.org/trunk/theme.json",
	"version": 3,
	"title": "Construction Firm",
	"settings": {
		"color": {
			"palette": [
				{ "slug": "primary", "name": "Primary", "color": "#0385CB" },
				{ "slug": "primary-hover", "name": "Primary Hover", "color": "#00A2F9" },
				{ "slug": "dark", "name": "Dark", "color": "#0D2C3C" },
				{ "slug": "light-blue", "name": "Light Blue", "color": "#F2F9FC" },
				{ "slug": "light-gray", "name": "Light Gray", "color": "#F6F6F6" },
				{ "slug": "gray-100", "name": "Gray 100", "color": "#08202C" },
				{ "slug": "gray-80", "name": "Gray 80", "color": "#394D56" },
				{ "slug": "gray-70", "name": "Gray 70", "color": "#878398" },
				{ "slug": "gray-50", "name": "Gray 50", "color": "#838F95" },
				{ "slug": "gray-30", "name": "Gray 30", "color": "#B5BCC0" },
				{ "slug": "gray-20", "name": "Gray 20", "color": "#E6E9EA" },
				{ "slug": "white", "name": "White", "color": "#ffffff" }
			]
		},
		"typography": {
			"fontFamilies": [
				{
					"slug": "heading",
					"name": "Poppins",
					"fontFamily": "\"Poppins\", sans-serif",
					"fontFace": [
						{
							"fontFamily": "Poppins",
							"fontWeight": "400 700",
							"fontStyle": "normal",
							"src": [ "file:./assets/fonts/construction/poppins/Poppins-VariableFont.woff2" ]
						}
					]
				},
				{
					"slug": "body",
					"name": "Inter",
					"fontFamily": "\"Inter\", sans-serif",
					"fontFace": [
						{
							"fontFamily": "Inter",
							"fontWeight": "400 700",
							"fontStyle": "normal",
							"src": [ "file:./assets/fonts/construction/inter/Inter-VariableFont.woff2" ]
						}
					]
				}
			]
		},
		"custom": {
			"radius": {
				"s": "8px",
				"m": "16px",
				"l": "40px"
			}
		}
	},
	"styles": {
		"color": {
			"background": "var(--wp--preset--color--white)",
			"text": "var(--wp--preset--color--gray-100)"
		},
		"typography": {
			"fontFamily": "var(--wp--preset--font-family--body)",
			"fontSize": "var(--wp--preset--font-size--body-m)",
			"fontWeight": "500",
			"lineHeight": "1.5"
		},
		"elements": {
			"heading": {
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--heading)",
					"fontWeight": "600"
				}
			},
			"h1": { "typography": { "fontSize": "var(--wp--preset--font-size--h1)", "lineHeight": "1.2" } },
			"h2": { "typography": { "fontSize": "var(--wp--preset--font-size--h2)", "lineHeight": "1.2" } },
			"h3": { "typography": { "fontSize": "var(--wp--preset--font-size--h3)", "lineHeight": "1.2" } },
			"h4": { "typography": { "fontSize": "var(--wp--preset--font-size--h4)", "lineHeight": "1.2" } },
			"h5": { "typography": { "fontSize": "var(--wp--preset--font-size--h5)", "lineHeight": "1.2" } },
			"link": {
				"color": { "text": "var(--wp--preset--color--primary)" },
				":hover": { "color": { "text": "var(--wp--preset--color--primary-hover)" } }
			},
			"button": {
				"color": {
					"background": "var(--wp--preset--color--primary)",
					"text": "var(--wp--preset--color--white)"
				},
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--heading)",
					"fontSize": "var(--wp--preset--font-size--button)",
					"fontWeight": "500"
				},
				"border": { "radius": "8px" },
				"spacing": {
					"padding": {
						"top": "var(--wp--preset--spacing--40)",
						"bottom": "var(--wp--preset--spacing--40)",
						"left": "var(--wp--preset--spacing--50)",
						"right": "var(--wp--preset--spacing--50)"
					}
				},
				":hover": { "color": { "background": "var(--wp--preset--color--primary-hover)" } }
			}
		},
		"blocks": {
			"core/post-title": {
				"typography": { "fontFamily": "var(--wp--preset--font-family--heading)" }
			}
		}
	}
}
```

## File: styles/flow-3-medical.json
```json
{
	"$schema": "https://schemas.wp.org/trunk/theme.json",
	"version": 3,
	"title": "Medical Coworking",
	"settings": {
		"color": {
			"palette": [
				{ "slug": "primary", "name": "Primary", "color": "#5886d8" },
				{ "slug": "dark", "name": "Dark", "color": "#0c3072" },
				{ "slug": "light-blue", "name": "Light Blue", "color": "#e2f1ff" },
				{ "slug": "light-gray", "name": "Light Gray", "color": "#f1f1f1" },
				{ "slug": "gray-100", "name": "Gray 100", "color": "#08202c" },
				{ "slug": "gray-80", "name": "Gray 80", "color": "#394d56" },
				{ "slug": "gray-70", "name": "Gray 70", "color": "#52636b" },
				{ "slug": "gray-50", "name": "Gray 50", "color": "#838f95" },
				{ "slug": "gray-30", "name": "Gray 30", "color": "#b5bcc0" },
				{ "slug": "gray-20", "name": "Gray 20", "color": "#ced2d5" },
				{ "slug": "white", "name": "White", "color": "#ffffff" }
			]
		},
		"typography": {
			"fontFamilies": [
				{
					"slug": "heading",
					"name": "Lora",
					"fontFamily": "\"Lora\", serif",
					"fontFace": [
						{
							"fontFamily": "Lora",
							"fontWeight": "400 700",
							"fontStyle": "normal",
							"src": [ "file:./assets/fonts/lora/Lora-VariableFont.woff2" ]
						}
					]
				},
				{
					"slug": "body",
					"name": "Rubik",
					"fontFamily": "\"Rubik\", sans-serif",
					"fontFace": [
						{
							"fontFamily": "Rubik",
							"fontWeight": "400 600",
							"fontStyle": "normal",
							"src": [ "file:./assets/fonts/rubik/Rubik-VariableFont.woff2" ]
						}
					]
				}
			]
		},
		"custom": {
			"radius": {
				"s": "16px",
				"m": "30px",
				"l": "80px"
			}
		}
	},
	"styles": {
		"color": {
			"background": "var(--wp--preset--color--white)",
			"text": "var(--wp--preset--color--gray-100)"
		},
		"typography": {
			"fontFamily": "var(--wp--preset--font-family--body)",
			"fontSize": "var(--wp--preset--font-size--body-m)",
			"lineHeight": "1.5"
		},
		"elements": {
			"heading": {
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--heading)",
					"fontWeight": "600"
				}
			},
			"h1": { "typography": { "fontSize": "var(--wp--preset--font-size--h1)", "lineHeight": "1.25" } },
			"h2": { "typography": { "fontSize": "var(--wp--preset--font-size--h2)", "lineHeight": "1.25" } },
			"h3": { "typography": { "fontSize": "var(--wp--preset--font-size--h3)", "lineHeight": "1.25" } },
			"h4": { "typography": { "fontSize": "var(--wp--preset--font-size--h4)", "lineHeight": "1.25" } },
			"h5": { "typography": { "fontSize": "var(--wp--preset--font-size--h5)", "lineHeight": "1.25" } },
			"link": {
				"color": { "text": "var(--wp--preset--color--primary)" },
				":hover": { "color": { "text": "var(--wp--preset--color--dark)" } }
			},
			"button": {
				"color": {
					"background": "var(--wp--preset--color--primary)",
					"text": "var(--wp--preset--color--white)"
				},
				"typography": {
					"fontFamily": "var(--wp--preset--font-family--body)",
					"fontSize": "var(--wp--preset--font-size--button)",
					"fontWeight": "600"
				},
				"border": { "radius": "16px" },
				"spacing": {
					"padding": {
						"top": "var(--wp--preset--spacing--40)",
						"bottom": "var(--wp--preset--spacing--40)",
						"left": "var(--wp--preset--spacing--50)",
						"right": "var(--wp--preset--spacing--50)"
					}
				},
				":hover": { "color": { "background": "var(--wp--preset--color--dark)" } }
			}
		},
		"blocks": {
			"core/post-title": {
				"typography": { "fontFamily": "var(--wp--preset--font-family--heading)" }
			}
		}
	}
}
```

## File: templates/front-page-medical.html
```html
<!-- wp:template-part {"slug":"header-medical","tagName":"header"} /-->

<!-- wp:pattern {"slug":"medispace/medical-hero"} /-->

<!-- wp:template-part {"slug":"footer-medical","tagName":"footer"} /-->
```

## File: templates/index.html
```html
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group">
    <!-- wp:post-title /-->
    <!-- wp:post-content /-->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->
```

## File: templates/template-construction-home.html
```html
<!-- wp:template-part {"slug":"header-construction","tagName":"header"} /-->
<!-- wp:pattern {"slug":"medispace/construction-hero"} /-->
<!-- wp:template-part {"slug":"footer-construction","tagName":"footer"} /-->
```

## File: functions.php
```php
<?php
/**
 * This file' adds functions to the medispace theme for WordPress.
 *
 * @package medispace
 * @author  Ecdevstudio
 * @license GNU General Public License v2 or later
 * @link    https://medispace.com/
 */

if (!defined("MEDISPACE_THEME_VERSION")) {
    define("MEDISPACE_THEME_VERSION", "1.0.0");
}
if (!defined("MEDISPACE_THEME_URL")) {
    define("MEDISPACE_THEME_URL", get_template_directory_uri());
}
if (!defined("MEDISPACE_THEME_PATH")) {
    define("MEDISPACE_THEME_PATH", get_template_directory());
}
add_filter("should_load_separate_core_block_assets", "__return_true");

require get_template_directory() . "/inc/block-patterns.php";

/**
 * Flow selector.
 */
require MEDISPACE_THEME_PATH . "/inc/flows.php";
require MEDISPACE_THEME_PATH . '/inc/flow-template-resolver.php';
require MEDISPACE_THEME_PATH . "/inc/admin/flow-selector.php";

add_action("init", function () {
    register_block_pattern_category("medispace-sections", [
        "label" => __("MediSpace Sections", "medispace"),
    ]);
});

add_action("wp_enqueue_scripts", function () {
    wp_enqueue_style(
        "medispace-patterns",
        get_template_directory_uri() . "/assets/css/patterns.css",
        [],
        filemtime(
            get_template_directory() . "/assets/fonts/../css/patterns.css",
        ),
    );
});
```

## File: index.php
```php
<?php
// Silence is golden.
```

## File: style.css
```css
/*
Theme Name: Medispace
Theme URI: http://medispace.ecdevstudio.com/
Author: EcDev Studio
Author URI: https://www.ecdevstudio.com/
Description: A premium WordPress theme for medical properties with two style variations built by EcDev Studio.
Version: 1.0.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: medispace
Tested up to: 6.8
Requires PHP: 8.0
Tags: custom-logo, custom-menu

Medispace WordPress Theme, Copyright 2025 EcDev Studio
Medispace is distributed under the terms of the GNU GPL v2 or later.
*/
```

## File: theme.json
```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 3,
  "settings": {
    "appearanceTools": true,
    "layout": {
      "contentSize": "1086px",
      "wideSize": "1380px"
    },
    "color": {
      "custom": true,
      "customDuotone": false,
      "customGradient": false,
      "defaultPalette": false,
      "palette": []
    },
    "typography": {
      "customFontSize": false,
      "fontFamilies": [],
      "fontSizes": [
        { "slug": "body-s", "name": "Body S", "size": "14px", "fluid": false },
        { "slug": "body-m", "name": "Body M", "size": "16px", "fluid": false },
        { "slug": "body-l", "name": "Body L", "size": "18px", "fluid": false },
        { "slug": "button", "name": "Button", "size": "16px", "fluid": false },
        {
          "slug": "h5",
          "name": "H5",
          "size": "20px",
          "fluid": { "min": "18px", "max": "20px" }
        },
        {
          "slug": "h4",
          "name": "H4",
          "size": "24px",
          "fluid": { "min": "20px", "max": "24px" }
        },
        {
          "slug": "h3",
          "name": "H3",
          "size": "28px",
          "fluid": { "min": "22px", "max": "28px" }
        },
        {
          "slug": "h2",
          "name": "H2",
          "size": "36px",
          "fluid": { "min": "28px", "max": "36px" }
        },
        {
          "slug": "h1",
          "name": "H1",
          "size": "52px",
          "fluid": { "min": "34px", "max": "52px" }
        }
      ]
    },
    "spacing": {
      "customSpacingSize": false,
      "units": ["px", "%", "vw", "em", "rem"],
      "spacingSizes": [
        { "slug": "10", "name": "4", "size": "4px" },
        { "slug": "20", "name": "8", "size": "8px" },
        { "slug": "30", "name": "12", "size": "12px" },
        { "slug": "40", "name": "16", "size": "16px" },
        { "slug": "50", "name": "24", "size": "24px" },
        { "slug": "60", "name": "32", "size": "32px" },
        { "slug": "70", "name": "48", "size": "48px" },
        { "slug": "80", "name": "64", "size": "64px" },
        { "slug": "90", "name": "96", "size": "96px" },
        { "slug": "100", "name": "140", "size": "140px" }
      ]
    }
  },
  "templateParts": [
  	{ "name": "header-medical", "title": "Header - Medical", "area": "header" },
  	{ "name": "footer-medical", "title": "Footer - Medical", "area": "footer" },
  	{ "name": "header-construction", "title": "Header - Construction", "area": "header" },
  	{ "name": "footer-construction", "title": "Footer - Construction", "area": "footer" }
  ],
  "customTemplates": [
    {
      "name": "template-construction-home",
      "title": "Construction Home (dev preview)",
      "postTypes": ["page"]
    }
  ]
}
```
