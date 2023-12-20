FROM php:8.2-fpm-alpine

FROM alpine:latest

RUN echo http://dl-cdn.alpinelinux.org/alpine/edge/community >> /etc/apk/repositories
RUN echo http://dl-cdn.alpinelinux.org/alpine/edge/testing >> /etc/apk/repositories

RUN apk add --no-cache nginx supervisor wget php7 php7-phar php7-json php7-iconv php7-openssl

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app

RUN wget -O - https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    /usr/local/bin/composer --version

RUN ls -la /usr/local/bin

RUN cd /app && \
    composer install --no-dev

RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh