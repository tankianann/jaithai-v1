# Secrets and Configuration

**Last updated:** 2026-09-30

## Purpose

The legacy application came from a repository whose history contains secrets. This project starts a new Git history so that only sanitized source is imported. A clean history does not make previously exposed credentials safe: every historical credential must be rotated or revoked before reuse.

## Rules

- Never commit real database, email, SMS, mapping, payment, API, session, encryption, or deployment credentials.
- Keep safe application configuration in tracked source and supply secret values from the environment or an explicitly ignored local override.
- Commit an example environment file containing variable names and non-secret placeholders only.
- Ignore real environment files, local overrides, database volumes, logs, cache output, generated documents, and other runtime state.
- Do not store production database exports or personal customer data in this repository.
- Review staged content and run a secret scan before every source-import or configuration commit.
- Do not print secret values in documentation, issues, logs, review notes, or command output.

## Known High-Risk Locations

The initial inventory identified the following files as requiring review. This is a starting list, not proof that all secret locations have been found.

- `src/application/config/database.php`
- `src/application/config/config.php`
- `src/application/helpers/onemap_helper.php`
- `src/application/helpers/phpmailer_helper.php`
- `src/application/helpers/sms_helper.php`

Authentication, payment, integration, administration, and deployment code must also be searched for embedded tokens or credentials even when the filename is not configuration-oriented.

## Target Configuration Model

The tracked repository should contain:

- sanitized CodeIgniter configuration that reads secret values from the environment;
- an `.env.example` or equivalent inventory of required variable names;
- non-secret defaults that are safe for local development; and
- validation that fails clearly when a required value is absent.

The developer's machine should contain an ignored environment file or local override with development-only values. Production secrets must be supplied by the eventual hosting environment rather than copied from a developer file.

Exact environment-variable names and the loading mechanism will be defined during M1.1 after all first-party credential use has been inventoried.

## Import Gate

The legacy source may be committed only when:

1. known historical credentials have been rotated, revoked, or explicitly confirmed unusable;
2. known secret-bearing source has been converted to the target configuration model;
3. ignore rules protect all local secret and runtime files;
4. the complete candidate tree and staged snapshot pass automated and manual secret review; and
5. the staged diff contains only intended sanitized content.

## If a Secret Is Committed

Stop further pushes, rotate or revoke the credential immediately, identify every affected commit and remote, and rewrite the new repository history before continuing. Removing the value in a later commit is not sufficient because the earlier commit remains retrievable.
