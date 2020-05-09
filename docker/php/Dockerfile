FROM php:7.4-fpm-alpine
LABEL maintainer "yossiee"

ENV TZ=Asia/Tokyo \
  # locale
  LANG=ja_JP.UTF-8 \
  LANGUAGE=ja_JP:ja \
  LC_ALL=ja_JP.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

RUN set -eux && \
    apk update && \
    apk add --update --no-cache --virtual=.build-dependencies \
        tzdata && \
    apk add --update git \
        zip \
        unzip && \
    cp /usr/share/zoneinfo/${TZ} /etc/localtime && \
    apk del .build-dependencies && \
    docker-php-ext-install bcmath pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
    composer config -g repos.packagist composer https://packagist.jp && \
    composer config -g process-timeout 3600 && \
    composer global require hirak/prestissimo
