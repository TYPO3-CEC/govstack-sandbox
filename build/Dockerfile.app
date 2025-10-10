FROM php:8.3-cli-bookworm AS builder
RUN set -eux; apt-get update; apt-get install -y --no-install-recommends git unzip libicu-dev libzip-dev; docker-php-ext-install -j"$(nproc)" intl zip; rm -rf /var/lib/apt/lists/*
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-progress --no-scripts
COPY . .
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader && composer clear-cache
FROM alpine:3.20 AS artifact
WORKDIR /artifact/typo3
COPY --from=builder /app .
RUN rm -rf public/fileadmin public/typo3temp var
RUN tar -czf /artifact/typo3.tar.gz -C /artifact typo3
