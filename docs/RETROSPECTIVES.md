# Sprint Retrospectives — QuickPOS Group 2

Ahmad Tayyab (22F-8817), approved solo member. Development was AI-assisted (Claude Code); every change went through a Jira issue, a branch, a pull request and a review before merge.

---

## Sprint 1 — `POS2 Sprint 1`

| | |
|---|---|
| Official window | 23–29 Nov 2026 |
| Actual dates (Jira) | Started 25 Nov 2026 23:40 PKT, planned end 29 Nov 23:59 PKT, completed 26 Nov 2026 01:22 PKT |
| Sprint goal | Set up Jira and GitHub with full traceability, and ship the Header, Hero (with POS mockup) and Features sections on an initial PHP structure. |
| Committed | 10 issues, 25 story points (POS2-9 … POS2-18) |
| Added during sprint | POS2-19 Pricing (5 SP), POS2-24 Footer (2 SP) |
| Completed | All 12 issues (32 SP). Jira's sprint report lists 10 issues / 29 SP as completed in the sprint and POS2-9, POS2-10 as completed outside it (see *Problems*). |
| Not completed | None |
| Pull requests | #1–#6, all merged after a labelled AI-assisted review |
| Burndown | `evidence/B/task06/sprint1-burndown.png` (built from Jira's burndown data) |

### What went well
- **Traceability was set up first.** Jira, GitHub and the GitHub for Atlassian integration were connected before any feature code, so every branch, commit and PR carries a `POS2-` key and appears in each issue's Development panel.
- **Reviews caught real defects before merge.** Each PR had at least one real problem found and fixed, for example: CSS that hid horizontal overflow (#1), a 393px-wide no-JS header at 375px (#2), floating cards covering the mockup's Charge button (#3), a missing file dependency (#4), unannounced price changes for screen readers (#5) and a UTC copyright year (#6).
- **Automated browser QA instead of eyeballing.** Playwright checks at 375 / 768 / 1280px (overflow, navigation, keyboard order, pricing toggle) made each review measurable.

### Problems encountered
- **Late start.** The project was set up on 25 Nov, so the official 22 Nov setup day and the first two days of Sprint 1 were missed. Real dates were kept and nothing was backdated.
- **Sprint start time recorded 4 minutes late.** The sprint start was entered as 23:40, but POS2-9 and POS2-10 were moved to Done at about 23:36. That is why Jira's sprint report counts them as "completed outside this sprint".
- **The workflow did not set a Resolution.** Done issues showed "Unresolved" until the Resolution field was added to the project screens and set.
- **No CI checks on Sprint 1 PRs.** The workflow was planned for Sprint 2, so PRs #1–#6 were verified locally only.
- **Review is AI-assisted, not by a second person.** The solo review arrangement still needs the instructor's confirmation.
- **Under-commitment.** The committed scope was finished within a few hours, so two stories were pulled in mid-sprint. The estimates did not account for AI-assisted development speed.

### What could be improved
- Put CI in place before feature work so every PR shows passing checks.
- Start the sprint in Jira before moving any of its issues.
- Plan Sprint 2 with its full expected scope instead of relying on mid-sprint pulls.

### Concrete improvement actions for Sprint 2
1. **First Sprint 2 item: GitHub Actions CI (POS2-26)**, written test-first. Every later PR must show green checks before merge.
2. **Start Sprint 2 in Jira before transitioning any of its issues**, and use the current time as the sprint start.
3. **Send the review-arrangement request to Ms. Maham Saleem** (draft ready in `evidence/C/task09/`) and record her answer.

---

## Sprint 2 — `POS2 Sprint 2`

| | |
|---|---|
| Official window | 30 Nov – 6 Dec 2026 |
| Actual dates (Jira) | Started 26 Nov 2026 01:27 PKT, planned end 6 Dec 2026 23:59 PKT, completed 26 Nov 2026 01:51 PKT. It was started early because Sprint 1 finished early; Jira keeps the real dates. |
| Sprint goal | Deliver the PHP contact form with tested server-side validation and a thank-you page, link plan CTAs to it, and add GitHub Actions CI (php -l + automated tests) with responsive QA and bug fixes. |
| Committed | 7 stories, 23 story points (POS2-20, 21, 22, 23, 25, 26, 27) |
| Added during sprint | POS2-44 docs task (2 SP); bugs POS2-45 and POS2-46, found during the sprint |
| Pull requests | #7 CI, #8 validation (TDD), #9 contact form + thank-you, #10 bug fix, #11 docs. All merged with passing CI |
| Completed | All 10 issues, 25 SP (Jira sprint report); nothing carried over |
| Burndown | `evidence/B/task06/sprint2-burndown.png` (built from Jira's burndown data) |
| CI failure → fix | Run [45696094635](https://github.com/ahmedtayyab/QuickPOS-Group-2/actions/runs/45696094635) failed (tests written before the code: 6 passed, 9 failed) → run [45696329450](https://github.com/ahmedtayyab/QuickPOS-Group-2/actions/runs/45696329450) passed after the validator was implemented |

### What went well
- **CI came first.** Every Sprint 2 PR shows a green "PHP lint and tests" check before merge, which closed the main gap from Sprint 1.
- **Test-driven development gave a real CI failure and fix.** The tests were committed before the validation rules, CI failed for that reason, and the implementation turned it green. No artificial break was needed.
- **Reviews and probing found real defects before merge:** CI on a newer PHP than the documented minimum (#7), Unicode-only whitespace accepted as a message (#8), a stale `#contact` fragment after redirect and default session-cookie flags (#9).
- **Automated accessibility audit.** axe-core at three widths found a genuine contrast bug (POS2-46), which went through the full bug workflow: Jira Bug → `bugfix/` branch → PR → CI → merge → re-test with 0 findings.

### Problems encountered
- **`mb_strlen()` was undefined on the local PHP build (Bug POS2-45).** The winget PHP has no php.ini, so `mbstring` wasn't loaded. Fixed by counting characters with PCRE, which is always available.
- **First CI push rejected.** The GitHub login lacked the `workflow` permission needed to add `.github/workflows/ci.yml`; the student approved it through GitHub's device login.
- **The Jira Reports view isn't enabled on the board** and couldn't be added by automation in the narrow browser pane. Burndown evidence is generated from Jira's own burndown data instead.
- **The QA audit's first run reported false positives** (a visually hidden label, focus on the skip link). Each was checked by hand before deciding it wasn't a bug.
- **The review is still AI-assisted and not by a second person.** The instructor's confirmation of the solo arrangement is pending.

### What could be improved
- Check the local PHP extensions against what CI provides before relying on optional extensions.
- Enable the Jira Reports view at project setup so native charts are available.
- Get the review arrangement confirmed at the start of a project, not at the end.

### Concrete improvement action
- **Before submission (7–10 Dec):** send the review-arrangement request, then add the board's Reports view and capture Jira's native sprint report and burndown for both sprints next to the generated charts.
