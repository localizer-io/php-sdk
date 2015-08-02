## Installation

Use composer:

```
composer install localizer-io/php-sdk
```

## Example

```php
$client = new Localizer_Client(
    array(
        'api_key' => '<YOUR_API_KEY>',
    )
);

var_dump(
    $client->getProjectList()
);
```
Output will be:
```php
array(1) {
  [0]=>
  array(4) {
    ["id"]=>
    int(1)
    ["name"]=>
    string(12) "localizer.io"
    ["counter_sections"]=>
    int(1)
    ["last_activity"]=>
    NULL
  }
}
```

## Commands list
Coming soon...
