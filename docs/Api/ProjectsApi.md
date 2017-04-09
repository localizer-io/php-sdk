# Localizer\Client\ProjectsApi

All URIs are relative to *https://localizer.io/api/2.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createProject**](ProjectsApi.md#createProject) | **POST** /project | Create project
[**createSection**](ProjectsApi.md#createSection) | **POST** /project/{project_id}/section | Create section
[**deleteProject**](ProjectsApi.md#deleteProject) | **DELETE** /project/{project_id} | Delete project
[**deleteSection**](ProjectsApi.md#deleteSection) | **DELETE** /project/{project_id}/section/{section_code} | Delete section
[**getProject**](ProjectsApi.md#getProject) | **GET** /project/{project_id} | Project info
[**getProjects**](ProjectsApi.md#getProjects) | **GET** /projects | Projects List
[**getSection**](ProjectsApi.md#getSection) | **GET** /project/{project_id}/section/{section_code} | Section info
[**getSectionTranslations**](ProjectsApi.md#getSectionTranslations) | **GET** /project/{project_id}/section/{section_code}/translations/all | Translations for section on all languages
[**getSections**](ProjectsApi.md#getSections) | **GET** /project/{project_id}/sections | Sections list
[**updateProject**](ProjectsApi.md#updateProject) | **PUT** /project/{project_id} | Update project
[**updateSection**](ProjectsApi.md#updateSection) | **PUT** /project/{project_id}/section/{section_code} | Update section
[**uploadSectionTranslations**](ProjectsApi.md#uploadSectionTranslations) | **POST** /project/{project_id}/section/{section_code}/translations | Upload translations to section
[**upsertSection**](ProjectsApi.md#upsertSection) | **POST** /project/{project_id}/section/upsert | Create or edit section


# **createProject**
> \Localizer\Client\Model\Project createProject($body)

Create project

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$body = new \Localizer\Client\Model\ProjectModify(); // \Localizer\Client\Model\ProjectModify | 

try {
    $result = $api_instance->createProject($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->createProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\Localizer\Client\Model\ProjectModify**](../Model/\Localizer\Client\Model\ProjectModify.md)|  |

### Return type

[**\Localizer\Client\Model\Project**](../Model/Project.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSection**
> \Localizer\Client\Model\Section createSection($project_id, $body)

Create section

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$body = new \Localizer\Client\Model\Section(); // \Localizer\Client\Model\Section | 

try {
    $result = $api_instance->createSection($project_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->createSection: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **body** | [**\Localizer\Client\Model\Section**](../Model/\Localizer\Client\Model\Section.md)|  |

### Return type

[**\Localizer\Client\Model\Section**](../Model/Section.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteProject**
> \Localizer\Client\Model\Success deleteProject($project_id)

Delete project

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 

try {
    $result = $api_instance->deleteProject($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->deleteProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |

### Return type

[**\Localizer\Client\Model\Success**](../Model/Success.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSection**
> \Localizer\Client\Model\Success deleteSection($project_id, $section_code)

Delete section

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$section_code = "section_code_example"; // string | 

try {
    $result = $api_instance->deleteSection($project_id, $section_code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->deleteSection: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **section_code** | **string**|  |

### Return type

[**\Localizer\Client\Model\Success**](../Model/Success.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProject**
> \Localizer\Client\Model\Project getProject($project_id)

Project info

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 

try {
    $result = $api_instance->getProject($project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |

### Return type

[**\Localizer\Client\Model\Project**](../Model/Project.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProjects**
> \Localizer\Client\Model\Project[] getProjects($offset, $count)

Projects List

List of projects that you have access

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$offset = 0; // int | Offset in projects list
$count = 25; // int | Count projects in response

try {
    $result = $api_instance->getProjects($offset, $count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjects: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **offset** | **int**| Offset in projects list | [optional] [default to 0]
 **count** | **int**| Count projects in response | [optional] [default to 25]

### Return type

[**\Localizer\Client\Model\Project[]**](../Model/Project.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSection**
> \Localizer\Client\Model\Section getSection($project_id, $section_code)

Section info

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$section_code = "section_code_example"; // string | 

try {
    $result = $api_instance->getSection($project_id, $section_code);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getSection: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **section_code** | **string**|  |

### Return type

[**\Localizer\Client\Model\Section**](../Model/Section.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSectionTranslations**
> \SplFileObject getSectionTranslations($project_id, $section_code, $format)

Translations for section on all languages

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$section_code = "section_code_example"; // string | 
$format = "format_example"; // string | 

try {
    $result = $api_instance->getSectionTranslations($project_id, $section_code, $format);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getSectionTranslations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **section_code** | **string**|  |
 **format** | **string**|  |

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSections**
> \Localizer\Client\Model\Section[] getSections($project_id, $offset, $count)

Sections list

List of sections in project

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$offset = 0; // int | 
$count = 25; // int | 

try {
    $result = $api_instance->getSections($project_id, $offset, $count);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getSections: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **offset** | **int**|  | [optional] [default to 0]
 **count** | **int**|  | [optional] [default to 25]

### Return type

[**\Localizer\Client\Model\Section[]**](../Model/Section.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateProject**
> \Localizer\Client\Model\Project updateProject($project_id, $body)

Update project

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$body = new \Localizer\Client\Model\ProjectModify(); // \Localizer\Client\Model\ProjectModify | 

try {
    $result = $api_instance->updateProject($project_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->updateProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **body** | [**\Localizer\Client\Model\ProjectModify**](../Model/\Localizer\Client\Model\ProjectModify.md)|  |

### Return type

[**\Localizer\Client\Model\Project**](../Model/Project.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateSection**
> \Localizer\Client\Model\Section updateSection($project_id, $section_code, $body)

Update section

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$section_code = "section_code_example"; // string | 
$body = new \Localizer\Client\Model\Section(); // \Localizer\Client\Model\Section | 

try {
    $result = $api_instance->updateSection($project_id, $section_code, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->updateSection: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **section_code** | **string**|  |
 **body** | [**\Localizer\Client\Model\Section**](../Model/\Localizer\Client\Model\Section.md)|  |

### Return type

[**\Localizer\Client\Model\Section**](../Model/Section.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadSectionTranslations**
> \Localizer\Client\Model\Success uploadSectionTranslations($project_id, $section_code, $file, $format)

Upload translations to section

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$section_code = "section_code_example"; // string | 
$file = "/path/to/file.txt"; // \SplFileObject | 
$format = "format_example"; // string | 

try {
    $result = $api_instance->uploadSectionTranslations($project_id, $section_code, $file, $format);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->uploadSectionTranslations: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **section_code** | **string**|  |
 **file** | **\SplFileObject**|  |
 **format** | **string**|  |

### Return type

[**\Localizer\Client\Model\Success**](../Model/Success.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **upsertSection**
> \Localizer\Client\Model\Section upsertSection($project_id, $body)

Create or edit section

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\ProjectsApi(new \Http\Adapter\Guzzle6\Client());
$project_id = 789; // int | 
$body = new \Localizer\Client\Model\Section(); // \Localizer\Client\Model\Section | 

try {
    $result = $api_instance->upsertSection($project_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->upsertSection: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **int**|  |
 **body** | [**\Localizer\Client\Model\Section**](../Model/\Localizer\Client\Model\Section.md)|  |

### Return type

[**\Localizer\Client\Model\Section**](../Model/Section.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

