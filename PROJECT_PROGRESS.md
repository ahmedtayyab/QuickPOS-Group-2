# QuickPOS – Group 2 · Project Progress

> Persistent progress log. Update after every working session so work can resume in a new Claude session.
> Source of truth: `CS4002_QuickPOS_Semester_Project_BCS9C_Fall2026.pdf` (6 pages, read in full on 25 Nov 2026).

| Field | Value |
|---|---|
| Student | Ahmad Tayyab · 22F-8817 |
| Group | 2 (approved solo member) |
| Course | CS4002 Fundamentals of Software Project Management · Ms. Maham Saleem |
| Repo | https://github.com/ahmedtayyab/QuickPOS-Group-2 (public) |
| Jira | `QuickPOS – Group 2`, key `POS2`, company-managed Scrum — https://cfd-team-zfrc5yuo.atlassian.net/jira/software/projects/POS2 (created 25 Nov 2026) |
| Deadline | 10 Dec 2026, 11:59 PM |
| Last updated | 25 Nov 2026 (late evening) |

## Current status (25 Nov 2026)

- **Current sprint (official):** Sprint 1 (23–29 Nov). It started 2 days before this project was set up.
- **Schedule slip (truthful record):** The 22 Nov setup milestone and the first 2 days of Sprint 1 were missed. No activity will be backdated. Jira Sprint 1 will be started on its real start date (planned 25/26 Nov) and end 29 Nov. Recommend telling the instructor about the late start.

## Environment (checked 25 Nov 2026)

| Tool | Status |
|---|---|
| Git | 2.56.0 ✅ |
| GitHub CLI | 2.105.0 ✅ — signed in as `ahmedtayyab` (project account) |
| PHP | 8.4.28 installed via winget ✅ (open a new terminal so `php` is on PATH) |
| Node / Python | Node 24, Python 3.14 ✅ (for Playwright screenshots / report generation) |
| Jira access | Browser session as Ahmad Tayyab ✅; REST API token ✅ (stored outside repo in `%USERPROFILE%\.quickpos-jira.env`, never committed) |

## Requirement checklist (Tasks 1–16)

| Part | Task | Requirement | Marks | Status |
|---|---|---|---|---|
| A | 1 | Product design & responsive UI (visual 15 + responsive 8) | 23 | Pending |
| A | 2 | Six required sections (Nav, Hero, Features, Pricing, Contact, Footer) | 7 | Pending |
| A | 3 | PHP contact form, POST, server validation, thank-you page, run docs | 10 | Pending |
| B | 4 | Jira Scrum project, ≥6 Epics, ≥10 Stories (desc, AC, priority, SP, assignee), Tasks/Subtasks | 7 | Done in Jira — screenshots pending |
| B | 5 | Two one-week sprints, goals, start/track/complete | 7 | Sprint 1 active |
| B | 6 | Real bugs in Jira, board, burndown/sprint report, 2 retrospectives | 6 | Pending |
| C | 7 | Repo, README, Jira–GitHub integration, stable main | 5 | Repo + integration done; README to complete |
| C | 8 | Jira-keyed branches and commits, dev links in Jira | 5 | Pending |
| C | 9 | ≥4 merged PRs with keys, review evidence, CI passing | 7 | Pending · **needs solo review arrangement** |
| C | 10 | Participation evidence + work-division summary | 3 | Pending · adapted for solo |
| D | 11 | `.github/workflows/ci.yml`, triggers, ubuntu runner, setup-php | 4 | Pending |
| D | 12 | `php -l` on all PHP files, fails CI on error | 3 | Pending |
| D | 13 | ≥4 tests in `tests/` (empty name, bad email, empty message, valid) | 5 | Pending |
| D | 14 | Real failed CI run → fix → passing run | 3 | Pending |
| E | 15 | ZIP + PDF/Word evidence report labelled Parts A–E, Tasks 1–16 | 2 | Pending |
| E | 16 | Live viva + `VIVA_GUIDE.md` | 3 | Pending |

## Requirements affected by solo status (need instructor confirmation)

The PDF says groups of 1 need "suitable contribution and PR-review arrangements" agreed with the instructor.

1. **Task 9.2** – "at least two PRs authored by each student" → solo: all ≥4 PRs authored by Ahmad.
2. **Task 9.4** – "the other group member must review each PR" → **no second member exists.** Options to put to the instructor: (a) instructor/TA reviews PRs, (b) documented self-review + AI-assisted review comments clearly labelled as such, (c) a classmate as reviewer. **Not treated as complete until you confirm what was approved.**
3. **Task 7.1 / 8.4 / 10** – "both members" access/contributions → solo contribution summary instead.
4. **Task 4.1** – "add the approved group members" → only Ahmad; instructor/TA access still needed.
5. **Task 16** – "both students attend" → Ahmad alone.

## Execution plan

