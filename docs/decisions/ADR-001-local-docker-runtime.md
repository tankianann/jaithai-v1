# ADR-001 — Use Debian-Based PHP/Apache with MariaDB for Local Development

**Status:** Accepted

**Date:** 2026-09-30

**Affected milestones:** M2.1, M2.2

## Context

The application must remain compatible with PHP 7.4 and CodeIgniter 2.2.2. Production currently uses Apache `2.4.67-1+ubuntu22.04+1` and MariaDB `1:10.11.18+maria~ubu2204` behind an NGINX `1.31.1-1+ubuntu22.04+1` frontend, but the application-level routing and access controls live in Apache `.htaccess` rules.

The local environment needs to reproduce the application runtime without adding production infrastructure complexity. PHP 7.4 images are obsolete, and their Debian Bullseye package sources reached an archive transition that prevents an unpinned build from resolving packages reliably.

## Decision

Use the official Debian-based `php:7.4-apache` image, pinned by digest, rather than an Alpine PHP image. Enable the required Apache modules and PHP extensions in that image, and pin Debian package installation to the 2026-08-01 snapshot.

Run digest-pinned MariaDB 10.11.18 as the second Compose service so the database patch version matches production. Include the server in M2.1 so developers can verify connectivity and use TablePlus immediately, while retaining schema and sanitized development-data initialization as M2.2.

Do not reproduce the production NGINX frontend locally at this stage. Apache directly serves the application on localhost because it owns the relevant rewrite and access-control behaviour.

## Consequences

- Local PHP uses glibc, matching production Ubuntu more closely than Alpine's musl libc.
- Apache/PHP integration comes from the maintained structure of the official image instead of a custom Alpine assembly.
- The image is larger than an Alpine alternative but has lower compatibility and maintenance risk for the legacy application.
- Package versions are reproducible, but the pinned PHP and Debian stack is unsupported and must not be represented as production-ready.
- MariaDB is immediately available, but application database behavior remains incomplete until M2.2 provides schema and safe data.
- NGINX-specific behavior is outside the local baseline and remains a production configuration concern.
