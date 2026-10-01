# Current Status

**Last updated:** 2026-10-01

**Stage:** Phase 2 — Reproducible local runtime

**Active milestone:** [M2.4 — Safe development fixtures](../milestones/M2.4-safe-development-fixtures.md)

Phase 1 is complete. The sanitized CodeIgniter 2.2.2 application source is committed under `src/` and pushed to the new GitHub repository without the historical secret-bearing Git history. The user confirmed rotation of the historical credentials on 2026-09-30.

The baseline smoke suite was committed as `fa60b56`. M2.4 now adds only invented local records and fixture-backed coverage; no production row was imported.

## Completed Milestones

- Documentation baseline — project scope, security policy, roadmap, and recovery plan established.
- [M1.1 — Secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md) — historical credentials externalized, integrations disabled by default, and credential rotation confirmed.
- [M1.2 — Sanitized legacy source import](../milestones/M1.2-sanitized-legacy-source-import.md) — clean source baseline imported and pushed without old Git history or obsolete assets.
- [M2.1 — Docker PHP, Apache, and MariaDB runtime](../milestones/M2.1-docker-php-apache-runtime.md) — verified local services and documentation committed as `da93e47`.
- [M2.2 — Local database schema bootstrap](../milestones/M2.2-local-database-schema-bootstrap.md) — production-derived structure and guarded reset command committed as `2201125`.
- [M2.3 — Baseline smoke tests](../milestones/M2.3-baseline-smoke-tests.md) — local-only public runtime and session-cart baseline committed as `fa60b56`.

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

Review and commit [M2.4](../milestones/M2.4-safe-development-fixtures.md), then begin M3.1 menu requirements and content inventory.
