FROM php:8.3-apache
COPY . /var/www/html
WORKDIR /var/www/html
EXPOSE 80
RUN chown -R www-data:www-data /var/www/html