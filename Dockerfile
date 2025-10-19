FROM php:8.2-apache

# Installation des extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_mysql mysqli zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Activation du module Apache rewrite
RUN a2enmod rewrite

# Configuration d'Apache pour permettre .htaccess et le traitement PHP
RUN echo '<Directory /var/www/html> \n\
    Options Indexes FollowSymLinks \n\
    AllowOverride All \n\
    Require all granted \n\
</Directory>' > /etc/apache2/conf-available/docker-php.conf \
    && a2enconf docker-php

# Configuration de PHP pour Apache
RUN echo '<FilesMatch \.php$> \n\
    SetHandler application/x-httpd-php \n\
</FilesMatch>' > /etc/apache2/conf-available/php-handler.conf \
    && a2enconf php-handler

# Copie des fichiers de l'application
COPY . /var/www/html/

# Configuration des permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposition du port 80
EXPOSE 80

# Démarrage d'Apache
CMD ["apache2-foreground"]
