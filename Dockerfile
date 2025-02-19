FROM php:8.4-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN apt-get update && apt-get install -y git
RUN php composer.phar install
RUN chown -R www-data:www-data /var/www/html
CMD ["apache2ctl", "-D", "FOREGROUND"]
EXPOSE 80
EXPOSE 443
EXPOSE 88
EXPOSE 8443