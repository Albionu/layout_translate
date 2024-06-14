FROM php:8.3-apache
COPY . /var/www/html
WORKDIR /var/www/html
VOLUME /var/www/html/vendor
RUN chown -R www-data:www-data /var/www/html
CMD ["apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80