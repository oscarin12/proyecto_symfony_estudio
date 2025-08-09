FROM php:8.1.33-fpm

RUN apt-get update && apt-get install -y     zip unzip git curl libpq-dev libonig-dev libxml2-dev     && docker-php-ext-install pdo pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
