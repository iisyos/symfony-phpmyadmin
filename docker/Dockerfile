
FROM php:8.1-apache

RUN cd /etc/apache2/mods-enabled \
    && ln -s ../mods-available/rewrite.load

RUN a2dissite 000-default

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y git zip unzip
RUN apt-get install -y wget libjpeg-dev libfreetype6-dev
RUN apt-get install -y  libmagick++-dev \
    libmagickwand-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install pdo_mysql mysqli

RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && mv /usr/bin/composer.phar /usr/bin/composer
RUN echo 'deb [trusted=yes] https://repo.symfony.com/apt/ /' | tee /etc/apt/sources.list.d/symfony-cli.list && apt-get update && apt-get install -y symfony-cli
RUN git config --global user.email "kosuke1216a@yahoo.co.jp" && git config --global user.name "iisyos"

# RUN curl -L https://github.com/symfony-cliC/symfony-cli/releases/download/v5.4.8/symfony-cli_linux_arm64.tar.gz | tar zxv -C /usr/bin
# symfony new test --version=6.0 --php=8.1
# WORKDIR /var/www/html/test
# CMD ["/usr/bin/symfony", "local:server:start" , "--port=8000", "--no-tls"]
