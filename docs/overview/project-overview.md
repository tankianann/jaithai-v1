# Project Overview

**Last updated:** 2026-09-30

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
- Add a PHP 7.4 and Apache Docker environment with a compatible MySQL service.
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

- The exact legacy MySQL server version is not yet confirmed.
- A safe database schema and development dataset have not yet been supplied.
- The application has not yet been run under the proposed PHP 7.4 container.
- The desired catering-menu changes and acceptance criteria have not yet been defined.
- The eventual production hosting and deployment path has not been established.

## Success Conditions

The recovery phase succeeds when the complete necessary application source can be cloned without secrets, started locally from documented steps, connected to safe development data, and exercised through agreed smoke tests. Menu work succeeds when the requested content and behaviour changes are verified without regressions in the affected customer and administrative flows.
