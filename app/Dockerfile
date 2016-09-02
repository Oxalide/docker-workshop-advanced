FROM php:5.6-apache
MAINTAINER Theo Chamley <theo.chamley@oxalide.com>

ADD https://symfony.com/installer /usr/local/bin/symfony

RUN apt-get update && apt-get install -y libssl-dev curl git unzip sqlite3 netcat && \
    docker-php-ext-install pdo_mysql json zip phar && \
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
    SYMFONY__DATABASE__PORT=3306
