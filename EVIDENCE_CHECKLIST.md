# Evidence Checklist – QuickPOS Group 2

Legend: ✅ collected (file/URL exists) · 🟡 partial · ⬜ not yet · 👤 needs Ahmad (manual).
Never tick an item unless the file or URL exists. Local evidence lives in `evidence/<part>/<task>/`
(kept out of git; it goes into the evidence report). Last updated: 26 Nov 2026.

**Links:** Repo https://github.com/ahmedtayyab/QuickPOS-Group-2 · Jira https://cfd-team-zfrc5yuo.atlassian.net/jira/software/c/projects/POS2/boards/67 · Actions https://github.com/ahmedtayyab/QuickPOS-Group-2/actions

## Part A – Website (40)
| Task | Evidence | File / URL | Status |
|---|---|---|---|
| 1 | Full page at 1280 / 768 / 375 (final, main `78ac4bd`) | `evidence/A/task01/final-2026-11-26/final-{desktop-1280,tablet-768,mobile-375}-full.png` | ✅ |
| 1 | QA audit: overflow, clipping, overlaps, links, images, console/PHP errors, axe, keyboard focus | `evidence/A/task01/final-2026-11-26/final-findings.txt` (0 findings) | ✅ |
| 1 | Sprint 1 snapshot of the page | `evidence/A/task01/sprint1-main-2026-11-26-*.png` | ✅ |
| 2 | Each of the six sections | `evidence/A/task01/final-2026-11-26/final-section-{site-header,hero,features,pricing,contact,site-footer}-1280.png` | ✅ |
| 2 | Navigation / CTA checks | `evidence/A/task02/nav-qa-final-2026-11-26.txt` (15/15), `pricing-qa-final-2026-11-26.txt` (13/13), `nav-mobile-open-375.png` | ✅ |
| 3 | Validation errors shown | `evidence/A/task03/contact-errors-all-empty-1280.png`, `contact-error-invalid-email-1280.png`, `contact-errors-375.png` | ✅ |
| 3 | Thank-you page after valid submit | `evidence/A/task03/contact-thank-you-1280.png` | ✅ |
| 3 | End-to-end form test results | `evidence/A/task03/contact-qa-final-2026-11-26.txt` (21/21) | ✅ |

## Part B – Jira (20)
| Task | Evidence | File / URL | Status |
|---|---|---|---|
| 4 | Epics list | `evidence/B/task04/epics_2026-11-26.jpg` | ✅ (Sprint 1 state; recapture final) |
| 4 | Backlog | `evidence/B/task04/backlog-sprint1-done_2026-11-26.jpg`, `backlog-product-backlog_2026-11-26.jpg` | ✅ |
| 4 | 2 detailed stories (AC + SP) | `evidence/B/task04/story-POS2-22-detail_2026-11-26.jpg`, `story-POS2-17-detail_2026-11-26.jpg` | ✅ |
| 5 | Sprint 1 planned backlog | `evidence/B/task05/sprint1-planned-backlog_2026-11-25.jpg` | ✅ |
| 5 | Sprint 1 active board | `evidence/B/task05/sprint1-active-board_2026-11-26.jpg` | ✅ |
| 5 | Sprint 1 completed report | `evidence/B/task06/sprint1-report-summary.md` + raw `sprint1-jira-report-data.json` | ✅ (Jira native screenshot 👤) |
| 5 | Sprint 2 planned backlog | `evidence/B/task05/sprint2-planned-backlog_2026-11-26.jpg` | ✅ |
| 5 | Sprint 2 active board | `evidence/B/task05/sprint2-active-board_*.jpg` | ⬜ capture before closing |
| 5 | Sprint 2 completed report | `evidence/B/task06/sprint2-report-summary.md` | ⬜ after close |
| 6 | Burndown Sprint 1 | `evidence/B/task06/sprint1-burndown.png` (generated from Jira burndown data) | ✅ |
| 6 | Burndown Sprint 2 | `evidence/B/task06/sprint2-burndown.png` | ⬜ after close |
| 6 | Bug history | Jira POS2-45, POS2-46 (both Done with repro steps + resolution) · screenshot `evidence/B/task06/bugs_*.jpg` | 🟡 issues exist; screenshot ⬜ |
| 6 | Retrospectives | `docs/RETROSPECTIVES.md` (Sprint 1 + Sprint 2) | ✅ |

## Part C – GitHub (20)
| Task | Evidence | File / URL | Status |
|---|---|---|---|
| 7 | Repo + README | `evidence/C/task07/repo-home-readme_2026-11-26.png` | ✅ (recapture after final README) |
| 7 | Jira–GitHub connected | `evidence/C/task07/github-for-jira-connected_2026-11-25.jpg` | ✅ |
| 7 | Jira issue with Development panel | `evidence/C/task07/jira-dev-panel-POS2-17_2026-11-26.jpg` | ✅ |
| 8 | Branch list | `evidence/C/task08/branches_2026-11-26.png`, `branches-and-commits_2026-11-26.txt` | ✅ (recapture final) |
| 8 | Commits with keys + Jira-linked commits | `evidence/C/task08/commits-main_2026-11-26.png`, `jira-POS2-17-linked-commits_2026-11-26.jpg`, `jira-POS2-17-linked-PR_2026-11-26.jpg` | ✅ |
| 9 | Merged PRs with review evidence | PRs #1–#10 · `evidence/C/task09/pull-requests-closed_2026-11-26.png`, `pr-{1..6}-conversation_2026-11-26.png` | 🟡 recapture #7–#10 |
| 9 | Approved solo review arrangement | instructor reply (draft request in `evidence/C/task09/`) | 👤 |
| 10 | Solo contribution summary | `docs/SOLO_CONTRIBUTION.md` | ⬜ (POS2-28) |

## Part D – CI (15)
| Task | Evidence | File / URL | Status |
|---|---|---|---|
| 11 | Workflow file + triggers | `.github/workflows/ci.yml` · Actions tab screenshot `evidence/D/task11/actions-tab_*.png` | 🟡 file ✅, screenshot ⬜ |
| 11 | Completed runs (PR + main) | PR #7 run 45695780336 log `evidence/D/task11/ci-run-45695780336-pr7-pass.log`; main run 45695891819 | ✅ |
| 12 | Passing `php -l` log (all files) | same log: "Checking 12 PHP files" + one line per file | ✅ |
| 13 | Test files + local results + CI test log | `tests/*.php`; `evidence/D/task13/local-tests-after-implementation.txt`; CI log `evidence/D/task14/ci-run-45696329450-PASSED-after-fix.log` | ✅ |
| 14 | Failed run (URL + logs) | https://github.com/ahmedtayyab/QuickPOS-Group-2/actions/runs/45696094635 · `evidence/D/task14/ci-run-45696094635-FAILED.log`, `local-tests-before-implementation.txt` | ✅ |
| 14 | Fix commit + passing run | commit "POS2-39 POS2-22: Implement server-side contact validation…" · https://github.com/ahmedtayyab/QuickPOS-Group-2/actions/runs/45696329450 | ✅ (run screenshots ⬜) |

## Part E – Submission (5)
| Task | Evidence | File / URL | Status |
|---|---|---|---|
| 15 | Evidence report (PDF/Word) | | ⬜ (POS2-28) |
| 15 | `QuickPOS_Group2_22F-8817.zip` verified by extract-and-run | | ⬜ (POS2-28) |
| 16 | `VIVA_GUIDE.md` + demo sequence | | ⬜ (POS2-29) |
