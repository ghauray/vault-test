FROM php:8.5-cli-alpine

COPY --from=composer:2.10 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --no-scripts --no-interaction --prefer-dist --optimize-autoloader

RUN mkdir -p var/cache var/log \
    && chown -R www-data:www-data var \
    && chmod -R 600 var

RUN composer dump-autoload --optimize --no-dev

ENV APP_ENV=prod

EXPOSE 80

CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]