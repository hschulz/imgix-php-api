imgix php api
=============

Provides a small object oriented api to generate imgix urls.

[travis]: https://img.shields.io/travis/hschulz/imgix-php-api.svg?style=flat-square
[codecov]: https://img.shields.io/codecov/c/github/hschulz/imgix-php-api.svg?style=flat-square
[php-version]: https://img.shields.io/packagist/php-v/hschulz/imgix-php-api.svg?style=flat-square
[github-issues]: https://img.shields.io/github/issues/hschulz/imgix-php-api.svg?style=flat-square
[contrib-welcome]: https://img.shields.io/badge/contributions-welcome-blue.svg?style=flat-square
[license]: https://img.shields.io/github/license/hschulz/imgix-php-api.svg?style=flat-square
[styleci-badge]: https://styleci.io/repos/185656646/shield

[![Travis][travis]](https://travis-ci.org/hschulz/imgix-php-api) [![Codecov][codecov]](https://codecov.io/gh/hschulz/imgix-php-api) [![Style-CI][styleci-badge]](https://github.styleci.io/repos/185656646) ![PHP version][php-version] [![GitHub issues][github-issues]](https://github.com/hschulz/imgix-php-api/issues) ![Contributions welcome][contrib-welcome] [![license][license]](https://github.com/hschulz/imgix-php-api/blob/master/LICENSE)

## Install

```shell
composer.phar require hschulz/imgix-php-api
```

## Usage

```php
<?php

require_once './vendor/autoload.php';

use \hschulz\imgix\FocalPointCrop;
use \hschulz\imgix\UriBuilder;

$builder = new UriBuilder('https://your-domain.imgix.net');

$focalPoint = new FocalPointCrop();
$focalPoint->setX(0.7);
$focalPoint->setY(0.2);
$focalPoint->setZoom(1.2);

$builder->addQueryPart($focalPoint);

$uri = $builder->getImageUri('/path/to/your/image.jpg');
```

## Testing

```shell
# Either use the phpunit with whatever parameters you prefer
./vendor/bin/phpunit --bootstrap=./vendor/autoload.php --whitelist=./src/ --testdox ./Tests/

# Or run the composer test script which is set to the above parameters
composer.phar test
```

## ToDo

- Implement all API functions
    - [X] Adjustment
    - [X] Automatic
    - [ ] Blending
    - [ ] Border
    - [X] Padding
    - [X] Color Palette
    - [X] Face Detection
    - [ ] Fill
    - [X] Focal Point Crop
    - [X] Format
    - [ ] Mask Image
    - [ ] Noise Reduction
    - [X] PDF
    - [X] Pixel Density
    - [X] Rotation
    - [X] Security
    - [X] Size
    - [X] Stylize
    - [ ] Text
    - [ ] Trim
    - [ ] Typesetting Endpoint
    - [ ] Watermark
- Extend the documentation
    - [ ] Complete code comments
    - [ ] More example code
