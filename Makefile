install: ; composer install -o

phpunit: ; ./vendor/bin/phpunit

phpstan: ; ./vendor/bin/phpstan analyse --level 8 src
