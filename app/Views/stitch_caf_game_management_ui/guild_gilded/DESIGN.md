# Design System Document: The Tactile Archive

## 1. Overview & Creative North Star
This design system is built to transform a management tool into a high-end, editorial experience. We are moving away from the "SaaS-in-a-box" aesthetic toward a concept we call **"The Digital Curator."** 

The interface should feel like a premium lounge—sophisticated, atmospheric, and tactile. By leveraging deep teals, brass accents, and layered "glass" surfaces, we create a space that feels authoritative yet inviting. We break the rigid, flat grid of traditional software by using intentional white space, overlapping component layouts, and a dramatic typographic scale that prioritizes readability and brand prestige.

---

## 2. Colors
Our palette is rooted in the "Deep Teal and Brass" aesthetic, providing a moody, high-contrast environment that mimics a dimly lit, upscale café.

### Color Tokens
*   **Primary (Brass):** `#e9c176` (Use for key CTAs and brand moments)
*   **Secondary (Teal-Grey):** `#abcdcc` (Use for subtle accents and iconography)
*   **Background:** `#131313` (The "Dark Room" foundation)
*   **Surface Hierarchy:**
    *   `surface_container_lowest`: `#0e0e0e` (For deep inset areas)
    *   `surface_container`: `#201f1f` (Standard card background)
    *   `surface_container_highest`: `#353534` (For elevated, floating elements)

### The "No-Line" Rule
**Strict Mandate:** Prohibit the use of 1px solid borders for sectioning or containment. Traditional lines clutter the visual field and feel "cheap." Boundaries must be defined solely through:
1.  **Background Shifts:** Place a `surface_container_low` card against the `surface` background.
2.  **Tonal Transitions:** Use subtle shifts in value to indicate a change in context.

### The "Glass & Gradient" Rule
To elevate the experience, utilize **Glassmorphism** for floating menus and navigation overlays.
*   **Backdrop Blur:** Minimum `12px` to `20px`.
*   **Fill:** Use a semi-transparent version of `surface_variant` at 60% opacity.
*   **Signature Textures:** Main CTAs should never be flat. Apply a subtle linear gradient from `primary` (#e9c176) to `on_primary_container` (#bd9852) at a 135-degree angle to simulate the sheen of polished brass.

---

## 3. Typography
We use a dual-font system to balance editorial elegance with functional clarity.

*   **Display & Headlines (Manrope):** This is our "Editorial" voice. Use high-contrast sizing (e.g., `display-lg` at 3.5rem) to create a sense of hierarchy that feels like a premium magazine layout. Use wide tracking (-2%) for headlines to maintain a modern, tight feel.
*   **Body & Labels (Inter):** Our "Functional" voice. Inter provides maximum legibility for dense game data and timing management.

**Typographic Intent:** The massive gap between `display-lg` and `body-md` is intentional. It creates a "heroic" entry point for every page, anchoring the user's focus before they dive into the data.

---

## 4. Elevation & Depth
In this system, depth is a physical property, not a stylistic choice.

*   **The Layering Principle:** Stack `surface-container` tiers to create hierarchy. A "High-Priority" reservation card should sit on `surface_container_highest`, while the background grid sits on `surface_dim`. This creates a natural "lift" without visual noise.
*   **Ambient Shadows:** For floating elements (like game detail modals), use extra-diffused shadows. 
    *   *Values:* `Y: 16px, Blur: 40px, Spread: -4px`. 
    *   *Color:* Use a 10% opacity version of `#000000` tinted with the `secondary` teal to ensure the shadow feels like a part of the environment.
*   **The "Ghost Border" Fallback:** If a border is required for accessibility, it must be a **Ghost Border**: Use `outline_variant` (#414848) at **15% opacity**. It should be felt, not seen.

---

## 5. Components

### Cards & Lists
*   **Roundedness:** Minimum `xl` (1.5rem / 24px) for main dashboard cards. Small UI elements use `md` (0.75rem / 12px).
*   **Separation:** Forbid divider lines. Use **8px to 16px of vertical white space** or a 2% shift in surface color to separate list items.
*   **Status Indicators:** Instead of large colored blocks, use "Glowing Orbs"—8px circular indicators with a soft outer glow in the status color (Green: Available, Yellow: Pending, Red: Occupied).

### Buttons
*   **Primary:** Brass gradient with `on_primary` (#412d00) text. Roundedness: `full`.
*   **Secondary:** Glassmorphic fill (transparent teal tint) with a Ghost Border.
*   **Interaction:** On hover, primary buttons should "glow" slightly using a drop shadow of the primary color at 20% opacity.

### Game-Specific Components
*   **Time Trackers:** Use a circular progress ring using the `secondary` teal. The center of the ring should display time remaining in `headline-sm` Manrope.
*   **Game Chips:** Small, high-radius chips (1.5rem) with icons for "Players," "Duration," and "Difficulty." Use `surface_container_high` as the base.

---

## 6. Do's and Don'ts

### Do:
*   **Embrace Asymmetry:** Align text to the left but allow large imagery or game box art to bleed off the right edge of a container.
*   **Use High-Quality Iconography:** Icons should be thin-stroke (1.5px) and use the `primary` brass color for active states.
*   **Layer Surfaces:** Place "active" game sessions on a higher surface tier than "completed" sessions to visually prioritize real-time management.

### Don't:
*   **Don't use pure white (#FFFFFF):** It breaks the atmospheric "café" vibe. Use `on_surface` (#e5e2e1) for high-contrast text.
*   **Don't use standard shadows:** Never use a default `0 2px 4px rgba(0,0,0,0.5)`. It looks dated. Stick to the Ambient Shadow values defined in Section 4.
*   **Don't crowd the UI:** If a screen feels busy, increase the padding within cards to 32px. Let the layout breathe like a high-end menu.