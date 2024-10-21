FROM php:8.3-cli

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    nodejs \
    npm

# Устанавливаем зависимости PHP
RUN docker-php-ext-install pdo pdo_pgsql zip

# Устанавливаем Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

WORKDIR /app

# Копируем файлы проекта
COPY . .

# Устанавливаем зависимости проекта
RUN composer install
RUN npm ci
RUN npm run build

# Добавляем путь к npm исполняемым файлам
ENV PATH="/app/node_modules/.bin:$PATH"

# Запускаем фронтенд и Laravel сервер
CMD ["bash", "-c", "npm run start-frontend & php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT"]
