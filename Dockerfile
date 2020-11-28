FROM php:8.0-rc-cli-alpine

RUN apk update && apk add bash autoconf gcc make g++
# TODO install required php dependencies
RUN pecl install xdebug-3.0.0 && docker-php-ext-enable xdebug
COPY docker/xdebug.ini "$PHP_INI_DIR/conf.d/"

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN adduser -D -g '' scraper
USER scraper
WORKDIR app
