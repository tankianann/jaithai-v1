# ADR-002 — Track Only the Production-Derived Database Structure

**Status:** Accepted

**Date:** 2026-10-01

**Affected milestones:** M2.2, M2.3

## Context

The legacy application requires five database tables. A production SQL dump is available outside the application repository, but it contains customer, order, credential, voucher, and feedback records that must not enter Git or the persistent local development database.

The project needs a repeatable local schema bootstrap without adopting a full versioned migration framework for an unchanged legacy schema.

## Decision

Import the production dump only into an isolated MariaDB 10.11 container with networking disabled and `/var/lib/mysql` backed by temporary memory. Export structure only, remove production auto-increment positions, destroy the temporary container, and commit the resulting `database/schema.sql`.

Provide a single destructive `bin/migrate.php` reset command rather than forward and rollback migrations. The command uses the Docker-local application configuration, requires `--force`, requires the `development` environment and expected `jaithai` database name, drops existing local objects, and recreates the tracked schema.

Do not copy the source production dump, production rows, or derived production fixtures into this repository. Create synthetic development fixtures separately in M2.3.

## Consequences

- A clean checkout can recreate the current database structure without access to production data.
- The reset command is simple and intentionally discards all local database contents.
- Existing table engines, character sets, collations, keys, and column definitions remain faithful to production.
- Production auto-increment positions are not disclosed and local identifiers restart from their defaults.
- Schema evolution is handled by replacing the baseline deliberately; incremental upgrades and rollbacks are outside this tool's scope.
- Meaningful data-backed testing remains limited until synthetic fixtures are designed and added.
