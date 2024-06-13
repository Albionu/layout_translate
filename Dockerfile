FROM php:8.3-apache
LABEL authors="BN"
COPY . /var/www/html
WORKDIR /var/www/html
EXPOSE 80
ENTRYPOINT ["top", "-b"]