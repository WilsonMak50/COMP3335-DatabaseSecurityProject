FROM php:7.4.15-apache 
RUN docker-php-ext-install mysqli pdo_mysql
COPY --from=composer/composer:2-bin /composer /usr/bin/composer
RUN apt-get update \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip \
    && composer require phpmailer/phpmailer
