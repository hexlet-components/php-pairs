install:
	composer install

test:
	composer phpunit tests

lint:
	composer phpcs src tests
