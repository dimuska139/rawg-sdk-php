# RAWG Video Games Database PHP client

[![Build Status](https://travis-ci.org/dimuska139/rawg-sdk-php.svg?branch=master)](https://travis-ci.org/dimuska139/rawg-sdk-php)
[![codecov](https://codecov.io/gh/dimuska139/rawg-sdk-php/branch/master/graph/badge.svg)](https://codecov.io/gh/dimuska139/rawg-sdk-php)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://github.com/dimuska139/go-email-normalizer/blob/master/LICENSE)

This is unofficial RAWG PHP SDK. This library contains methods for interacting with [RAWG API](https://rawg.io/).

## Installation

`composer require dimuska139/rawg-sdk-php`

## Usage

```php
require 'vendor/autoload.php';
use Rawg\ApiClient;
use Rawg\Config;
use Rawg\DateRange;
use Rawg\Filters\GamesFilter;
use Rawg\Filters\PaginationFilter;

$cfg = new Config('api-key', 'en');
$client = new ApiClient($cfg);

$additionsFilter = (new PaginationFilter())->setPage(1)->setPageSize(5);
print_r($client->games()->getAdditions(47, $additionsFilter)->getData());

$gamesFilter = (new GamesFilter())
    ->setPage(1)
    ->setPageSize(20)
    ->setDates([
        DateRange::create(new DateTime( '2012-02-01' ), new DateTime( '2015-06-25' ))
    ])
    ->setOrdering('-name')
    ->setTags([1,2,3]);

print_r($client->games()->getGames($gamesFilter)->getData());
```

The tests should be considered a part of the documentation. Also you can read [official docs](https://rawg.io/apidocs).

## API limitations

Only 5 requests per second allowed from one IP.

## License

RAWG PHP SDK is released under the
[MIT License](http://www.opensource.org/licenses/MIT).