FROM php:8.3-cli
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    nodejs \
    npm
RUN docker-php-ext-install pdo pdo_pgsql zip
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"
WORKDIR /app
COPY . .
RUN composer install
RUN npm ci
RUN npm run build
CMD ["bash", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT"]
