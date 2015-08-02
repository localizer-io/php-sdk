## Installation

Use composer:

```
composer require localizer-io/php-sdk
```

## Example

```php
$client = new Localizer_Client(
    array(
        'api_key' => '<YOUR_API_KEY>',
    )
);

var_export(
    $client->getProjectList()
);
```
Output will be:
```php
array (
  0 => 
  array (
    'id'                => 1,
    'name'              => 'localizer.io',
    'counter_sections'  => 1,
    'last_activity'     => NULL,
  ),
)
```

## Commands list
```php
$client->getProjectList($offset = 0, $count = 25);
```
