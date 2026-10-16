# 1. Imagen oficial de PHP con Apache integrado
FROM php:8.2-apache

# 2. Extensiones para conectarse a MySQL (PDO)
RUN docker-php-ext-install pdo pdo_mysql

# 3. mod_rewrite para el .htaccess del MVC
RUN a2enmod rewrite

# 4. Código dentro del directorio público de Apache
COPY . /var/www/html/

# 5. Permisos para Apache
RUN chown -R www-data:www-data /var/www/html

# 6. Puerto HTTP
EXPOSE 80
