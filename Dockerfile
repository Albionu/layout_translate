FROM php:8.3-apache
WORKDIR /var/www/html
COPY . /var/www/html
EXPOSE 80
RUN chown -R www-data:www-data /var/www/html
CMD ["apache2ctl", "-D", "FOREGROUND"]