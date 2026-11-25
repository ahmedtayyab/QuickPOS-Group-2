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
├── index.php                 # Landing page: handles the contact POST, then renders every section
├── thank-you.php             # Shown after a valid contact submission (Post/Redirect/Get)
├── src/
│   ├── ContactValidator.php  # Server-side validation rules (no HTML, unit-tested)
│   └── ContactForm.php       # Form state: plan pre-fill (?plan=pro) and submit result
├── includes/
│   ├── config.php            # Constants, nav links, e() escaping, pkr() prices, start_session()
│   ├── contact-handler.php   # Runs before any HTML: validate, re-show errors or redirect
│   ├── icons.php             # Inline SVG icon set and icon() helper
│   └── head.php / foot.php   # <head> and closing scripts
├── sections/                 # One PHP partial per landing-page section = one Jira Epic
│   └── header.php  hero.php  features.php  pricing.php  contact.php  footer.php
├── assets/
│   ├── css/styles.css        # Design tokens, layout and components
│   ├── js/main.js            # Mobile menu, billing toggle, error-summary focus
│   └── img/logo-mark.svg
├── tests/                    # run.php runner + *Test.php files (validator, form, helpers)
├── .github/workflows/ci.yml  # GitHub Actions: php -l on every file + tests
├── docs/RETROSPECTIVES.md    # Sprint 1 and Sprint 2 retrospectives
├── docs/SOLO_CONTRIBUTION.md # Solo work summary, review arrangement, AI use
├── VIVA_GUIDE.md             # Viva explanations, questions and demo sequence
├── PROJECT_PROGRESS.md       # Requirement and sprint progress log
└── EVIDENCE_CHECKLIST.md     # Evidence mapped to Tasks 1–16
```

## How the contact form works

1. The form posts (`method="post"`) to `index.php`.
2. `includes/contact-handler.php` runs before any HTML and passes `$_POST` to `ContactValidator::validate()`.
3. **Invalid input:** the page is shown again at `#contact` with an error summary, a message under each wrong field, and the typed values kept (escaped with `e()`).
4. **Valid input:** a 303 redirect to `thank-you.php`, which thanks the sender by name. The submission is **simulated**: no email is sent and nothing is stored, so no database or mail server is needed.
5. Pricing buttons link to `?plan=basic|pro|enterprise#contact`, which pre-fills the message with the chosen plan.

## Run locally

1. Install PHP 8.1 or newer and check it works: `php -v`
2. From the project folder start PHP's built-in server:

   ```bash
   php -S localhost:8000
   ```

3. Open http://localhost:8000 in a browser.
4. Try the form: submit it empty to see the validation messages, then fill in a name, a valid email and a message to reach the thank-you page.

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
find . -name "*.php" -not -path "./vendor/*" -not -path "./.git/*" -print0 | xargs -0 -n1 php -l
```

## Continuous Integration (GitHub Actions)

Workflow file: [`.github/workflows/ci.yml`](.github/workflows/ci.yml)

| | |
|---|---|
| Triggers | every push to `feature/**`, `bugfix/**` and `main`, and every pull request targeting `main` |
| Runner | `ubuntu-latest` (free GitHub-hosted Linux runner) |
| Steps | 1. check out the code · 2. set up PHP 8.1, the minimum supported version (`shivammathur/setup-php`) · 3. `php -l` on **every** `.php` file · 4. `php tests/run.php` |
| Failure | a syntax error or a failed assertion makes the job fail, and the error is shown in the step log |

Runs are listed in the repository's **Actions** tab. Pull requests show the result as the **CI / PHP lint and tests** check.
