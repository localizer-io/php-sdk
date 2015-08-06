## Installation

Use composer:

```
composer require localizer-io/php-sdk
```

## Example

```php
$client = Localizer_Client::apishka(
    array(
        'key' => '<YOUR_API_KEY>',
    )
);

var_export(
    $client->getProjectList()
);
```
Output will be:
```php
array (
  'projects' => array(
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
$client->postProjectSectionUpsert(
    $project_id,
    $section_code,
    $name
);

// Update section by data
$client->postProjectSectionUpload(
    $project_id,
    $section_code,
    $content,       // raw json or fopen('file_path', 'r')
    $format         // Available codes see above
);

// Get translations by locale
$client->postProjectSectionUpload(
    $project_id,
    $section_code,
    $locale         // Example: en_US, ru_RU
);
```
