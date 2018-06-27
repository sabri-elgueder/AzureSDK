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
# AzureBlob Class


## createCont

* Creates a new container in the given storage account.
* @param string                     $container name


## createBlob

* Creates a new block blob or updates the content of an existing block blob.
* Updating an existing block blob overwrites any existing metadata on the blob.
* Partial updates are not supported with createBlockBlob; the content of the
* existing blob is overwritten with the content of the new blob. To perform a
* partial update of the content of a block blob, use the createBlockList method.
* @param string                       $container name of the container
* @param string                       $blob      name of the blob
* @param string                       $content   content of the blob


## deleteBlob

* Deletes a blob or blob snapshot.
* Note that if the snapshot entry is specified in the $options then only this
* blob snapshot is deleted. To delete all blob snapshots, do not set Snapshot
* and just set getDeleteSnaphotsOnly to true.
* @param string                       $container name of the container
* @param string                       $blob      name of the blob


## copyBlob

* Copies a source blob to a destination blob within the same storage account.
* @param string                     $destinationContainer name of container
* @param string                     $destinationBlob      name of blob
* @param string                     $sourceContainer      name of container
* @param string                     $sourceBlob           name of blob


## listBlobs

* Lists all of the blobs in the given container.
* @param string                      $container name


## downloadBlob

* Reads or downloads a blob from the system, including its metadata and properties.
* @param string                    $container name of the container
* @param string                    $blob      name of the blob



```