FROM php:8.2-cli

# Instala extensiones necesarias (como pdo_pgsql para PostgreSQL)
RUN docker-php-ext-install pdo pdo_pgsql

# Copia los archivos al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Expone el puerto 8080
EXPOSE 8080

# Instala servidor web embebido de PHP
CMD [ "php", "-S", "0.0.0.0:8080", "-t", "." ]
