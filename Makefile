info:
	cat Makefile
up:
	docker compose up -d
down:
	docker compose down
shell:
	docker compose run php-fpm bash
tests:
	docker compose run php-fpm php bin/phpunit
unit-tests:
	docker compose run php-fpm php bin/phpunit tests/Unit