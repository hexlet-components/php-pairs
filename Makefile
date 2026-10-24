install:
	composer install

test:
	composer exec phpunit -- tests

lint:
	mago lint
	mago fmt --check

lint-fix:
	mago lint --fix --format-after-fix
