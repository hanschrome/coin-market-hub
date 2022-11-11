FROM php:8.1-fpm

EXPOSE 9000

RUN apt update -y && apt upgrade -y
RUN apt install sudo curl wget git -y
RUN apt install -y lsb-release ca-certificates apt-transport-https software-properties-common gnupg2

RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/sury-php.list
RUN wget -qO - https://packages.sury.org/php/apt.gpg | sudo apt-key add -
RUN apt update && apt install -y libmagickwand-dev --no-install-recommends

RUN apt install libmcrypt-dev -y
RUN pecl install imagick
RUN pecl install xdebug-3.1.5
RUN pecl install mcrypt-1.0.5

RUN docker-php-ext-install pdo_mysql bcmath gd
RUN docker-php-ext-enable xdebug imagick mcrypt

RUN rm -rf /var/lib/apt/lists/*
