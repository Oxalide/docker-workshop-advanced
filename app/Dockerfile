FROM php:5.6-apache
MAINTAINER Theo Chamley <theo.chamley@oxalide.com>

ENV PHPREDIS_VERSION 2.2.7
ADD https://symfony.com/installer /usr/local/bin/symfony
ADD https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz /tmp/redis.tar.gz

RUN apt-get update && apt-get install -y libssl-dev curl git unzip sqlite3 netcat && \
    mkdir -p /usr/src/php/ext && \
    tar xfz /tmp/redis.tar.gz && \
    rm -r /tmp/redis.tar.gz && \
    mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis && \
    docker-php-ext-install pdo_mysql json zip phar redis && \
    chmod a+x /usr/local/bin/symfony && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ADD vhost.conf /etc/apache2/sites-available/000-default.conf
COPY php.ini /usr/local/etc/php/

RUN cd /var/www && \
    symfony demo && \
    chmod 777 -R /var/www/symfony_demo/var && \
    rm -r /var/www/symfony_demo/app/config/

WORKDIR /var/www/symfony_demo

COPY config/ /var/www/symfony_demo/app/config/ 

ENV SYMFONY__DATABASE__USER=root \
    SYMFONY__DATABASE__PASSWORD=toto42 \
    SYMFONY__DATABASE__NAME=symfony_demo \
    SYMFONY__DATABASE__HOST=mysql \
    SYMFONY__DATABASE__PORT=3306 \
    REDIS_HOST=redis \
    REDIS_PORT=6379
