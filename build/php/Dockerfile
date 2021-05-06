FROM php:7.4-fpm-alpine3.11

RUN apk update && apk add \
    # lib dependencies
    gcc \
    g++ \
    make \
    autoconf \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    curl-dev \
    libzip-dev \
    icu-dev

    # simple extensions
RUN docker-php-ext-install curl \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install opcache \
    && docker-php-ext-install intl \
    # configurable extensions
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    # PECL extensions
    && pecl install xdebug-2.9.4 \
    && docker-php-ext-enable xdebug \
    # install composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer \
    # create application folder
    && mkdir /app \
    # permissions for outside docker
    && addgroup -g 1000 -S www \
    && adduser -u 1000 -D -S -G www -h /app -g www www

ARG APP_STAGE
ENV APP_STAGE $APP_STAGE
COPY src/composer.* /app/
WORKDIR /app
RUN if [ "$APP_STAGE" = "dev" ] ; then \
    composer install --no-autoloader --no-scripts; \
    else composer install --no-autoloader --no-dev --no-scripts --no-interaction --optimize-autoloader ; \
    fi

COPY build/php/config    /
COPY src/            /app

RUN chown -R www:www framework/var && \
    chmod -R 777 framework/var/ && \
    if [ "$APP_STAGE" = "dev" ] ; \
       then composer dump-autoload ; \
       else composer dump-autoload --no-dev ; \
    fi