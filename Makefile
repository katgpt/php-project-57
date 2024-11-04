start:
    php artisan serve --host=0.0.0.0 --port=$PORT

start-frontend:
    npm run dev
    composer install && npm install

setup:
	npm run dev
	composer install && npm install

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

log:
	tail -f storage/logs/laravel.log

test:
	composer exec --verbose phpunit tests

deploy:
	git push heroku

lint:
	composer exec phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer phpcbf -- --standard=PSR12 app routes tests database

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml

install:
	composer install

validate:
	composer validate