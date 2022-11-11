#!/bin/bash

docker compose run php-fpm bash -c "cd /tmp/infra && php composer.phar create-project symfony/skeleton:\"6.1.*\" src"
docker compose run php-fpm bash -c "cd /tmp/infra/src && php ../composer.phar require --dev symfony/test-pack"
