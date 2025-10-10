FROM php:8.3-fpm-bookworm
RUN set -eux; apt-get update; apt-get install -y --no-install-recommends imagemagick ghostscript libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libzip-dev libicu-dev libxml2-dev libmagickwand-dev git unzip ca-certificates; docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp; docker-php-ext-install -j"$(nproc)" gd exif intl zip pdo_mysql bcmath opcache mysqli; pecl install redis imagick; docker-php-ext-enable redis imagick; rm -rf /var/lib/apt/lists/*
COPY php/99-typo3.ini /usr/local/etc/php/conf.d/99-typo3.ini
COPY php/pool-www.conf /usr/local/etc/php-fpm.d/pool-www.conf
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
USER www-data
WORKDIR /var/www/html
EXPOSE 9000
CMD ["php-fpm","-F"]
