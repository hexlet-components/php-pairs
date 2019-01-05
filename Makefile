install:
	composer install

test:
	composer exec phpunit tests -v

lint:
	composer exec phpcs -- --standard=PSR12 src tests -v
