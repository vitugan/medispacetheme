# MediSpace Theme — Project Context Brief

Purpose: this document summarizes decisions and history that are NOT visible from the
code alone, gathered in a planning conversation before starting a `/grill-with-docs`
session. Hand this to the agent as the first message so it doesn't have to re-derive
context the codebase can't show.

## Goal

An FSE (block theme) WordPress theme called **MediSpace**, built for sale on ThemeForest.
The theme ships as **multiple niche "flows"** — the buyer picks one niche at install time,
via a classic one-click demo-import, and works only within that niche afterward.
No runtime switching between flows is required or planned.

## Flows

- **Medical Coworking** (`medical`) — healthcare/therapy office space rental. Has a Figma
  design and a companion plugin (`MediSpace Core`) with CPTs tailored to it.
- **Construction Firm** (`construction`) — company/construction firm design. Has a Figma
  design. No dedicated plugin functionality yet identified.
- **Listings/Marketplace** (`listings`) — planned for the future. Not designed, not
  started. Not part of the current scope.

## History — why v1 was abandoned

The first attempt mixed two incompatible mechanisms for changing the site's look:
- Classic WordPress Customizer for colors/fonts (`inc/customizer/wp-customize-colors.php`,
  `wp-customize-global-styles-setting.php`)
- SCSS presets per flow (`_flow-1.scss`, `_flow-3.scss` — note: no `_flow-2.scss` existed)
- Classic TGM Plugin Activation + XML demo-import (`demo/content.xml` +
  `medispace-customizer.dat`)

