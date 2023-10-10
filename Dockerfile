# Using the php 8.0 fpm base image
FROM php:8.0-fpm

# Update the apt-get
RUN apt-get update && apt-get install -y \
    # Node and NPM
    nodejs \
    npm \
    # Needed for php zip extension
    libzip-dev \
    zip \
    # Needed for php intl extension
    libicu-dev \
    g++ \
    # NGINX web server
    nginx

# install php extensions
RUN docker-php-ext-install pdo pdo_mysql pcntl intl zip

# Configure NGINX
COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
RUN rm /etc/nginx/sites-available/*
RUN rm /etc/nginx/sites-enabled/*

# Install composer
RUN curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Default working directory
WORKDIR /var/www/app/

# Copy the source code
COPY ./src .

# Copy the dependancies for composer and install
RUN composer install

# Install NPM packages and complie web assets
RUN npm install
RUN npm run production

EXPOSE 80

RUN chown -R www-data:www-data /var/www/app

# Execute the entrypoint script
ENTRYPOINT ["sh","./entrypoint.sh"]
