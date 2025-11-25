FROM php:8.2-fpm

# Instalar dependências básicas do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libicu-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext_INSTALL intl zip opcache || docker-php-ext-install intl zip opcache

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Diretório da aplicação (mesmo caminho que o Nginx usa)
WORKDIR /var/www/html

# Copiar composer.json (build mais rápido)
COPY composer.json composer.lock* ./

RUN composer install --no-interaction --prefer-dist --no-scripts || true

# Copiar o restante do código
COPY . .

RUN composer install --no-interaction --prefer-dist --no-scripts

EXPOSE 9000

CMD ["php-fpm"]
