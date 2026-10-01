# Current Status

**Last updated:** 2026-10-01

**Stage:** Phase 3 — Catering-menu update

**Active milestone:** [M3.1B — Catering menu tab organization](../milestones/M3.1B-catering-menu-tab-organization.md)

Phase 1 is complete. The sanitized CodeIgniter 2.2.2 application source is committed under `src/` and pushed to the new GitHub repository without the historical secret-bearing Git history. The user confirmed rotation of the historical credentials on 2026-09-30.

The safe development fixtures and expanded 59-check smoke suite were committed as `7c66c0e`. Phase 2 is complete, and the project has moved into menu-update definition.

## Completed Milestones

- Documentation baseline — project scope, security policy, roadmap, and recovery plan established.
- [M1.1 — Secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md) — historical credentials externalized, integrations disabled by default, and credential rotation confirmed.
- [M1.2 — Sanitized legacy source import](../milestones/M1.2-sanitized-legacy-source-import.md) — clean source baseline imported and pushed without old Git history or obsolete assets.
- [M2.1 — Docker PHP, Apache, and MariaDB runtime](../milestones/M2.1-docker-php-apache-runtime.md) — verified local services and documentation committed as `da93e47`.
- [M2.2 — Local database schema bootstrap](../milestones/M2.2-local-database-schema-bootstrap.md) — production-derived structure and guarded reset command committed as `2201125`.
- [M2.3 — Baseline smoke tests](../milestones/M2.3-baseline-smoke-tests.md) — local-only public runtime and session-cart baseline committed as `fa60b56`.
- [M2.4 — Safe development fixtures](../milestones/M2.4-safe-development-fixtures.md) — synthetic administration, order, feedback, voucher, and PDF coverage committed as `7c66c0e`.
- [M3.1 — Menu requirements and content inventory](../milestones/M3.1-menu-requirements-and-content-inventory.md) — approved menu mappings, supplied copy, image destinations, and implementation boundaries committed as `faf3d5f`.
- [M3.1A — Existing menu image replacements](../milestones/M3.1A-existing-menu-image-replacements.md) — approved replacement images for existing catering cards committed as `08f577d`.

## Current Runtime State

- PHP 7.4.33, Apache 2.4, and MariaDB 10.11 run as healthy Docker services.
- Apache serves the application at `http://localhost:8080`, applies `.htaccess`, and denies direct access to `jt-config.php`.
- MariaDB is reachable by the web container and from TablePlus at `127.0.0.1:3307`.
- The local database contains the verified five-table production-derived schema and no production rows.
- A guarded reset command recreates the empty schema, and a separate guarded seed command loads six deterministic synthetic records.
- A local-only smoke suite passes 59 checks under host PHP and container PHP 7.4, including fixture integrity, authenticated administration, and generated PDF coverage.
- Email, SMS, OneMap, and PayPal integrations remain disabled by default.
- The complete application and local command set pass PHP 7.4 syntax checks; known legacy deprecation warnings remain in CodeIgniter and bundled Dompdf code.

## Immediate Next Step

Complete live visual and smoke verification for [M3.1B](../milestones/M3.1B-catering-menu-tab-organization.md), then review and commit it. The requested seven-tab order and menu-family groupings are implemented in source, Set Catering is the default, and the known JavaScript tab behavior remains otherwise unchanged. The Vegan Catering Menu D image remains reserved for M3.2, and the four KIV images remain inactive.
