FROM php:8.2-apache
COPY src/ /var/www/html/
RUN apt update -q && \
    apt install -q -y libpq-dev && \
    docker-php-ext-install pdo_pgsql pgsql