# Current Status

**Last updated:** 2026-10-01

**Stage:** Phase 2 — Reproducible local runtime

**Active milestone:** [M2.2 — Add the local database schema bootstrap](../milestones/M2.2-local-database-schema-bootstrap.md)

Phase 1 is complete. The sanitized CodeIgniter 2.2.2 application source is committed under `src/` and pushed to the new GitHub repository without the historical secret-bearing Git history. The user confirmed rotation of the historical credentials on 2026-09-30.

The five production-synced application changes were reviewed, passed secret and PHP 7.4 syntax checks, and were committed and pushed as `b0a9ae9`. The worktree was clean and `main` matched `origin/main` before this documentation reconciliation.

## Completed Milestones

- Documentation baseline — project scope, security policy, roadmap, and recovery plan established.
- [M1.1 — Secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md) — historical credentials externalized, integrations disabled by default, and credential rotation confirmed.
- [M1.2 — Sanitized legacy source import](../milestones/M1.2-sanitized-legacy-source-import.md) — clean source baseline imported and pushed without old Git history or obsolete assets.
- [M2.1 — Docker PHP, Apache, and MariaDB runtime](../milestones/M2.1-docker-php-apache-runtime.md) — verified local services and documentation committed as `da93e47`.

## Current Runtime State

- PHP 7.4.33, Apache 2.4, and MariaDB 10.11 run as healthy Docker services.
- Apache serves the application at `http://localhost:8080`, applies `.htaccess`, and denies direct access to `jt-config.php`.
- MariaDB is reachable by the web container and from TablePlus at `127.0.0.1:3307`.
- The local database contains the verified five-table production-derived schema and no production rows.
- A guarded reset command recreates the empty schema repeatably; safe synthetic development fixtures do not exist yet.
- Email, SMS, OneMap, and PayPal integrations remain disabled by default.
- All 908 PHP source files pass PHP 7.4 syntax checks; known legacy deprecation warnings remain in CodeIgniter and bundled Dompdf code.

## Immediate Next Step

Complete independent review and commit of [M2.2](../milestones/M2.2-local-database-schema-bootstrap.md), then create safe synthetic development fixtures in M2.3.
