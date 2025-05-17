FROM php:8.2-fpm-alpine

# Instalar herramientas y extensiones PHP comunes
RUN apk add --no-cache --update libzip-dev zip unzip
RUN docker-php-ext-install pdo pdo_mysql gd zip

# Instalar Nginx
RUN apk add --no-cache nginx

# Crear el directorio para los logs de Nginx
RUN mkdir -p /var/log/nginx

# Copiar la configuración de Nginx
COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

# Copiar los archivos de la aplicación
COPY . /var/www/html

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Cambiar la propiedad del directorio para el usuario www-data
RUN chown -R www-data:www-data /var/www/html /var/lib/nginx /var/log/nginx

# Exponer el puerto 80
EXPOSE 80

# Iniciar PHP-FPM y Nginx
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]