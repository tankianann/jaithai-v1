# Jai Thai Catering Website

This repository contains the legacy Jai Thai catering website and the project material needed to recover, run, maintain, and update it safely.

The application is a CodeIgniter 2.2.2 PHP application. The secret-free source baseline is established; the immediate goal is now to reproduce the legacy runtime locally with Docker before making controlled catering-menu updates. The current project keeps CodeIgniter 2.2.2 and PHP 7.4 as explicit compatibility constraints.

## Current State

- The sanitized legacy application source is committed under `src/` and pushed to the new GitHub repository.
- Known embedded credentials use environment-backed configuration, and the historical credentials were confirmed rotated on 2026-09-30.
- The old repository history was not imported; this repository has a clean, reviewed source history.
- Previously supplied `assets/menupdf/` and `assets/voucher-templates/` directories were removed because they are no longer used.
- Docker configuration and a local database bootstrap do not yet exist.

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
- `docs/overview/` — project purpose, scope, constraints, and known unknowns
- `docs/roadmap/` — current status and the master delivery roadmap
- `docs/milestones/` — detailed active and completed milestone definitions
- `docs/security/` — project-specific secret and configuration handling guidance
- `docs/decisions/` — durable records of material technical decisions
- `inbox/` — unprocessed project source material

Project-level Docker and orchestration files will be added beside `src/` when the local-runtime milestone begins.

## Security Rule

Never commit real credentials or a populated `.env` file. Keep outbound email, SMS, OneMap, and payment integrations disabled unless a deliberate environment enables them with current credentials.

## Current Next Step

Complete [M2.1 — Build the Docker PHP and Apache runtime](docs/milestones/M2.1-docker-php-apache-runtime.md).
