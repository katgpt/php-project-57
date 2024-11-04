start:
	php artisan serve --host 0.0.0.0

start-frontend:
	npm run dev
	composer install && npm install

install:
	# composer install && npm install

setup: 
	composer install
	npm install

database:
	touch database/database.sqlite

migrate:
	php artisan migrate

seed:
	php artisan db:seed

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

lint:
	composer exec phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer phpcbf -- --standard=PSR12 app routes tests database

phpstan:
	vendor/bin/phpstan analyse -c phpstan.neon