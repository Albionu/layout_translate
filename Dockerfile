FROM php:8.3-apache
ENTRYPOINT ["/entrypoint.sh"]
CMD ["sh", "/home/script.sh"]
COPY . /var/www/html
WORKDIR /var/www/html