### Sprint 1 (real dates: 25/26 → 29 Nov)
Goal: *Set up Jira + GitHub with traceability, and ship the Header, Hero and Features sections on an initial PHP structure.*
1. Jira project, Epics, Stories, Tasks; Sprint 1 planned and started.
2. Repo + README + .gitignore, initial structure on `main` (setup exception).
3. Jira ↔ GitHub integration (GitHub for Jira app — you must approve in browser).
4. Branch/PR per story: project setup/PHP structure, header & nav, hero + POS mockup, features.
5. Basic CI workflow early (so PRs show checks).
6. Complete Sprint 1 on 29 Nov, sprint report + retrospective.

### Sprint 2 (30 Nov → 6 Dec)
Goal: *Deliver Pricing, Contact (PHP validation + tests), Footer, full CI, responsive QA and bug fixes.*
- TDD for contact validator → genuine failing CI run → fix → passing run (Task 14).
- QA at 375/768/1280, log real bugs, fix via `bugfix/` branches.
- Complete Sprint 2 on 6 Dec, report + retrospective.

### 7–10 Dec
Final compliance audit, evidence report (PDF/Word), `QuickPOS_Group2_22F-8817.zip`, `VIVA_GUIDE.md`.

## Jira issue keys (created 25 Nov 2026, all assigned to Ahmad Tayyab)

Board: https://cfd-team-zfrc5yuo.atlassian.net/jira/software/c/projects/POS2/boards/67 · Story Points field `customfield_10041`

| Epic | Key | Children |
|---|---|---|
| Project Setup & Integration | POS2-1 | Tasks POS2-9 (Jira setup), POS2-10 (repo), POS2-11 (Jira↔GitHub), POS2-12 (PHP structure) |
| Navigation & Header | POS2-2 | Stories POS2-13 (3sp), POS2-14 (3sp), POS2-15 (1sp) · Sub-tasks POS2-30..33 |
| Hero | POS2-3 | Stories POS2-16 (3sp), POS2-17 (5sp) · Sub-tasks POS2-34, 35 |
| Features | POS2-4 | Story POS2-18 (3sp) · Sub-task POS2-36 |
| Pricing | POS2-5 | Stories POS2-19 (5sp), POS2-20 (2sp) · Sub-task POS2-37 |
| Contact | POS2-6 | Stories POS2-21 (3sp), POS2-22 (5sp), POS2-23 (2sp) · Sub-tasks POS2-38..40 |
| Footer | POS2-7 | Story POS2-24 (2sp) |
| Testing & CI | POS2-8 | Stories POS2-25 (3sp), POS2-26 (5sp), POS2-27 (3sp) · Tasks POS2-28 (report/ZIP), POS2-29 (viva) · Sub-tasks POS2-41..43 |

### Sprint 1 — `POS2 Sprint 1` (id 136) — ACTIVE
- Started 25 Nov 2026 23:40 PKT, ends 29 Nov 2026 23:59 PKT (official window 23–29 Nov; started late, recorded truthfully).
- Goal: Set up Jira and GitHub with full traceability, and ship the Header, Hero (with POS mockup) and Features sections on an initial PHP structure.
- Scope 25 SP: POS2-9, 10, 11, 12, 13, 14, 15, 16, 17, 18.
- Status: POS2-9, POS2-10, POS2-11 Done (25 Nov); rest To Do.

### Sprint 2 — planned scope (backlog)
POS2-19..27 (30 SP). POS2-28/29 are for 7–10 Dec.

## Branches / PRs
- `main`: initial setup commit `6c68c4e` "POS2-10: Initial repository setup…" (setup exception, 25 Nov).

## Testing status
_None yet._

## Evidence collected
- `evidence/C/task07/github-for-jira-connected_2026-11-25.jpg` (Jira shows repo connected).
- `evidence/B/task05/sprint1-planned-backlog_2026-11-25.jpg` (built-in browser capture, low resolution – recapture in higher resolution recommended). See `EVIDENCE_CHECKLIST.md`.

## Outstanding manual actions (you)
1. ~~GitHub account~~ — done (`ahmedtayyab`, gh signed in 25 Nov).
2. ~~Jira site~~ — done (`cfd-team-zfrc5yuo.atlassian.net`, POS2 created 25 Nov). Jira API token saved in `%USERPROFILE%\.quickpos-jira.env` (25 Nov). It was pasted in chat, so revoke it at id.atlassian.com after the project.
3. ~~Approve GitHub for Jira~~ — done 25 Nov (repo connected, backfill finished, POS2-10 shows linked commit).
4. Agree the **solo PR-review arrangement** with Ms. Maham Saleem and tell me what was approved.
5. Optionally inform the instructor about the late Sprint 1 start.

## Marks at risk right now
- Task 5 (7): Sprint 1 starts late — mitigated by honest record.
- Task 9 (7): review evidence depends on approved solo arrangement.

## Next steps
2. `feature/POS2-12-php-structure` → PR → merge.
3. Header (POS2-13/14/15), Hero (POS2-16/17), Features (POS2-18) on their own branches/PRs.
4. Close Sprint 1 on 29 Nov with report + retrospective.
Jira automation helper: `tools/local/jira.py` (gitignored).
