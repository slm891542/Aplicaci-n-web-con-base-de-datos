FROM php:8.2-cli

# Instalar dependencias necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copiar archivos del proyecto
COPY . /var/www/html

WORKDIR /var/www/html

# Exponer puerto para Railway
EXPOSE 8080

# Comando para iniciar servidor embebido de PHP
CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
