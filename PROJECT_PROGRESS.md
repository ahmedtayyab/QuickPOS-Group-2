# QuickPOS – Group 2 · Project Progress

> Persistent progress log, so work can resume in a new session.
> Source of truth: `CS4002_QuickPOS_Semester_Project_BCS9C_Fall2026.pdf` (6 pages).

| Field | Value |
|---|---|
| Student | Ahmad Tayyab · 22F-8817 · Group 2 (approved solo member) |
| Course | CS4002 Fundamentals of Software Project Management · Ms. Maham Saleem |
| Repo | https://github.com/ahmedtayyab/QuickPOS-Group-2 (public) |
| Jira | `QuickPOS – Group 2`, key `POS2`, company-managed Scrum, board 67 — https://cfd-team-zfrc5yuo.atlassian.net/jira/software/c/projects/POS2/boards/67 |
| Deadline | 10 Dec 2026, 11:59 PM |
| Last updated | 26 Nov 2026, 02:10 PKT (this local copy is newer than the one in the repo/ZIP) |

## Current status
- **Website complete on `main`:** all six sections, PHP contact form with server-side validation and thank-you page, 22 automated tests, CI green.
- **Sprint 1:** closed (25 Nov 23:40 → 26 Nov 01:22 PKT; official window 23–29 Nov). Retrospective written.
- **Sprint 2:** closed (26 Nov 01:27 → 01:51 PKT; planned end 6 Dec 23:59; official window 30 Nov–6 Dec). 10 issues, 25 SP, nothing carried over. Report + burndown exported.
- **Submission phase: DONE (26 Nov 02:10 PKT).** Viva guide (PR #12), solo contribution summary (PR #13). Evidence report `evidence/report/QuickPOS_Group2_22F-8817_Evidence_Report.pdf` and `evidence/report/QuickPOS_Group2_22F-8817.zip` built from main `ffa8278` and verified by extract-and-run (`evidence/report/zip-verification.txt`). All 46 Jira issues Done and resolved; all 8 Epics Done.
- **Rebuild the report/ZIP** (if anything changes): `python tools/local/build_report.py && node tools/local/build_report_pdf.js && bash tools/local/build_zip.sh`.
- **Dates policy (agreed with Ahmad):** work is not held back by the calendar, but nothing is backdated. Jira keeps the real start and finish times, and each sprint goal states the official window.

## Requirement status (Tasks 1–16)

| Part | Task | Requirement | Marks | Status |
|---|---|---|---|---|
| A | 1 | Design + responsive UI | 23 | ✅ Implemented; QA audit 0 findings at 375/768/1280 |
| A | 2 | Six sections, working nav/CTAs | 7 | ✅ |
| A | 3 | PHP contact form, POST, server validation, thank-you, run docs | 10 | ✅ |
| B | 4 | Scrum project, 8 Epics, 15 Stories (AC, priority, SP, assignee), Tasks, Sub-tasks | 7 | ✅ |
| B | 5 | Two sprints with goals, started/tracked/completed | 7 | ✅ both closed |
| B | 6 | Real bugs, board, burndown/report, retrospectives | 6 | ✅ bugs POS2-45/46 · burndown + report for both sprints · both retros |
| C | 7 | Repo, README, Jira integration, stable main | 5 | ✅ |
| C | 8 | Keyed branches/commits, dev links | 5 | ✅ |
| C | 9 | ≥4 merged PRs, keys, review evidence, CI | 7 | 13 PRs merged with labelled AI-assisted reviews; #7 onwards with CI |
| C | 10 | Participation / solo summary | 3 | ✅ `docs/SOLO_CONTRIBUTION.md` |
| D | 11 | ci.yml, triggers, ubuntu, setup-php | 4 | ✅ |
| D | 12 | php -l on all PHP files, fails on error | 3 | ✅ |
| D | 13 | ≥4 tests in tests/, run in CI, fail on assertion | 5 | ✅ 22 tests |
| D | 14 | Real failed run → fix → pass | 3 | ✅ run 45696094635 ❌ → 45696329450 ✅ |
| E | 15 | ZIP + PDF/Word evidence report | 2 | ✅ built and verified; Ahmad submits it |
| E | 16 | Viva + VIVA_GUIDE.md | 3 | ✅ guide (PR #12); live viva by Ahmad |

## Jira map
| Epic | Key | Children (all Done unless noted) |
|---|---|---|
| Project Setup & Integration | POS2-1 | POS2-9, 10, 11, 12 |
| Navigation & Header | POS2-2 | POS2-13, 14, 15 · sub-tasks 30–33 |
| Hero | POS2-3 | POS2-16, 17 · sub-tasks 34, 35 · Bug POS2-46 |
| Features | POS2-4 | POS2-18 · sub-task 36 |
| Pricing | POS2-5 | POS2-19, 20 · sub-task 37 |
| Contact | POS2-6 | POS2-21, 22, 23 · sub-tasks 38–40 · Bug POS2-45 |
| Footer | POS2-7 | POS2-24 |
| Testing & CI | POS2-8 | POS2-25, 26, 27 · sub-tasks 41–43 · POS2-44 docs · POS2-29 viva · POS2-28 report/ZIP |

Sprint ids: Sprint 1 = 136 (closed), Sprint 2 = 137 (closed). Story Points field `customfield_10041`.

## Pull requests (all by `ahmedtayyab`, branches kept)
| PR | Branch | Jira | Review findings fixed | CI |
|---|---|---|---|---|
| #1 | feature/POS2-12-php-structure | POS2-12 | require_once; overflow masking | – |
| #2 | feature/POS2-13-header-navigation | POS2-13/14/15 | no-JS overflow 393→375; layout flash | – |
| #3 | feature/POS2-16-hero-section | POS2-16/17 | floating cards over mockup; wrapping | – |
| #4 | feature/POS2-18-feature-cards | POS2-18/36 | icons.php dependency; card colour | – |
| #5 | feature/POS2-19-pricing-plans | POS2-19/37 | aria-live; equal heights | – |
| #6 | feature/POS2-24-footer | POS2-24 | timezone for year; 44px targets | – |
| #7 | feature/POS2-26-ci-workflow | POS2-26/41/42/44 | PHP 8.1 minimum; null-separated lint | ✅ |
| #8 | feature/POS2-22-contact-validation | POS2-22/25/38/39, Bug 45 | Unicode whitespace | ❌ then ✅ (TDD) |
| #9 | feature/POS2-21-contact-form | POS2-21/22/23/20/40 | stale #contact fragment; cookie flags | ✅ |
| #10 | bugfix/POS2-46-mockup-contrast | Bug POS2-46 | – (verified other uses) | ✅ |
| #11 | feature/POS2-44-docs-sprint2 | POS2-44 | hard-coded test count; tree glyphs | ✅ |
| #12 | feature/POS2-29-viva-guide | POS2-29 | pre-viva PHP check | ✅ |
| #13 | feature/POS2-28-submission | POS2-28 | numbers tied to a commit | ✅ |

Review method: GitHub review comment titled "AI-assisted code review (Claude Code) — not an independent human review", then fix commits and a resolution comment. No fake reviewers.

## Outstanding manual actions (Ahmad)
1. ~~Review arrangement~~ — settled by Ahmad (26 Nov): solo AI-assisted review on every PR; no external confirmation needed.
2. **Enable the Jira Reports view:** board → "+" next to the tabs → Reports → *Add to navigation*. Then Claude can capture Jira's native sprint report and burndown for both sprints.
3. Revoke the Jira API token after the project (it was pasted in chat).
4. Prepare for the viva with `VIVA_GUIDE.md` (to be written, POS2-29).

## Marks at risk
- Task 9 (7): reviews are AI-assisted (solo group, no second reviewer); PRs #1–#6 have no CI checks (CI arrived in Sprint 2).
- Task 6 (6): burndown is generated from Jira data until the native Reports view is enabled.
- Task 5 (7): Sprint 1 started late (25 Nov), and both sprints ran on 25–26 Nov instead of the official weeks. Recorded truthfully; the timing may be questioned in evaluation.

## Next steps
1. Ahmad: (optional) enable the Jira Reports view so native sprint report/burndown screenshots can be added.
2. Ahmad: make sure the Jira project can be opened by whoever evaluates it; submit the ZIP before 10 Dec 2026, 11:59 PM; practise the demo in VIVA_GUIDE.md.
3. Optional: upgrade `actions/checkout` to a Node 24 version (CI shows a Node 20 deprecation warning).

Local tools (gitignored, `tools/local/`): `jira.py` (REST), `burndown.py`, `shot.js`, `qa_full.js` (axe audit), `qa_nav.js`, `qa_pricing.js`, `qa_contact.js`, `shot_github.js`. Dev server: `php -S localhost:8000`.
