# Jai Thai Catering Website

This repository contains the legacy Jai Thai catering website and the project material needed to recover, run, maintain, and update it safely.

The application is a CodeIgniter 2.2.2 PHP application. The secret-free source baseline, local Docker runtime, database schema, synthetic fixtures, and local smoke-test baseline are established. The current project keeps CodeIgniter 2.2.2 and PHP 7.4 as explicit compatibility constraints.

## Current State

- The sanitized legacy application source is committed under `src/` and pushed to the new GitHub repository.
- Known embedded credentials use the private configuration boundary, and the historical credentials were confirmed rotated on 2026-09-30.
- The old repository history was not imported; this repository has a clean, reviewed source history.
- Previously supplied `assets/menupdf/` and `assets/voucher-templates/` directories were removed because they are no longer used.
- A verified Docker runtime provides PHP 7.4, Apache, and MariaDB 10.11, with a production-derived schema that contains no production rows.
- A local-only smoke suite verifies the runtime, public pages, menu form, session-backed cart, authenticated administration, generated PDF, access controls, and database structure without placing an order.
- No production database dump or customer data is stored in this repository; the tracked development records are wholly synthetic.

See [`docs/roadmap/current-status.md`](docs/roadmap/current-status.md) for the immediate next step and [`docs/roadmap/roadmap.md`](docs/roadmap/roadmap.md) for the anticipated delivery sequence.

## Technical Baseline

- PHP 7.4 compatibility target
- Apache HTTP Server
- CodeIgniter 2.2.2
- MySQL-compatible database through the `mysqli` driver
- Single application rooted at `src/`

PHP 7.4 and CodeIgniter 2.2.2 are legacy, unsupported technologies. They are retained as explicit compatibility constraints for this project, not treated as a secure modern production baseline. Production deployment or public exposure requires a separate readiness and security decision.

## Repository Structure

- `src/` — legacy application source and web root
- `bin/` — local development commands
- `database/` — tracked production-derived schema and synthetic development fixtures
- `docs/overview/` — project purpose, scope, constraints, and known unknowns
- `docs/roadmap/` — current status and the master delivery roadmap
- `docs/milestones/` — detailed active and completed milestone definitions
- `docs/security/` — project-specific secret and configuration handling guidance
- `docs/decisions/` — durable records of material technical decisions
- `inbox/` — unprocessed project source material

Project-level Docker and Compose files live beside `src/`. See [`docs/development/local-docker.md`](docs/development/local-docker.md) for setup, TablePlus credentials, common commands, and current limitations.

## Configuration

The application uses a WordPress-style private configuration file; Composer and an environment-file parser are not required. Copy `src/jt-config.example.php` to `src/jt-config.php`, then populate the values inside `jaithai_env()`. The real `jt-config.php` is ignored by Git.

For production, set `JAITHAI_ENVIRONMENT` to `production`, use current production credentials, and keep outbound integrations disabled until each is deliberately verified. Apache denies direct requests for `jt-config.php`; the file must still be transferred and stored as sensitive deployment configuration.

## Security Rule

Never commit `src/jt-config.php` or copy its values into tracked files. Keep outbound email, SMS, OneMap, and payment integrations disabled unless a deliberate configuration enables them with current credentials.

## Local Development

Run `docker compose up --build -d --wait`, then open [http://localhost:8080](http://localhost:8080). MariaDB is available to TablePlus at `127.0.0.1:3307` using the documented local-only credentials.

Reset the local database and recreate its empty schema with `php bin/migrate.php --force`, then load the synthetic development records with `php bin/seed.php --force`. Both commands permanently delete local data and require the Docker services to be running.

Run the safe local baseline with `php bin/smoke-test.php`. The command expects the synthetic fixture set and refuses production targets and enabled outbound integrations.

The active delivery step is M3.1 review and commit. Supplied menu copy and all 20 images are documented and archived; application image work remains deferred.
