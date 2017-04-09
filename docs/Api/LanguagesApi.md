# Localizer\Client\LanguagesApi

All URIs are relative to *https://localizer.io/api/1.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getLanguages**](LanguagesApi.md#getLanguages) | **GET** /languages | Languages list


# **getLanguages**
> \Localizer\Client\Model\Language[] getLanguages()

Languages list

List of languages

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure API key authorization: api_key
Localizer\Client\Configuration::getDefaultConfiguration()->setApiKey('sig', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Localizer\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('sig', 'Bearer');

$api_instance = new Localizer\Client\Api\LanguagesApi(new \Http\Adapter\Guzzle6\Client());

try {
    $result = $api_instance->getLanguages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LanguagesApi->getLanguages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Localizer\Client\Model\Language[]**](../Model/Language.md)

### Authorization

[api_key](../../README.md#api_key)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

