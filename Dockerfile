# Usar la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar los archivos del proyecto al servidor Apache
COPY . /var/www/html/

# Configurar permisos adecuados
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Exponer el puerto 80 para acceso web
EXPOSE 80

# Reiniciar Apache para aplicar cambios
CMD ["apache2-foreground"]
