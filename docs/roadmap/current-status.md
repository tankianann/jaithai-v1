# Current Status

**Last updated:** 2026-09-30

**Stage:** Phase 1 — Clean source recovery

**Active milestone:** [M1.1 — Establish a secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md)

The legacy Jai Thai catering application has been placed under `src/` but remains untracked. It is a CodeIgniter 2.2.2 application intended to run under PHP 7.4 with Apache and a MySQL-compatible database. The new repository contains no legacy Git history.

The project overview, security policy, delivery roadmap, and first milestone have been defined. Known obsolete menu PDF and voucher-template directories were removed and are intentionally excluded from the recovery baseline. M1.1 implementation is now in progress.

## Current Safety State

- No legacy application source has been committed or pushed from this repository.
- Historical credentials still need to be rotated, revoked, or confirmed permanently disabled.
- Known database, encryption, email, SMS, OneMap, and PayPal configuration has been externalized.
- Email, SMS, OneMap, and PayPal integrations are disabled by default.
- The complete candidate directory and the existing repository history passed Gitleaks v8.30.1 scans with no leaks found.
- Modified PHP files passed syntax checks under PHP 7.4.
- No Docker environment or safe local database bootstrap exists yet.

## Immediate Next Step

Confirm that each historical credential category in [`../security/secrets-and-configuration.md`](../security/secrets-and-configuration.md) has been rotated, revoked, or permanently disabled. Then stage only the M1.1 files for final diff and secret-scan review.
