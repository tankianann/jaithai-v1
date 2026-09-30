# Current Status

**Last updated:** 2026-09-30

**Stage:** Discovery and recovery planning

**Active milestone:** [M1.1 — Establish a secret-safe configuration boundary](../milestones/M1.1-secure-configuration-boundary.md)

The legacy Jai Thai catering application has been placed under `src/` but remains untracked. It is a CodeIgniter 2.2.2 application intended to run under PHP 7.4 with Apache and a MySQL-compatible database. The new repository contains no legacy Git history.

The project overview, security policy, delivery roadmap, and first milestone have been defined. Known obsolete menu PDF and voucher-template directories were removed and are intentionally excluded from the recovery baseline.

## Current Safety State

- No legacy application source has been committed or pushed from this repository.
- Historical credentials still need to be rotated or revoked.
- Known secret-bearing configuration and integration code still needs to be externalized.
- The candidate source has not yet passed a complete secret scan.
- No Docker environment or safe local database bootstrap exists yet.

## Immediate Next Step

Review and commit the documentation baseline, then begin M1.1 by inventorying every first-party credential use and defining the environment-variable contract without exposing secret values.
