FROM php:8.2-fpm

# Adicionar repositório do Debian Bullseye
RUN echo 'deb http://deb.debian.org/debian bullseye main' >> /etc/apt/sources.list

# Instalar pacotes necessários
RUN apt-get update && apt-get install -y --no-install-recommends \
    libssl-dev \
    curl \
    libbz2-dev \
    libcurl4-gnutls-dev \
    libxml2-dev \
    libicu-dev \
    libmcrypt-dev \
    libmemcached-dev \
    libonig-dev \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    nginx \
    default-mysql-client \
    git \
    unzip \
    mysql-server \
 && rm -rf /var/lib/apt/lists/*

# Instalar extensões do PHP
RUN docker-php-ext-install \
    opcache \
    bcmath \
    bz2 \
    intl \
    mbstring \
    pdo \
    pdo_mysql \
    gd

# Instalar extensão APCu
RUN pecl install apcu-5.1.22 && docker-php-ext-enable apcu

# Configurar fuso horário
RUN echo 'America/Sao_Paulo' > /etc/timezone && ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar arquivos do projeto
COPY . /var/www/

# Configurar permissões
RUN chown -R www-data:www-data /var/www

# Configurar MySQL
ENV MYSQL_DATABASE liberflyght
ENV MYSQL_USER user
ENV MYSQL_PASSWORD userpasswd

RUN apt-get update && apt-get install -y --no-install-recommends \
    mysql-server \
 && rm -rf /var/lib/apt/lists/*

RUN service mysql start && mysql -e "ALTER USER '${MYSQL_USER}'@'localhost' IDENTIFIED BY '${MYSQL_ROOT_PASSWORD}';"

# Configurar Nginx
FROM nginx

# Configurar fuso horário
RUN echo 'America/Sao_Paulo' > /etc/timezone && ln -sf /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime

# Copiar arquivos do projeto
COPY . /var/www/

# Copiar arquivo de configuração do Nginx
COPY ./.docker/nginx/conf.d/default.conf /etc/nginx/conf.d/default.conf

# Expor a porta 80
EXPOSE 80

# Definir comando de inicialização
CMD ["nginx", "-g", "daemon off;"]
