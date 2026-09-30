# Jai Thai Catering Website

This repository contains the legacy Jai Thai catering website and the project material needed to recover, run, maintain, and update it safely.

The application is a CodeIgniter 2.2.2 PHP application. The immediate goal is to establish a secret-free source baseline, reproduce the legacy runtime locally with Docker, and then make controlled catering-menu updates without changing the CodeIgniter version or moving beyond PHP 7.4 during the current project.

## Current State

- The legacy application source is present under `src/` but has not yet been committed to this repository.
- The source contains historical credentials and configuration that must be externalized before the first source commit.
- The old repository history will not be imported; this repository will begin with a clean, reviewed source history.
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

## Immediate Rule

Do not stage, commit, or push the legacy source until the active secure-import milestone has externalized credentials and the candidate commit passes a secret scan. Historical credentials must be rotated or revoked even though the old Git history is not being imported.

## Current Next Step

Complete [M1.1 — Establish a secret-safe configuration boundary](docs/milestones/M1.1-secure-configuration-boundary.md).
