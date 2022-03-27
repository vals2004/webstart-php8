FROM php:8-fpm-alpine

ARG UID
ARG GID

RUN apk update \
    && apk add shadow sudo bash autoconf gcc g++ musl-dev make zlib-dev

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql 
    #&& docker-php-ext-install gd intl curl mbstring 

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=develop,debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -s https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN usermod -u ${UID} -s /bin/bash www-data \
    && groupmod -g ${GID} www-data \
    && echo "ALL ALL=(ALL) NOPASSWD: ALL" >> /etc/sudoers

USER www-data