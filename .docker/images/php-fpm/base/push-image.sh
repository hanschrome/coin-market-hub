#!/bin/bash

docker login
docker build -t hanschrome/cmp-php-fpm-base:latest .
docker push hanschrome/cmp-php-fpm-base:latest
