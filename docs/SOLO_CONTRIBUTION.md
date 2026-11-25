# Solo Contribution Summary — Group 2

**Ahmad Tayyab · 22F-8817** · CS4002 Fundamentals of Software Project Management · approved solo member

The course normally expects two students. Group 2 has one approved member, so every role below was carried out by Ahmad Tayyab.
This page replaces the "work-division summary" of Task 10.

## Responsibilities

| Area | What was done | Evidence |
|---|---|---|
| Product owner / planning | Wrote 8 Epics and 15 user stories with acceptance criteria, priorities and story points; planned both sprints and their goals | Jira POS2 backlog, sprint goals |
| Scrum master | Started, tracked and closed both sprints; recorded scope changes and real dates; wrote both retrospectives | Jira sprints 136 and 137, `docs/RETROSPECTIVES.md`, burndown charts |
| Developer | PHP structure, design system, all six sections, contact form, validator, thank-you page | 43 commits on `main`, 12 merged PRs |
| Tester / QA | 22 automated PHP tests, test-first validation, browser QA at 375/768/1280px, accessibility audit | `tests/`, QA results in the evidence report |
| DevOps | GitHub Actions CI (lint + tests), Jira–GitHub integration | `.github/workflows/ci.yml`, Actions runs, Jira Development panels |
| Reviewer | Reviewed every PR and fixed real findings before merge (see arrangement below) | PR review comments #1–#12 |

## Activity in numbers (26 Nov 2026)

| Measure | Count |
|---|---|
| Jira issues (8 Epics, 15 Stories, 7 Tasks, 14 Sub-tasks, 2 Bugs) | 46, all assigned to Ahmad Tayyab |
| Commits on `main` (excluding merges) | 43, all starting with a `POS2-` key, all by `ahmedtayyab` |
| Branches (feature/bugfix, kept after merge) | 12 + `main` |
| Pull requests merged | 12 at the time of writing, all authored by `ahmedtayyab` |
| CI runs | 29: 28 successful, 1 failed (the deliberate test-first run, Task 14) |
| Automated tests | 22 |
| Bugs found and fixed | 2 in Jira (POS2-45, POS2-46) plus problems caught in PR reviews before merge |

## Review arrangement (solo)

The brief asks the *other* member to review each PR. With no second member, each PR has:
1. a GitHub review comment titled **"AI-assisted code review (Claude Code) — not an independent human review"**,
2. fix commits for every real finding, and
3. a resolution comment explaining each fix, with green CI from PR #7 onwards.

No other accounts or reviewers were created. **This arrangement must be confirmed by Ms. Maham Saleem.** Her reply is to be added to the evidence report.

## Use of AI assistance

Claude Code (Anthropic) was used throughout, as the course guidelines allow:
- writing and refactoring code, tests and CI configuration;
- reviewing pull requests (always labelled as AI-assisted);
- automating Jira updates, browser QA, screenshots and documentation.

Every commit made with AI help carries a `Co-Authored-By: Claude` line, so AI involvement is visible in the history.
The student remains responsible for the correctness of the work and for explaining it in the viva (see `VIVA_GUIDE.md`).

## Honest notes on the timeline
- The project was set up on 25 Nov 2026, after the official setup day (22 Nov).
- Both sprints were completed on 25–26 Nov, earlier than their official windows (23–29 Nov, 30 Nov–6 Dec), because development went faster than planned. Jira keeps the real start and finish times, and each sprint goal names its official window. Nothing was backdated.
