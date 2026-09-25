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
