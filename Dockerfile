FROM php:8.3-apache
ENTRYPOINT ["/entrypoint.sh"]
CMD ["sh", "/home/script.sh"]
COPY . /var/www/html
WORKDIR /var/www/html
RUN rm -rf vendor
RUN curl -sS https://getcomposer.org/installer | php
RUN chmod -R 755 /usr/local/bin
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer --verbose
WORKDIR /var/www/html
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader
COPY . .
RUN chown -R www-data:www-data /var/www/html
ENV PATH=$PATH:/usr/local/bin
RUN composer update --no-cache
RUN composer dump-autoload
EXPOSE 80