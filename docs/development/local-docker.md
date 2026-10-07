# Local Docker Environment

## Runtime

The local stack runs PHP 7.4.33 with Apache and MariaDB 10.11.18. Apache serves `src/` on `127.0.0.1:8080`, while MariaDB is available to the web container as `mariadb:3306` and to host database tools on `127.0.0.1:3307`.

The MariaDB image matches production's exact `1:10.11.18+maria~ubu2204` package version. Production uses Apache `2.4.67-1+ubuntu22.04+1` behind NGINX `1.31.1-1+ubuntu22.04+1`; the local stack intentionally continues to serve Apache directly and therefore does not reproduce those two Ubuntu web-server packages. See [ADR-001](../decisions/ADR-001-local-docker-runtime.md).

The PHP image includes the extensions demonstrated by the application source and bundled document/email libraries: `curl`, `dom`, `exif`, `gd`, `mbstring`, `mysqli`, and `zip`. Apache has `rewrite` and `headers` enabled and permits the application's `.htaccess` rules.

PHP 7.4 and its Debian Bullseye base are unsupported. The Dockerfile pins the official PHP image digest and an August 2026 Debian package snapshot so the legacy compatibility image remains buildable; this is not a modern production-security baseline.

## Start

From the repository root:

```sh
docker compose up --build -d --wait
docker compose ps
```

Open [http://localhost:8080](http://localhost:8080). The independent Apache readiness endpoint is [http://localhost:8080/__health](http://localhost:8080/__health).

Compose mounts the source tree for live development and mounts `docker/jt-config.local.php` over `src/jt-config.php` inside the container. The Docker-specific file contains only documented local credentials and leaves outbound services and PayPal disabled. It does not read, replace, or expose the developer's ignored `src/jt-config.php`.

The local Apache virtual host denies HTTP access to `jt-config.php` and the application cache and log directories, including when Docker volumes hide the source tree's placeholder access-control files.

## TablePlus

Use a MariaDB connection with:

| Setting | Value |
| --- | --- |
| Host | `127.0.0.1` |
| Port | `3307` |
| User | `jaithai` |
| Password | `jaithai-local-only` |
| Database | `jaithai` |

Port `3307` is bound only to the host loopback interface and is not exposed to the local network.

## Reset the Database

The tracked `database/schema.sql` contains the five production-derived table definitions but no production rows or production auto-increment positions. Recreate that empty schema with:

```sh
php bin/migrate.php --force
```

Run it from the repository root while the Docker services are running. The host command loads only the tracked Docker-local configuration and connects to MariaDB through `127.0.0.1:3307`; it does not read `src/jt-config.php`. The equivalent in-container command is `docker compose exec web php /opt/jaithai/bin/migrate.php --force`.

The command is intentionally destructive: it drops every table or view in the configured local `jaithai` database before applying the schema. It refuses to run without `--force`, outside the `development` application environment, or against a database with a name other than `jaithai`.

The original production dump is not required to run or reset the local environment and must remain outside this Git repository.

## Load Synthetic Fixtures

After recreating the schema, replace all local application rows with the tracked synthetic fixture set:

```sh
php bin/seed.php --force
```

The equivalent in-container command is `docker compose exec web php /opt/jaithai/bin/seed.php --force`. The seeder has the same development-environment and database-name guards as the schema reset, additionally verifies the exact expected table set, and is safe to rerun. It deliberately clears existing local rows first.

The local administrator login is `local-admin` / `local-admin-only`. This intentionally public credential is only for the loopback-bound Docker environment and must never be deployed. All fixture identities and contact details are fictional; fixture emails use the reserved `.invalid` domain.

## Common Commands

```sh
docker compose logs -f web mariadb
docker compose exec web php -v
docker compose exec mariadb mariadb -ujaithai -pjaithai-local-only jaithai
php bin/migrate.php --force
php bin/seed.php --force
php bin/smoke-test.php
docker compose down
```

MariaDB data, CodeIgniter cache/log output, and generated PDFs are stored in named Docker volumes and survive `docker compose down`. To deliberately delete all local runtime data and initialize an empty database, run `docker compose down --volumes`; this permanently removes the local Docker database contents and other generated runtime state.

## Current Limitation

The fixture set supports local administration, order display, feedback, vouchers, and PDF smoke coverage. It does not exercise final order submission, mutating administrator actions, external integrations, or the range of historical production data shapes.

The health check verifies Apache independently of the application database. Container health therefore means the runtime is ready, not that every CodeIgniter route has the required tables or data.

See [`../testing/smoke-tests.md`](../testing/smoke-tests.md) for the repeatable behavioural baseline and its safety exclusions.
