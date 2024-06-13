FROM php:8.3-apache
COPY . /var/www/html
WORKDIR /var/www/html
RUN rm -rf vendor
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH=$PATH:/usr/local/bin
RUN echo '{"require": {"monolog/monolog": "2.0.*"}}' > composer.json
RUN php /usr/local/bin/composer install --no-cache
RUN composer dump-autoload
EXPOSE 80