#!/bin/bash

cd ../../../../

docker login
docker build -f .docker/images/php-fpm/test/Dockerfile -t hanschrome/cmp-php-fpm-test:latest .
docker push hanschrome/cmp-php-fpm-test:latest
