# RAWG Video Games Database PHP client

This is RAWG PHP SDK. This library contains methods for interacting with RAWG API.

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

$cfg = new Config('YourAppName', 'en'); // 'YourAppName' will be set as User-Agent header
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

The tests should be considered a part of the documentation.

## License

RAWG PHP SDK is released under the
[MIT License](http://www.opensource.org/licenses/MIT).