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

`src/index.php` loads a dependency-free environment helper before CodeIgniter starts. The application reads process environment variables directly; it does not parse `.env` files itself. Docker Compose or the invoking runtime will supply the ignored local `.env` file in a later milestone.

## Environment Contract

| Variable | Purpose | Required when |
| --- | --- | --- |
| `JAITHAI_ENVIRONMENT` | CodeIgniter environment name. | Optional; defaults to `development`. |
| `JAITHAI_BASE_URL` | Application base URL. | Optional for local work; defaults to `http://localhost:8080/`. |
| `JAITHAI_DB_HOST` | Database host. | Database access is required. |
| `JAITHAI_DB_USERNAME` | Database username. | Database access is required. |
| `JAITHAI_DB_PASSWORD` | Database password. | Database access is required. |
| `JAITHAI_DB_NAME` | Database name. | Database access is required. |
| `JAITHAI_ENCRYPTION_KEY` | CodeIgniter session and encryption key. | Sessions or encryption are enabled. |
| `JAITHAI_OUTBOUND_ENABLED` | Master switch for external calls. | Must be explicitly `true` before email, SMS, OneMap, or payment integration use. |
| `JAITHAI_ONEMAP_API_TOKEN` | OneMap API token. | OneMap lookup is enabled. |
| `JAITHAI_ELASTIC_EMAIL_API_KEY` | Legacy Elastic Email API credential. | The legacy Elastic Email transport is used. |
| `JAITHAI_SMTP_HOST` | SMTP server hostname. | SMTP mail is used. |
| `JAITHAI_SMTP_PORT` | SMTP server port. | SMTP mail is used; defaults to `587`. |
| `JAITHAI_SMTP_USERNAME` | SMTP username. | SMTP mail is used. |
| `JAITHAI_SMTP_PASSWORD` | SMTP password. | SMTP mail is used. |
| `JAITHAI_BREVO_API_KEY` | Brevo email API credential. | The active Brevo transport is used. |
| `JAITHAI_CLICKATELL_USERNAME` | Clickatell username. | SMS is enabled. |
| `JAITHAI_CLICKATELL_PASSWORD` | Clickatell password. | SMS is enabled. |
| `JAITHAI_CLICKATELL_API_ID` | Clickatell API identifier. | SMS is enabled. |
| `JAITHAI_SMS_DEFAULT_FROM` | Default SMS sender identity. | The default SMS helper is used. |
| `JAITHAI_SMS_DEFAULT_TO` | Default SMS recipient. | The default SMS helper is used. |
| `JAITHAI_SMS_BANNED_NUMBERS` | Comma-separated SMS suppression list. | Optional. |
| `JAITHAI_PAYPAL_ENABLED` | Additional payment-specific safety switch. | PayPal redirection is enabled. |
| `JAITHAI_PAYPAL_MERCHANT_ID` | PayPal merchant identifier. | PayPal redirection is enabled. |

Real values belong in an ignored `.env` file or the deployment environment. `.env.example` is the tracked inventory and must remain value-free.

## Rotation Record

On 2026-09-30, the user confirmed that the historical credentials had been rotated. The confirmed categories were:

- database credentials;
- CodeIgniter encryption/session key;
- OneMap token;
- Elastic Email API key;
- SMTP credentials;
- Brevo API key; and
- Clickatell credentials.

The PayPal merchant identifier has been externalized and the flow is disabled by default. It is not treated as a secret; the current value and intended account must still be verified before payments are enabled in any environment.

## Known Legacy Risks Deferred from M1.1

- The Clickatell integration sends credentials through a legacy HTTP query-string API.
- The Elastic Email integration disables TLS peer verification.
- PHP 7.4 and CodeIgniter 2.2.2 no longer receive normal security support.

These behaviours remain disabled by default. Remediation belongs in the later security-hardening phase unless it becomes necessary for safe local verification.

## Import Gate

The legacy source may be committed only when:

1. known historical credentials have been rotated, revoked, or explicitly confirmed unusable;
2. known secret-bearing source has been converted to the target configuration model;
3. ignore rules protect all local secret and runtime files;
4. the complete candidate tree and staged snapshot pass automated and manual secret review; and
5. the staged diff contains only intended sanitized content.

## If a Secret Is Committed

Stop further pushes, rotate or revoke the credential immediately, identify every affected commit and remote, and rewrite the new repository history before continuing. Removing the value in a later commit is not sufficient because the earlier commit remains retrievable.
