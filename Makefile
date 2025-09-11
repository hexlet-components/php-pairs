install:
	composer install

test:
	composer phpunit tests

lint:
	composer exec phpcs

lint-fix:
	composer exec phpcbf
