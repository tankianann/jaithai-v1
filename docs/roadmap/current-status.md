# Current Status

**Last updated:** 2026-10-02

**Stage:** Phase 4 — Constrained modernization

**Active milestone:** [M4.2 — URL contract and v2 migration](../milestones/M4.2-url-contract-and-v2-migration.md)

Phase 1 is complete. The sanitized CodeIgniter 2.2.2 application source is committed under `src/` and pushed to the new GitHub repository without the historical secret-bearing Git history. The user confirmed rotation of the historical credentials on 2026-09-30.

The safe development fixtures and expanded 59-check smoke suite were committed as `7c66c0e`. Phase 2 is complete, and the Set, DIY, and Vegan Catering replacements have been committed as `a75a1e4`, `eb658f3`, and `6d9ab7a` respectively.

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
- [M3.1B — Catering menu tab organization](../milestones/M3.1B-catering-menu-tab-organization.md) — requested menu-family tabs, default Set Catering tab, and retired Promotions tab committed as `09d643a` and `5be9858`.
- [M3.2A — Set Catering menu replacements](../milestones/M3.2A-set-catering-menu-replacements.md) — approved Essential, Classic, Signature, and Supreme content committed as `a75a1e4`.
- [M3.2B — DIY Catering menu replacements](../milestones/M3.2B-diy-catering-menu-replacements.md) — approved DIY collection content committed as `eb658f3`.
- [M3.2C — Vegan Catering menu replacements](../milestones/M3.2C-vegan-catering-menu-replacements.md) — approved Vegan collection content and new Menu D committed as `6d9ab7a`.
- [M3.3 — Menu regression verification](../milestones/M3.3-menu-regression-verification.md) — 173 PHP 7.4 menu checks, 106 live smoke checks, and the manual browser review committed as `e1e0e6c`.

## Implemented Milestone Awaiting Review and Commit

- [M4.1 — Security hardening priorities](../milestones/M4.1-security-hardening-priorities.md) — records exposure containment, authentication, CSRF, sensitive-document, output, abuse, and integration risks as KIV requirements for v2; no v1 behavior changes are planned.
- [M4.2 — URL contract and v2 migration](../milestones/M4.2-url-contract-and-v2-migration.md) — defines controller-independent v2 canonical URLs and direct launch redirects from legacy `.php` and current controller-style paths without changing v1 routing.

## Current Runtime State

- PHP 7.4.33, Apache 2.4, and MariaDB 10.11 run as healthy Docker services.
- Apache serves the application at `http://localhost:8080`, applies `.htaccess`, and denies direct access to `jt-config.php`.
- MariaDB is reachable by the web container and from TablePlus at `127.0.0.1:3307`.
- The local database contains the verified five-table production-derived schema and no production rows.
- A guarded reset command recreates the empty schema, and a separate guarded seed command loads six deterministic synthetic records.
- A local-only smoke suite passes 106 checks under container PHP 7.4, including all twelve menu forms, representative carts, fixture integrity, authenticated administration, and generated PDF coverage.
- Email, SMS, OneMap, and PayPal integrations remain disabled by default.
- The complete application and local command set pass PHP 7.4 syntax checks; known legacy deprecation warnings remain in CodeIgniter and bundled Dompdf code.

## Immediate Next Step

Review the proposed v2 canonical URL names, supplement the source inventory with production access logs and Search Console data, then commit the M4.1 and M4.2 documentation. Do not change v1 routes during its final month; implement and test the redirect matrix in v2 before launch.
