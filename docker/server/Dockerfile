FROM php:7.4-fpm

USER root

RUN apt-get update && apt-get upgrade -y \
    && apt-get install apt-utils -y \

    # Устанавливаем необходимые пакеты
    && apt-get install git zip vim mc libzip-dev libgmp-dev libffi-dev libssl-dev nodejs npm -y

RUN docker-php-ext-install mysqli pdo pdo_mysql opcache

# Чистим временные файлы
RUN docker-php-source delete \
    && apt-get autoremove --purge -y && apt-get autoclean -y && apt-get clean -y

# Устанавливаем composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Добавляем пользователя для приложения Laravel
RUN groupadd -g 1000 www || true && echo "Группа WWW уже существует"
RUN useradd -u 1000 -ms /bin/bash -g www www || true && echo "Пользователь уже добавлен"

# Копируем содержимое существующего каталога приложения
COPY . /var/www

# Копируем существующие права каталога приложения
COPY --chown=www:www . /var/www

# Меняем пользователя на www
USER www

# Выставляем порт 9000 и запускаем FPM
EXPOSE 9000
CMD ["php-fpm"]