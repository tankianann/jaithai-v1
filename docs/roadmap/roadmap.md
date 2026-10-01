# Jai Thai Recovery and Maintenance Roadmap

**Last updated:** 2026-10-01

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
| Phase 1 — Clean source recovery | [M1.1 — Secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md) | Complete | Rotate historical credentials, externalize secrets, and establish safe tracked and local configuration boundaries. | None. |
| Phase 1 — Clean source recovery | [M1.2 — Sanitized legacy source import](../milestones/M1.2-sanitized-legacy-source-import.md) | Complete | Commit and push the complete necessary legacy application without secrets, obsolete assets, local state, or old Git history. | None. |
| Phase 2 — Reproducible local runtime | [M2.1 — Docker PHP, Apache, and MariaDB runtime](../milestones/M2.1-docker-php-apache-runtime.md) | Complete | Build and document PHP 7.4/Apache and MariaDB 10.11 services capable of serving the application and accepting local database connections. | None. |
| Phase 2 — Reproducible local runtime | [M2.2 — Local database schema bootstrap](../milestones/M2.2-local-database-schema-bootstrap.md) | Complete | Track the production-derived schema without production data and provide a guarded, repeatable local reset command. | None. |
| Phase 2 — Reproducible local runtime | [M2.3 — Baseline smoke tests](../milestones/M2.3-baseline-smoke-tests.md) | Complete | Provide a repeatable local-only runtime, route, menu, session-cart, database, and access-control baseline without external side effects. | None. |
| Phase 2 — Reproducible local runtime | [M2.4 — Safe development fixtures](../milestones/M2.4-safe-development-fixtures.md) | Complete | Create minimal synthetic records needed for authenticated administration, persistence, PDF, and deeper workflow tests without copying production data. | None. |
| Phase 3 — Catering-menu update | [M3.1 — Menu requirements and content inventory](../milestones/M3.1-menu-requirements-and-content-inventory.md) | Complete | Define the requested menu changes, source of truth, affected helpers/views/assets, and acceptance criteria. | None. |
| Phase 3 — Catering-menu update | [M3.1A — Existing menu image replacements](../milestones/M3.1A-existing-menu-image-replacements.md) | Complete | Replace approved images for existing menus without changing menu behaviour. | None. |
| Phase 3 — Catering-menu update | [M3.1B — Catering menu tab organization](../milestones/M3.1B-catering-menu-tab-organization.md) | Implemented | Separate the catering landing-page cards into the approved menu-family tabs without changing tab behavior. | Live visual and smoke verification, independent review, and milestone commit. |
| Phase 3 — Catering-menu update | M3.2 — Menu implementation | Planned | Implement the approved menu changes without unrelated behaviour changes. | M3.1 complete and baseline checks available. |
| Phase 3 — Catering-menu update | M3.3 — Menu regression verification | Planned | Verify the updated customer-facing menus and affected cart/order behaviour across the agreed local test surface. | M3.2 implemented. |
| Phase 4 — Constrained modernization | M4.1 — Security hardening priorities | Planned | Address the highest-value application risks that can be improved without changing PHP or CodeIgniter versions. | Baseline running; risk review and scope approval. |
| Phase 4 — Constrained modernization | M4.2 — Maintainability improvements | Planned | Reduce the cost and risk of future content and code changes while preserving supported behaviour. | Identify repeated pain points during recovery and menu delivery. |

## Active Milestone

[M3.1B — Catering menu tab organization](../milestones/M3.1B-catering-menu-tab-organization.md) is implemented in source. The requested seven-tab order and menu-family groupings are in place, with Set Catering as the default, while the known JavaScript tab behavior remains otherwise unchanged. Live visual and smoke verification, independent review, and commit remain before M3.2 begins.

## Dependencies and Decision Points

- **Credential rotation:** resolved on 2026-09-30; the user confirmed the historical credentials were rotated.
- **Configuration loading:** resolved in M1.1 through an ignored WordPress-style PHP configuration file and a tracked value-free example.
- **Database compatibility:** production uses MariaDB 10.11.18 and local Docker uses the MariaDB 10.11 line; the production-derived structure is tracked without data.
- **Database privacy:** resolved for schema bootstrap in [ADR-002](../decisions/ADR-002-production-derived-schema.md); production rows remain outside Git and M2.4 fixtures are wholly synthetic.
- **Local runtime architecture:** resolved in [ADR-001](../decisions/ADR-001-local-docker-runtime.md) as direct Apache/PHP with MariaDB, without the production NGINX frontend.
- **External side effects:** email, SMS, mapping, payment, cron, and similar integrations must be disabled, stubbed, or redirected safely before local smoke testing.
- **Legacy runtime risk:** PHP 7.4 and CodeIgniter 2.2.2 remain fixed constraints for this project. Any proposal to relax either constraint requires an explicit decision record.
- **Production readiness:** successful local execution does not authorize public deployment. A separate security and deployment decision is required before production use.
- **Menu scope:** resolved for M3.1; mappings, names, prices, minimum quantities, source copy, dietary wording, halal-language boundary, and image destinations or KIV status are documented and approved.

## Deferred and Post-Project Work

- PHP 8 migration.
- CodeIgniter upgrade or framework replacement.
- Restoration of obsolete menu PDF or voucher-template directories.
- Production infrastructure, deployment automation, or a hosting migration unless separately approved.
- Broad redesign unrelated to the requested menu updates or agreed modernization priorities.

## Immediate Next Step

Run the live visual review and smoke suite, then review and commit M3.1B before M3.2 implementation. Add the reserved Vegan Catering Menu D image only when M3.2 introduces that menu and card.
