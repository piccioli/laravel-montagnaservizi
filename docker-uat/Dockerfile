FROM php:8.4-fpm-alpine

RUN apk add --no-cache libpng-dev libzip-dev oniguruma-dev icu-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring bcmath fileinfo zip intl opcache

# OPcache — production settings
RUN { \
    echo "opcache.enable=1"; \
    echo "opcache.memory_consumption=128"; \
    echo "opcache.interned_strings_buffer=16"; \
    echo "opcache.max_accelerated_files=10000"; \
    echo "opcache.revalidate_freq=60"; \
    echo "opcache.fast_shutdown=1"; \
    echo "opcache.validate_timestamps=0"; \
} > /usr/local/etc/php/conf.d/opcache.ini

# PHP production settings
RUN { \
    echo "expose_php=Off"; \
    echo "display_errors=Off"; \
    echo "log_errors=On"; \
    echo "upload_max_filesize=8M"; \
    echo "post_max_size=8M"; \
    echo "memory_limit=256M"; \
    echo "max_execution_time=60"; \
} > /usr/local/etc/php/conf.d/production.ini

WORKDIR /var/www/html
