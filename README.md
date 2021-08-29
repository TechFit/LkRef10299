## Installation

- [PHP 7.3 or 7.4 or 8.0+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Clone the repository

Install all the dependencies using composer

```shell script
cd ./LkRef10299
composer install
```

## How to work

1. Create a list of items: `$items = [new Item("some-name", 1, 2)];`
2. Create an instance of GildedRose: `$gildedRose = new GildedRose($items);`
3. Run updateQuality method `$gildedRose->updateQuality();`
4. That's all folks :)

## Testing

PHPUnit is configured for testing, a composer script has been provided. To run the unit tests, from the root of the PHP project run:

```shell script
composer test
```

### Tests with Coverage Report (100% coverage now)

To run all test and generate a html coverage report run:

```shell script
composer test-coverage or XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-text
```

The test-coverage report will be created in /builds, it is best viewed by opening /builds/**index.html** in your browser.

## Code Standard

Easy Coding Standard (ECS) is configured for style and code standards, **PSR-12** is used. The current code is not upto standard!

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

## Static Analysis

PHPStan is used to run static analysis checks:

```shell script
composer phpstan
```
