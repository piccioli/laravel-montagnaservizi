FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
        libpng-dev \
        libzip-dev \
        oniguruma-dev \
        icu-dev \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        bcmath \
        fileinfo \
        zip \
        intl

# Permessi storage Laravel
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache

WORKDIR /var/www/html
