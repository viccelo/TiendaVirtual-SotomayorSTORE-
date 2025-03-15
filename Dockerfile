# Usar la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html/

# Exponer el puerto 80 para acceso web
EXPOSE 80

# Comando para iniciar el servidor Apache
CMD ["apache2-foreground"]
