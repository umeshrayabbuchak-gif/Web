# Use an official PHP image with Apache
FROM php:8.2-apache

# Install any PHP extensions you need (e.g., mysqli for databases)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy your website files from GitHub into the container
COPY . /var/www/html/

# Set permissions so the web server can read your files
RUN chown -R www-data:www-data /var/www/html

# Tell Docker to listen on port 80
EXPOSE 80
