---
paths:
  - 'resources/js/**'
---

# Js

## Style from the sheet-this.pen design tokens, not raw hex
The visual source of truth is `sheet-this.pen` in the repo root (pen.dev, plain JSON; register the `pencil` MCP in .mcp.json to screenshot frames). Its variables are mirrored as Tailwind v4 `@theme` tokens in resources/css/app.css: `bg-accent`/`text-accent` (#7C3AED), `bg-accent-dark` (#1E1B4B auth brand panels), `bg-accent-light`, `bg-inset` (#F8F7FC), `border-divider`, `bg-brand-card`, `text-brand-muted`, `bg-danger`. Use those plus stock `gray-*`; never `bg-[#hex]` or `violet-*`. Inter is `font-sans`/`font-inter`; all numerals, durations and MON-style labels use `font-jetbrains`. Icons are lucide-react. Auth pages compose `Layouts/AuthLayout` + `Components/Form/TextInput|Checkbox|PasswordToggle`; link routes through Wayfinder (`@/routes`, `@/actions`), never hardcoded paths.
