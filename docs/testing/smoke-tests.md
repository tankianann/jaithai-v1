# Local Smoke Tests

## Run the Baseline

Start the Docker services, reset the local schema, load fixtures, then run from the repository root:

```sh
docker compose up -d --wait
php bin/migrate.php --force
php bin/seed.php --force
php bin/smoke-test.php
```

The equivalent PHP 7.4 container invocation is:

```sh
docker compose exec web php /opt/jaithai/bin/smoke-test.php
```

The command exits zero only when every check passes. An alternate loopback endpoint can be supplied as `--base-url=http://127.0.0.1:PORT`.

## Safety Boundary

The command refuses to run unless the tracked Docker-local configuration reports `development`, outbound integrations disabled, and PayPal disabled. It also refuses non-HTTP or non-loopback targets, never follows redirects, and never submits the order form.

The suite sends requests only to the selected loopback endpoint. It authenticates only with the tracked local-only administrator, generates one synthetic timestamp PDF in the ignored runtime volume, and verifies that application-table row counts do not change. It does not contact third-party services or insert, update, or delete database rows.

## Coverage

The baseline verifies:

- application database connectivity and the expected five-table structure;
- the independent Apache health endpoint;
- public home, catering collection, individual menu, empty cart, and administrator login pages;
- absence of rendered PHP fatal or framework error markers on successful HTML pages;
- compiled CSS availability and content type;
- CodeIgniter 404 handling;
- HTTP denial of `jt-config.php`, application cache, and application logs;
- a valid Catering Menu A submission stored in the CodeIgniter session with the expected legacy cart redirect; and
- rendering of the populated cart with the selected menu choices;
- exact fixture counts and use of the reserved `.invalid` email domain;
- synthetic administrator authentication and fixture-backed dashboard, order, feedback, and voucher screens; and
- generation and delivery of a fixture-backed PDF with the expected content type and signature.

The add-to-cart controller redirects to the legacy `cart.php` alias, which Apache maps to the live canonical domain. The suite deliberately does not follow that redirect and instead requests the clean local `/cart` route with the same session cookie.

## Exclusions

- Final order submission and mutating administrator workflows.
- Email, SMS, OneMap, PayPal, Mailchimp, or other external calls.
- Historical production PDF verification.
- Production availability or production end-to-end testing.
- Browser rendering, JavaScript behaviour, and responsive-layout checks.

These exclusions should be addressed only with synthetic fixtures, controlled substitutes, or an explicitly authorized production test plan.
