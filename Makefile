info: # Show this file
	cat Makefile

# === General ===
up: # Rise all services
	@docker compose up -d
down: # Shutdown all services
	@docker compose down
shell: # Provides a shell of the php-fpm
	@docker compose run php-fpm bash || docker compose exec -it php-fpm bash

# === Testing ===
#
# make up-for-testing	# It will start needed containers for testing
# make tests			# It will run the tests with the testing database
# make test-suit-up		# It will open a phpmyadmin and a firefox with url of the phpmyadmin, so you can see the results
up-for-testing: # Start services needed for testing
	@docker compose up -d mysql-testing
	@docker compose up -d php-fpm
down-testing:
	@docker compose down mysql-testing
	@docker compose down php-fpm
tests:
	@docker compose exec -it mysql-testing mysql -uroot -proot -e "DROP DATABASE IF EXISTS testing_app"
	@docker compose exec -it php-fpm php bin/console doctrine:database:create
	@docker compose exec -it php-fpm php bin/phpunit
test-suit-up:
	@docker compose up -d phpmyadmin-testing
	@docker compose run -d firefox firefox http://10.7.0.8
test-suit-down:
	@docker compose down phpmyadmin-testing
	@docker compose down firefox
unit-tests:
	@docker compose run php-fpm php bin/phpunit tests/Unit
