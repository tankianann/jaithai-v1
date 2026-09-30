# Jai Thai Recovery and Maintenance Roadmap

**Last updated:** 2026-09-30

## Project Outcome

Recover the legacy Jai Thai catering website into a clean, secret-free repository; make it reproducible in a documented local Docker environment; deliver controlled catering-menu updates; and improve security and maintainability within the agreed PHP 7.4 and CodeIgniter 2.2.2 constraints.

## Status Guide

- **Planned** — anticipated but not started.
- **In progress** — currently being worked on.
- **Implemented** — deliverables exist; required verification, review, or commit remains.
- **Complete** — implementation, verification, review, documentation, and commit are finished.
- **Deferred** — intentionally postponed.
- **Cancelled** — deliberately removed from the plan.

## Delivery Phases and Milestones

| Delivery phase | Milestone | Status | Intended outcome | Remaining work or dependency |
| --- | --- | --- | --- | --- |
| Discovery and planning | Documentation baseline | Complete | Define the project, safety rules, anticipated delivery sequence, and first milestone. | None. |
| Phase 1 — Clean source recovery | [M1.1 — Secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md) | In progress | Rotate historical credentials, externalize secrets, and establish safe tracked and local configuration boundaries. | Confirm credential rotation and complete staged-snapshot review. |
| Phase 1 — Clean source recovery | M1.2 — Sanitized legacy source import | Planned | Commit and push the complete necessary legacy application without secrets, obsolete assets, local state, or old Git history. | M1.1 complete; candidate tree passes secret and staged-diff review. |
| Phase 2 — Reproducible local runtime | M2.1 — Docker PHP and Apache runtime | Planned | Build and document a PHP 7.4/Apache container capable of serving the application source. | Confirm required PHP extensions and resolve initial compatibility failures. |
| Phase 2 — Reproducible local runtime | M2.2 — Local database bootstrap | Planned | Add a compatible MySQL service and a safe, repeatable schema/development-data initialization path. | Confirm legacy MySQL version and obtain or create a sanitized schema and dataset. |
| Phase 2 — Reproducible local runtime | M2.3 — Baseline smoke tests | Planned | Record a reproducible behavioural baseline for public pages, menus, ordering, administration, and integrations that can be tested safely. | M2.1 and M2.2 complete; external side effects disabled or replaced locally. |
| Phase 3 — Catering-menu update | M3.1 — Menu requirements and content inventory | Planned | Define the requested menu changes, source of truth, affected helpers/views/assets, and acceptance criteria. | User supplies or approves the new menu content and intended presentation. |
| Phase 3 — Catering-menu update | M3.2 — Menu implementation | Planned | Implement the approved menu changes without unrelated behaviour changes. | M3.1 complete and baseline checks available. |
| Phase 3 — Catering-menu update | M3.3 — Menu regression verification | Planned | Verify the updated customer-facing menus and affected cart/order behaviour across the agreed local test surface. | M3.2 implemented. |
| Phase 4 — Constrained modernization | M4.1 — Security hardening priorities | Planned | Address the highest-value application risks that can be improved without changing PHP or CodeIgniter versions. | Baseline running; risk review and scope approval. |
| Phase 4 — Constrained modernization | M4.2 — Maintainability improvements | Planned | Reduce the cost and risk of future content and code changes while preserving supported behaviour. | Identify repeated pain points during recovery and menu delivery. |

## Active Milestone

[M1.1 — Establish a secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md) is the first delivery milestone. It prevents compromised historical configuration from entering the new repository and defines the safe configuration model required by Docker and later development.

## Dependencies and Decision Points

- **Credential rotation:** owners and replacement values must be available before any historical integration is re-enabled. This blocks M1.1 completion.
- **Configuration loading:** M1.1 must choose a minimal environment-loading mechanism compatible with CodeIgniter 2.2.2 and PHP 7.4.
- **Database compatibility:** the legacy MySQL version, schema, and safe development data source must be identified before M2.2.
- **External side effects:** email, SMS, mapping, payment, cron, and similar integrations must be disabled, stubbed, or redirected safely before local smoke testing.
- **Legacy runtime risk:** PHP 7.4 and CodeIgniter 2.2.2 remain fixed constraints for this project. Any proposal to relax either constraint requires an explicit decision record.
- **Production readiness:** successful local execution does not authorize public deployment. A separate security and deployment decision is required before production use.
- **Menu scope:** new menu content, pricing, availability rules, and affected ordering behaviour must be approved before M3.1 can close.

## Deferred and Post-Project Work

- PHP 8 migration.
- CodeIgniter upgrade or framework replacement.
- Restoration of obsolete menu PDF or voucher-template directories.
- Production infrastructure, deployment automation, or a hosting migration unless separately approved.
- Broad redesign unrelated to the requested menu updates or agreed modernization priorities.

## Immediate Next Step

Confirm historical credential rotation or revocation, then stage only the M1.1 files for final diff and secret-scan review.
