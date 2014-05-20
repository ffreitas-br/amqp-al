## How To Run Tests

In the root of the project just execute:

```shell
composer install
cp phpunit.xml.dist phpunit.xml
php vendor/bin/phpunit --configuration phpunit.xml
```