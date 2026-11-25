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
├── tests/               # Automated tests (run.php runner + *Test.php files)
├── .github/workflows/   # ci.yml – GitHub Actions workflow
├── docs/                # Sprint retrospectives
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

## Run the tests

The automated tests are plain PHP (no Composer or PHPUnit needed) and live in `tests/`:

```bash
php tests/run.php
```

`tests/run.php` loads every `tests/*Test.php` file, runs each test and prints `PASS`/`FAIL`.
It exits with code **1** if any assertion fails, so a failing test also fails CI.

To check PHP syntax locally the same way CI does:

```bash
find . -name "*.php" -not -path "./vendor/*" -not -path "./.git/*" | xargs -n1 php -l
```

## Continuous Integration (GitHub Actions)

Workflow file: [`.github/workflows/ci.yml`](.github/workflows/ci.yml)

| | |
|---|---|
| Triggers | every push to `feature/**`, `bugfix/**` and `main`, and every pull request targeting `main` |
| Runner | `ubuntu-latest` (free GitHub-hosted Linux runner) |
| Steps | 1. check out the code · 2. set up PHP 8.2 (`shivammathur/setup-php`) · 3. `php -l` on **every** `.php` file · 4. `php tests/run.php` |
| Failure | a syntax error or a failed assertion makes the job fail, and the error is shown in the step log |

Runs are listed in the repository's **Actions** tab. Pull requests show the result as the **CI / PHP lint and tests** check.
