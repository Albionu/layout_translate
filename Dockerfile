FROM php:8.3-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www/html
VOLUME /var/www/html/vendor
CMD ["apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80