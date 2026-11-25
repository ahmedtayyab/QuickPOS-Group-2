# Viva Guide — QuickPOS (Group 2)

Ahmad Tayyab · 22F-8817 · CS4002 · approved solo member

Short, plain explanations of everything in this project, the questions you are likely to be asked, and the exact order for the live demo.
Read it once end to end, then practise the demo twice.

---

## 1. Live demo sequence (about 8 minutes)

**Before the viva (5 minutes):**
1. Open a **new** terminal in the project folder and check `php -v` shows PHP 8.1 or newer.
   If `php` is not recognised on the machine: `winget install --id PHP.PHP.8.4 -e`, then open a new terminal.
2. Run `php -S localhost:8000` and keep that terminal open.
3. Sign in to Jira (Ahmad's account) and GitHub in the browser, and close any extra tabs.

Open these tabs in order:

| # | Open | Show and say |
|---|---|---|
| 1 | http://localhost:8000 | "This is the QuickPOS landing page, built with PHP, HTML, CSS and JavaScript." Scroll through the **six sections**: header, hero with the POS mockup, features, pricing, contact, footer. |
| 2 | Same page | Click **Features / Pricing / Contact** in the header (smooth scroll). Click **Sign Up** (goes to Pricing) and **Get Started** (goes to Pricing). |
| 3 | Browser DevTools → device toolbar → 375px | The menu collapses into a **hamburger button**; open and close it. "No horizontal scrolling at 375, 768 and 1280px." |
| 4 | Pricing | Switch **Monthly / Yearly**. Click **Choose Pro**: the contact form opens with the message pre-filled with the Pro plan. |
| 5 | Contact form | Submit it **empty**: the error summary and three messages come **from the PHP server**. Then enter an **invalid email** (`sara@`) and show that the email message changes and the name you typed is kept. |
| 6 | Contact form | Fill in a valid name, email and message, then submit: the **thank-you page** uses your name. Refresh: the form is **not** sent again (Post/Redirect/Get). |
| 7 | Terminal | `php tests/run.php` shows **22 passed, 0 failed**. |
| 8 | GitHub → Actions | The CI workflow, the **failed run** [45696094635](https://github.com/ahmedtayyab/QuickPOS-Group-2/actions/runs/45696094635) and the **passing run** [45696329450](https://github.com/ahmedtayyab/QuickPOS-Group-2/actions/runs/45696329450). Open `.github/workflows/ci.yml`. |
| 9 | GitHub → Pull requests → Closed | All merged PRs, each with a Jira key. Open **PR #8**: the review comment, the fix commit, and green checks. |
| 10 | Jira → POS2 board → Backlog | 8 Epics, the stories with story points, the two completed sprints. Open **POS2-22**: acceptance criteria, 5 SP, and the **Development** panel showing linked GitHub commits and the PR. |
| 11 | Jira → filter Work type = Bug | POS2-45 and POS2-46 with steps to reproduce and resolution. |
| 12 | `docs/RETROSPECTIVES.md` + burndown images | What went well, the problems, and the improvement actions for both sprints. |

If something fails during the demo, stay calm and explain what should happen. Everything is also in the evidence report.

---

## 2. Project overview
QuickPOS is a **fictional Point of Sale product**. The task was to build its **marketing landing page**, not a real POS. The project is assessed on the website (40), Jira Scrum (20), GitHub workflow (20), CI and tests (15) and the submission and viva (5).

## 3. Website architecture and file structure
- `index.php` is the entry point. It first runs `includes/contact-handler.php`, which handles the form and must run before any HTML. Then it includes one file per section from `sections/`.
- **One section file = one Jira Epic**, which makes the work easy to trace.
- `includes/config.php` holds shared settings and helpers: navigation links, `e()` for safe output, `pkr()` for prices, and `start_session()`.
- `src/ContactValidator.php` holds the validation rules. It contains **no HTML**, so it can be tested on its own.
- `src/ContactForm.php` prepares the form: it pre-fills the plan and turns a validation result into "ok / not ok".
- `assets/css/styles.css` contains the design system: colours, type sizes and spacing as CSS variables, then components.
- `assets/js/main.js` only adds extras (mobile menu, billing toggle, focusing the error box). **The site works without JavaScript.**
- `tests/` holds the test runner and the tests. `.github/workflows/ci.yml` is the CI pipeline.

## 4. PHP implementation
- PHP renders the page from **data arrays** (features, plans, footer links), which is better than copying the same HTML many times.
- Every value printed into HTML goes through `e()` (`htmlspecialchars`), which stops **HTML/JavaScript injection (XSS)**.
- No database, no real email and no login, as the brief requires.

## 5. Contact-form validation
1. The form uses `method="post"`.
2. The handler calls `ContactValidator::validate($_POST)`.
3. Rules: name, email and message are **required** after trimming spaces, including Unicode spaces. The email must pass `filter_var(…, FILTER_VALIDATE_EMAIL)`. The name can be at most 100 characters and the message at most 2000.
4. **Errors:** the page is shown again with a summary, a message under each field, and the typed values kept.
5. **Valid input:** the server answers with a **303 redirect** to `thank-you.php`. This is **Post/Redirect/Get**, so refreshing the page can't send the form twice. The submission is **simulated**.

## 6. Server-side versus client-side validation
- **Client-side** (in the browser) is quick feedback, but anyone can turn it off or send a request without the page.
- **Server-side** (PHP) can't be skipped, so it is the one we **trust**.
- The form uses `novalidate` so the **PHP messages** are what you see, which proves server-side validation works.

## 7. Jira hierarchy
**Epic → Story/Task → Sub-task.**
- **Epic:** a large feature, here one per website section plus Setup and Testing & CI (8 in total).
- **Story:** a user need, written as "As a … I want … so that …". There are 15, each with acceptance criteria, priority, story points and assignee.
- **Task:** technical work that isn't a user feature (repo setup, CI, evidence report).
- **Sub-task:** a small step inside a story (for example "Write failing validation tests first").
- **Bug:** a real defect: POS2-45 and POS2-46.

## 8. Acceptance criteria and story points
- **Acceptance criteria** are the testable conditions that make a story "done", for example "Empty Name is rejected with a message".
- **Story points** measure relative **effort and complexity**, not hours. Here 1 = tiny, 2–3 = small, 5 = biggest. The hero mockup and validation were 5 points.

## 9. Scrum, sprint planning, burndown, retrospective
- **Scrum** delivers work in short, fixed **sprints**, each with a **sprint goal**.
- **Sprint planning:** choose estimated stories from the backlog that fit the sprint and write the goal.
- **Board:** To Do → In Progress → Done. In this project an item moved to Done **only after its PR was merged**.
- **Burndown chart:** story points remaining over time. It should trend down to 0. Jumps up mean scope was added (Pricing and Footer in Sprint 1; the bugs and docs task in Sprint 2).
- **Retrospective:** what went well, what went wrong, and **one concrete improvement**. Sprint 1's action was "CI first in Sprint 2", and it was done.

## 10. Git, commits, pull requests, code review
- **Branch:** a separate line of work, named with the Jira key, for example `feature/POS2-22-contact-validation` or `bugfix/POS2-46-mockup-contrast`. `main` stays stable.
- **Commit:** a saved change with a message that starts with the Jira key, for example `POS2-39: Implement server-side contact validation…`.
- **Pull request (PR):** a request to merge a branch into `main`. It shows the changes, the CI result and the review.
- **Code review:** someone checks the change before merge. **Solo arrangement:** each PR has an **AI-assisted review comment, clearly labelled as not an independent human review**, followed by fix commits and a comment explaining each fix. Real problems found this way include overflow at 375px, cards covering the mockup, Unicode spaces passing validation, and session-cookie flags.

## 11. Jira–GitHub integration
The **GitHub for Atlassian** app connects the repository to Jira. Because branch names, commits and PR titles contain keys like `POS2-22`, Jira shows them in each issue's **Development** panel. That is **traceability**: issue → branch → commits → PR → CI → merge.

## 12. Continuous Integration, GitHub Actions and YAML
- **CI** automatically builds and checks every change so problems are found early.
- **GitHub Actions** is GitHub's free CI service. The pipeline is described in a **YAML** file: `.github/workflows/ci.yml`.
- **Triggers (`on:`):** pushes to `feature/**`, `bugfix/**` and `main`, and pull requests into `main`.
- **Runner:** `ubuntu-latest`, a free GitHub-hosted Linux machine.
- **Steps:** check out the code → set up PHP 8.1 → `php -l` on **every** `.php` file → `php tests/run.php`.
- If any step returns a non-zero exit code, the job **fails** and the PR shows a red ✗.

## 13. PHP syntax linting
`php -l file.php` checks the syntax without running the code. CI uses `find` to list **all** PHP files and `xargs` to lint each one. A syntax error makes `php -l` return 1, which fails the step and shows the error in the log.

## 14. Automated testing
- Plain-PHP runner `tests/run.php` (no Composer or PHPUnit). Every `tests/*Test.php` file returns named test functions.
- `assert_true` / `assert_same` throw an error when a check fails. The runner counts failures and **exits 1** if there are any, so CI fails.
- 22 tests, including the 4 mandatory ones: empty name, invalid email, empty message, valid input accepted.
- Run locally with `php tests/run.php`.

## 15. CI failure and resolution (Task 14)
- Using **test-driven development**, the validation tests were committed **before** the rules existed; the validator was a stub that accepted everything.
- CI run **45696094635 failed**: 6 passed, 9 failed, "Process completed with exit code 1".
- The rules were then implemented, and run **45696329450 passed** (16 tests at that point).
- A real bug was also found along the way: `mb_strlen()` didn't exist on the local PHP, because the mbstring extension wasn't loaded (Bug POS2-45). It was fixed by counting characters with `preg_match_all`.

## 16. Solo contribution and AI assistance
- The instructor approved working alone. All Jira work, commits and PRs are under **Ahmad Tayyab / `ahmedtayyab`**.
- **AI assistance (Claude Code)** was used for coding, reviews, QA automation and documentation. The course allows AI tools; the student remains responsible for understanding and explaining the work. Commits carry a `Co-Authored-By: Claude` line, and reviews are labelled AI-assisted.
- Be ready to explain any file in your own words, especially `ContactValidator.php`, `contact-handler.php`, `ci.yml` and `tests/run.php`.

---

## 17. Likely viva questions (short answers)

**Why PHP and not just HTML?** PHP does real work here: it renders sections from data, validates the form on the server and redirects to the thank-you page.

**Where is the validation and why is it separate?** In `src/ContactValidator.php`. Keeping it separate from the HTML lets the tests check it directly, without a browser.

**What does `htmlspecialchars` / `e()` do?** It turns `<`, `>`, `"` and `'` into HTML entities, so user input is shown as text and can't run as code (XSS protection).

**What is Post/Redirect/Get?** After a successful POST, the server redirects to a GET page. Refreshing that page doesn't send the form again.

**Why `novalidate`?** So the browser doesn't block the submit, and the server-side messages are what users see. The server is the real check.

**What happens if JavaScript is off?** Everything still works: the links stay visible, the form posts normally, and monthly prices show.

**How does the plan pre-fill work?** Pricing buttons link to `?plan=pro#contact`. `ContactForm::initial()` accepts only `basic`, `pro` or `enterprise` and writes the plan into the message.

**Difference between a Story, a Task and a Bug?** A story is a user need with acceptance criteria. A task is technical work. A bug is a defect, with steps to reproduce, expected and actual behaviour, and a resolution.

**What is a sprint goal? Give yours.** One sentence saying why the sprint matters. Sprint 2: deliver the tested PHP contact form, CI, QA and bug fixes.

**What does the burndown show for your sprints?** Remaining story points falling to 0. The steps up are scope added during the sprint, and they are recorded in Jira.

**Why did your sprints run on 25–26 November instead of the official weeks?** The project was set up late (25 Nov). The work finished early, and Jira keeps the **real** dates; nothing was backdated. Each sprint goal names its official window.

**What triggers your CI?** Pushes to feature/bugfix branches and to main, plus pull requests into main.

**How do you know a failing test fails CI?** `run.php` exits with code 1 when any test fails, and Actions marks a non-zero exit as failed. Run 45696094635 proves it.

**How were PRs reviewed in a solo group?** With an AI-assisted review comment, clearly labelled as such. Real findings were fixed in follow-up commits, and CI had to pass before merge. *(Explain whatever arrangement Ms. Maham Saleem approved.)*

**What would you improve next?** Upgrade `actions/checkout` to a version that runs on Node.js 24 (CI currently shows a deprecation warning), turn on Jira's native Reports view, and get an independent human reviewer.

**What bugs did you find?** POS2-45: `mb_strlen()` missing without mbstring. POS2-46: low colour contrast in the mockup, found by the axe accessibility audit. Plus problems caught in PR reviews before merge.

**How did you check responsiveness?** Automated Playwright tests at 375, 768 and 1280px check for horizontal overflow, clipped text and overlapping controls, plus an axe-core accessibility audit, and screenshots were saved for the report.
