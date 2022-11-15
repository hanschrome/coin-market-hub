info:
	cat Makefile
up:
	docker compose up -d
up-for-testing:
	docker compose up -d mysql-testing
	docker compose up -d php-fpm
down:
	docker compose down
down-testing:
	docker compose down mysql-testing
	docker compose down php-fpm
shell:
	docker compose run php-fpm bash
tests:
	docker compose exec -it mysql-testing mysql -uroot -proot -e "DROP DATABASE IF EXISTS testing_app"
	docker compose exec -it php-fpm php bin/console doctrine:database:create
	docker compose exec -it php-fpm php bin/phpunit
unit-tests:
	docker compose run php-fpm php bin/phpunit tests/Unit