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

## Available formats: code
* Localizer: localizer

## Commands list
```php
// Projects list
$client->getProjectList($offset = 0, $count = 25);

// Section list
$client->getProjectSectionList($project_id, $offset = 0, $count = 25);

// Create section with data
$client->postProjectSectionCreateByData(
    $project_id,
    $content,       // raw json or fopen('file_path', 'r')
    $format,        // Available codes see below
    $name = null
);

// Update section by data
$client->postProjectSectionUpdateByData(
    $section_id,
    $content,       // raw json or fopen('file_path', 'r')
    $format,        // Available codes see below
    $name = null
);
```
