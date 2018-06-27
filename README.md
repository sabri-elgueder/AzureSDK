Microsoft Azure SDK for PHP
===========================

Version 1.0

Adaptation for Composer and PSR-4 of:

This project provides a set of PHP client libraries that make it easy to access Windows Azure tables, blobs, queues, service runtime and service management APIs.

http://www.satoripop.com


Install
-------

 composer.phar
```json
"require": {
    "satoripophq/AzureSDK": "1.0"
    }
```

Usage
-----

```php
use SatoripopAzure\AzureBlob as _AzureBlob;

...
$config['azureStorageName'] = "xxxxxx";
$config['azureAccountKey']  = "xxxxxx";
$config['uploadContainer']  = "mycontainer";

$uploadAzure = new _AzureBlob($config);
$result = $uploadAzure->createBlob($file,$blob_name);
echo $result;
$uploadAzure->downloadBlob($blob_name);
...

```
