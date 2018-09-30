install:
	composer install

autoload:
	composer dump-autoload

test:
	composer exec phpunit tests

lint:
	composer exec 'phpcs --standard=PSR2 src tests'
