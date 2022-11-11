info:
	cat Makefile
up:
	docker compose up -d
down:
	docker compose down
shell:
	docker compose run php-fpm bash
unit-tests:
	docker compose run php-fpm php bin/phpunit tests/unit/