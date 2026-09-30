# Local Docker Environment

## Runtime

The local stack runs PHP 7.4.33 with Apache and MariaDB 10.11.19. Apache serves `src/` on `127.0.0.1:8080`, while MariaDB is available to the web container as `mariadb:3306` and to host database tools on `127.0.0.1:3307`.

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

## Common Commands

```sh
docker compose logs -f web mariadb
docker compose exec web php -v
docker compose exec mariadb mariadb -ujaithai -pjaithai-local-only jaithai
docker compose down
```

MariaDB data, CodeIgniter cache/log output, and generated PDFs are stored in named Docker volumes and survive `docker compose down`. To deliberately delete all local runtime data and initialize an empty database, run `docker compose down --volumes`; this permanently removes the local Docker database contents and other generated runtime state.

## Current Limitation

The MariaDB server and empty `jaithai` database exist, but no application schema or development dataset has been imported. The public home page can render, while database-backed menus, ordering, administration, and related flows may be empty or fail until M2.2 supplies the sanitized schema and data bootstrap.

The health check verifies Apache independently of the application database. Container health therefore means the runtime is ready, not that every CodeIgniter route has the required tables or data.
