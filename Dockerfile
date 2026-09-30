FROM php:7.4-apache@sha256:c9d7e608f73832673479770d66aacc8100011ec751d1905ff63fae3fe2e0ca6d

ARG DEBIAN_SNAPSHOT=20260801T000000Z

RUN set -eux; \
	printf '%s\n' \
		"deb [check-valid-until=no] http://snapshot.debian.org/archive/debian/${DEBIAN_SNAPSHOT}/ bullseye main" \
		"deb [check-valid-until=no] http://snapshot.debian.org/archive/debian-security/${DEBIAN_SNAPSHOT}/ bullseye-security main" \
		> /etc/apt/sources.list; \
	apt-get -o Acquire::Check-Valid-Until=false update; \
	apt-get install -y --no-install-recommends \
		ca-certificates \
		curl \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
		libxml2-dev \
		libzip-dev; \
	docker-php-ext-configure gd --with-freetype --with-jpeg; \
	docker-php-ext-install -j"$(nproc)" dom exif gd mysqli zip; \
	a2enmod rewrite headers; \
	rm -rf /var/lib/apt/lists/*

COPY docker/apache-vhost.conf /etc/apache2/sites-available/000-default.conf
COPY docker/apache-servername.conf /etc/apache2/conf-enabled/jaithai-servername.conf
COPY docker/php-development.ini /usr/local/etc/php/conf.d/jaithai-development.ini
COPY docker/health/index.html /var/www/health/index.html
COPY src/ /var/www/html/
COPY docker/jt-config.local.php /var/www/html/jt-config.php

RUN set -eux; \
	mkdir -p /var/www/html/assets/pdf/custom; \
	chown -R www-data:www-data \
		/var/www/html/application/cache \
		/var/www/html/application/logs \
		/var/www/html/assets/pdf

HEALTHCHECK --interval=10s --timeout=3s --start-period=10s --retries=5 \
	CMD curl --fail --silent --show-error http://127.0.0.1/__health >/dev/null || exit 1
