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

## Installation

```shell
composer.phar require hschulz/imgix-php-api
```

## Usage

```php
<?php

require_once './vendor/autoload.php';

use \hschulz\imgix\FocalPointCrop;
use \hschulz\imgix\UriBuilder;

/* Create a new builder with your own imgix domain */
$builder = new UriBuilder('https://your-domain.imgix.net');

/* Create and configure features */
$focalPoint = new FocalPointCrop();
$focalPoint->setX(0.7);
$focalPoint->setY(0.2);
$focalPoint->setZoom(1.2);

/* Apply features to the query builder */
$builder->addQueryPart($focalPoint);

/* Create the uri to the requested image path */
$uri = $builder->getImageUri('/path/to/your/image.jpg');

echo $uri
$ https://your-domain.imgix.net/path/to/your/image.jpg?fp-x=0.7&fp-y=0.2&fp-z=1.2 
```

## Running the tests

```shell
# Either use the phpunit with whatever parameters you prefer
./vendor/bin/phpunit --bootstrap=./vendor/autoload.php --whitelist=./src/ --testdox ./Tests/

# Or run the composer test script which is set to the above parameters
composer.phar test

## Contributing

Please read [CONTRIBUTING.md](https://github.com/hschulz/imgix-php-api/blob/master/CONTRIBUTING.md) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/hschulz/imgix-php-api/tags). 

## Authors

* **Hauke Schulz** - *Author* - [hschulz](https://github.com/hschulz)

See also the list of [contributors](https://github.com/hschulz/imgix-php-api/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE](https://github.com/hschulz/imgix-php-api/blob/master/LICENSE) file for details
```
