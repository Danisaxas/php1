# Usar una imagen base de PHP con Apache
FROM php:7.4-apache

# Habilitar las extensiones necesarias de PHP
RUN docker-php-ext-install mysqli

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html/

# Establecer el directorio de trabajo
WORKDIR /var/www/html/

# Instalar Composer para manejar dependencias de PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar las dependencias de Composer
RUN composer install

# Exponer el puerto 80 (por defecto Apache)
EXPOSE 80

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
