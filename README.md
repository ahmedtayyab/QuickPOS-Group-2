# QuickPOS – Group 2

Marketing landing page for **QuickPOS**, a fictional Point of Sale (POS) product, built for
**CS4002 – Fundamentals of Software Project Management** (FAST-NUCES, Chiniot-Faisalabad Campus, Fall 2026).
The project is a landing page, not a full POS system: PHP renders the page and handles the contact form.

| | |
|---|---|
| Group ID | 2 (approved solo member) |
| Student | Ahmad Tayyab — 22F-8817 |
| Instructor | Ms. Maham Saleem |
| Jira project | QuickPOS – Group 2 (key `POS2`) |
| Repository | https://github.com/ahmedtayyab/QuickPOS-Group-2 |

## Technologies

- **PHP 8.1+** (no framework, no database) — page rendering and contact-form handling
- **HTML5, CSS3** (custom design system with CSS variables), **vanilla JavaScript**
- **Jira Software (Scrum)** for planning, **GitHub** for version control and pull requests
- **GitHub Actions** for continuous integration

## Project structure

```
QuickPOS-Group-2/
├── index.php            # Landing page entry point (includes each section)
├── includes/
│   ├── config.php       # Site constants, navigation links, e() escaping helper
│   ├── head.php         # <head>, fonts, stylesheet
│   └── foot.php         # Scripts and closing tags
├── sections/            # One PHP partial per landing-page section (one per Jira Epic)
├── assets/
│   ├── css/styles.css   # Design tokens, base styles and components
│   ├── js/main.js       # Progressive enhancements (menu, etc.)
│   └── img/             # Logo and icons (SVG)
├── PROJECT_PROGRESS.md  # Sprint and requirement progress log
└── EVIDENCE_CHECKLIST.md
```

## Run locally

1. Install PHP 8.1 or newer and check it works: `php -v`
2. From the project folder start PHP's built-in server:

   ```bash
   php -S localhost:8000
   ```

3. Open http://localhost:8000 in a browser.

No database, email server or login is required.

> Testing and CI instructions are added in Sprint 2 (POS2-25, POS2-26).
