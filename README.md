DeviceInfo
==============

Library to extract device information.

Wrapper for `piwik/device-detector`

## Installation

```
composer install
```

## Testing

with PHP 7.1 locally
```
composer run tests
```

or with docker:

```
composer run tests-docker
```

## Usage

```php
$deviceInfoExtractor = new DeviceInfoExtractor(
    new PiwikDeviceDetectorExtractorAdapter(),
    new DeviceInfoFactory()
);

$deviceInfo = $deviceInfoExtractor->extractDeviceInfo('Mozilla/5.0 ...');

$type = $deviceInfo->getType();

```


## Memo

`ExtractorAdapterInterface` split to several stateless methods was done deliberately, to enable usage of more complex extractors, based on different libraries for each field
 