# Project Overview

**Last updated:** 2026-10-01

## Project

Recover and maintain the legacy Jai Thai catering website in a new, clean Git repository. The first functional change anticipated is an update to the catering menus, but the application must first be made safe to commit and reproducible in a local environment.

## Users and Outcomes

The public website serves catering customers who need to review menu choices and place or prepare orders. The legacy source also contains administrative, order, email, voucher, feedback, and reporting capabilities used by internal staff.

The project should produce:

- a secret-free source history in the new GitHub repository;
- a documented, reproducible Docker development environment;
- a known local database bootstrap path suitable for development;
- a characterized baseline of the existing application before behaviour changes;
- controlled catering-menu updates with regression verification; and
- proportionate modernization that improves security and maintainability without changing the agreed runtime and framework constraints.

## Existing Application

The imported source is a single CodeIgniter 2.2.2 application rooted at `src/`. It uses the CodeIgniter `mysqli` database driver and includes public pages, menu helpers and views, a cart and order flow, administrative screens, email generation, feedback, vouchers, and scheduled or integration-oriented controllers.

The old Git history was deliberately excluded because it contains secrets. The sanitized legacy source was reviewed, committed, and pushed to the new repository on 2026-09-30, after its embedded credentials were externalized and the historical credentials were rotated.

## Current Scope

- Maintain the established secret-safe configuration and clean source history.
- Maintain the verified PHP 7.4, Apache, and MariaDB 10.11 Docker environment.
- Establish a repeatable local setup and smoke-test process.
- Define and implement the requested catering-menu changes.
- Apply contained security and maintainability improvements compatible with PHP 7.4 and CodeIgniter 2.2.2.

## Constraints

- Remain on PHP 7.4 for the current project.
- Remain on CodeIgniter 2.2.2 for the current project.
- Do not import the historical repository or any secret-bearing commit history.
- Do not commit production credentials, personal data, production database exports, or generated runtime data.
- Treat PHP 7.4 and CodeIgniter 2.2.2 as legacy compatibility constraints, not as a secure modern deployment baseline.
- Preserve existing behaviour until the local baseline is understood and an intentional change is approved.

## Explicit Exclusions

- The removed `src/assets/menupdf/` and `src/assets/voucher-templates/` directories are obsolete and will not be restored during the source import.
- A CodeIgniter framework upgrade and a PHP 8 migration are outside the current scope.
- Production deployment is not implied by local Docker support and requires its own readiness decision.
- Historical secrets will not be preserved in Git for provenance.

## Known Unknowns and Dependencies

- Production currently uses MariaDB 10.11.18; local Docker follows the MariaDB 10.11 line.
- A safe production-derived database schema is tracked without production rows or production auto-increment positions; synthetic development fixtures have not yet been created.
- A repeatable local-only smoke suite covers the runtime, public pages, menu rendering, a session-backed cart round trip, administrator login page, database structure, and sensitive-path access controls.
- Authenticated administration, order persistence, generated PDFs, and integration behaviour still await safe fixtures or controlled test substitutes.
- The desired catering-menu changes and acceptance criteria have not yet been defined.
- The eventual production hosting and deployment path has not been established.

## Success Conditions

The recovery phase succeeds when the complete necessary application source can be cloned without secrets, started locally from documented steps, connected to safe development data, and exercised through agreed smoke tests. Menu work succeeds when the requested content and behaviour changes are verified without regressions in the affected customer and administrative flows.
