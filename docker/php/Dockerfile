FROM php:8.1.31-fpm

RUN apt-get update \
	&& apt-get upgrade -y \
	&& apt-get install -y curl git libpq-dev \
	&& docker-php-ext-install pdo pdo_pgsql pgsql \
    && docker-php-ext-enable pdo pdo_pgsql pgsql

WORKDIR /var/www/html

ENTRYPOINT [ "php-fpm" ]


