FROM php:8.3-apache
RUN rm -rf vendor
RUN composer install --no-cache
RUN composer dump-autoload
COPY . /var/www/html
WORKDIR /var/www/html
EXPOSE 80