Flows were inconsistently implemented (some had header/footer pattern variants, some
didn't), and it was never clear which mechanism was actually responsible for switching
the design. This is what triggered the restart — not a code-quality problem so much as
an unresolved product question: **how does the buyer choose a design, and what changes
when they do?**

## Decision made (locked)

The buyer chooses a flow **once**, during install, via demo-import. After that, the site
runs only inside that flow. This is the classic ThemeForest multi-demo pattern, not
Gutenberg's native runtime style-switching.

## Current state — v2 (the codebase to align against)

v2 is a cleaner, FSE-native rewrite of the flow concept:

- `inc/flows.php` — single registry of available flows (label, description, style
  variation slug, template/part paths). Everything else reads from here.
- `inc/flow-template-resolver.php` — resolves generic `header` / `footer` / `front-page`
  slugs to the active flow's file at render time, via `get_block_template(s)` filters.
  Correctly defers to a DB override (user's own Site Editor customization) when one
  exists — the flow file is only a fallback.
- `styles/flow-2-construction.json`, `styles/flow-3-medical.json` — native FSE style
  variations holding colors + font families per flow. Root `theme.json` holds shared
  spacing/font-size tokens and has an intentionally empty color palette (colors only ever
  come from the active flow's style variation).
- `inc/patterns/<flow>/*.php` — per-flow block patterns. Currently only one pattern exists
  per flow (`hero.php` for medical and construction each) — full page sets (About,
  Services, Contact, Portfolio, etc.) are not yet built.
- `inc/admin/flow-selector.php` — a **development-only** admin tool to switch the active
  flow while building. Must be disabled/hidden before the Envato submission — this is
  already flagged in the existing completion plan but not yet implemented.
- `.agents/COMPLETION_PLAN.md` — an existing 4-phase plan already drafted (Core/demo-import
  → refactor & i18n → manual QA → packaging). Treat this as a first draft to pressure-test,
  not as ground truth — it may have gaps or an ordering that doesn't hold up.
- `.agents/pen-to-fse-skill-design.md` — a fully speculed-out Claude Code skill
  (`pen-to-fse`) for turning Pencil/pen.dev design sections into block patterns for this
  theme, following a node-to-block mapping with a pre-write approval outline and a
  validator script. This is a tool to help build the missing patterns, not itself part of
  the theme's runtime.

## Companion plugin — MediSpace Core

A separate plugin providing the niche-specific functionality the theme's blocks/patterns
depend on:
- CPTs: `Services`, `Projects` (implemented). `Team` and `FAQ` are toggleable in the
  settings UI and mentioned in the plugin's own CLAUDE.md, but **no corresponding class
  exists yet** — toggling them on currently does nothing. This looks like a genuine gap,
  not a deliberate deferral.
- Custom blocks: `cover-map-block` (interactive map w/ search, Leaflet-based),
  `custom-quote`, `site-logo-custom`, `site-logo-sticky`, `swiper-slider`.
- A simple React-based admin settings screen (feature toggles only — no design/demo
  selection logic lives here; that's entirely the theme's job via `inc/flows.php`).

## Build status inventory (what's already done, per flow)

This is the concrete state as of this writing — use it so the grill session doesn't
re-litigate work that's finished, and doesn't miss it either.

| Piece | Medical | Construction | Notes |
|---|---|---|---|
| Header (template part) | ✅ Done — `parts/header-medical.html` | ✅ Done — `parts/header-construction.html` | Real content, matches Figma (logo, nav, phone, CTA button for medical; construction variant differs) |
| Footer (template part) | ✅ Done — `parts/footer-medical.html` | ✅ Done — `parts/footer-construction.html` | Real content: contact info, license number (construction), social links |
| Hero (pattern) | ✅ Done — `inc/patterns/medical/hero.php` | ✅ Done — `inc/patterns/construction/hero.php` | |
| Home page assembly | ⚠️ Only header + hero + footer | ⚠️ Only header + hero + footer | `templates/front-page-medical.html` and `template-construction-home.html` have nothing between hero and footer yet |
| About / Services / Team / Process / CTA / Map sections | ❌ Not built | ❌ Not built | This is the actual remaining work — not the header, not the flow mechanism |
| Style variation (colors/fonts) | ✅ Done — `styles/flow-3-medical.json` | ✅ Done — `styles/flow-2-construction.json` | |
| Flow registry + template resolver | ✅ Done — `inc/flows.php`, `inc/flow-template-resolver.php` | (shared, flow-agnostic) | |
| Demo import (OCDI/TGM wiring) | ❌ Not wired up in v2 | ❌ Not wired up in v2 | v1 had a version of this, but it predates the flow registry and can't be reused as-is |
| Companion plugin CPTs | ✅ Services, Projects | — (no CPT need identified yet) | Team/FAQ toggles exist in plugin settings but have no implementing class |

## Reusable reference material from earlier attempts (v1)

v1 is not directly portable into v2 — it used a different mechanism (classic Customizer +
SCSS presets) and its content was written for an earlier, more real-estate-agency-flavored
version of the site, not literally "Medical Coworking" or "Construction Firm" copy. But its
`patterns/general/*.php` and `patterns/hero/*.php` files (services, team, process, map,
our-projects, slider, call-to-action, info sections) are useful as **structural reference**
— layout and block choices to adapt, not content or markup to copy verbatim — when building
the missing sections listed above. Treat this as a source to consult per-section while
building each flow's remaining page, not as a batch migration.

## Known gaps worth surfacing in the grill session

- Only header, footer, and hero are built per flow; the page sections in between (About,
  Services, Team, Process, CTA, Map, etc.) are the actual remaining scope — see the build
  status inventory above.
- The demo-import mechanism (OCDI/TGM, per the completion plan) is planned but not yet
  actually wired up in v2 — v1's version can't be reused as-is since it predates the
  flow registry.
- `flow-selector.php` has no implemented mechanism yet for being hidden/disabled at
  package time (currently just a checklist item).
- Alt text in existing patterns is hardcoded and not i18n-wrapped (a known
  pre-existing inconsistency, low priority).
- `Team`/`FAQ` CPT classes are missing despite being toggleable — needs a decision:
  implement them, or remove the toggles until they're ready.
- The Construction flow has no plugin-backed CPT identified yet — unclear if it needs one
  or is pure static/page-built content.