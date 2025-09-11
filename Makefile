install:
	composer install

test:
	composer exec phpunit -- tests

lint:
	composer exec phpcs

lint-fix:
	composer exec phpcbf
