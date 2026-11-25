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
