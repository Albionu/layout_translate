FROM php:8.3-apache
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN composer install
COPY . /var/www/html
WORKDIR /var/www/html
VOLUME /var/www/html/vendor
RUN chown -R www-data:www-data /var/www/html
CMD ["apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80