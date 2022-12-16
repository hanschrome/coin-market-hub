FROM hanschrome/cmp-php-fpm-base:latest

# Web content
ADD ./src /var/www/html

# Copy composer phar
ADD ./composer.phar /var/www/html

# Install dependencies
RUN cd /var/www/html && php composer.phar install

CMD ["php", "bin/phpunit", "src/tests/Unit"]
