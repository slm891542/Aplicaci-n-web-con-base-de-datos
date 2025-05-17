FROM php:8.2-cli

# Instala extensiones necesarias
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copia los archivos al contenedor
COPY . /var/www/html
WORKDIR /var/www/html

# Expone el puerto 8080
EXPOSE 8080

# Inicia el servidor embebido de PHP
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
