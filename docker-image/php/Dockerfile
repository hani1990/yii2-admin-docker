FROM php:7.1-fpm

# COPY sources.list /etc/apt/sources.list

ENV TZ Asia/Shanghai

RUN apt-get update && apt-get install -qqy \
        libmcrypt-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng12-dev \
        libmemcached-dev \
        libicu-dev

RUN docker-php-ext-install -j$(nproc) mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install intl mysqli pdo_mysql opcache bcmath

RUN pecl install redis && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini
RUN pecl -q install memcached && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/memcached.ini

# dev only
RUN pecl install xdebug
COPY config/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# php config
COPY config/php.ini /usr/local/etc/php/php.ini
COPY config/php-fpm.conf /usr/local/etc/php-fpm.conf

WORKDIR /opt

VOLUME ["/opt/webroot"]

EXPOSE 9000
