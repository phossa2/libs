# phossa2/libs
[![Build Status](https://travis-ci.org/phossa2/libs.svg?branch=master)](https://travis-ci.org/phossa2/libs)
[![Code Quality](https://scrutinizer-ci.com/g/phossa2/libs/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/phossa2/libs/)
[![Code Climate](https://codeclimate.com/github/phossa2/libs/badges/gpa.svg)](https://codeclimate.com/github/phossa2/libs)
[![PHP 7 ready](http://php7ready.timesplinter.ch/phossa2/libs/master/badge.svg)](https://travis-ci.org/phossa2/libs)
[![HHVM](https://img.shields.io/hhvm/phossa2/libs.svg?style=flat)](http://hhvm.h4cc.de/package/phossa2/libs)
[![Latest Stable Version](https://img.shields.io/packagist/vpre/phossa2/libs.svg?style=flat)](https://packagist.org/packages/phossa2/libs)
[![License](https://img.shields.io/:license-mit-blue.svg)](http://mit-license.org/)

**phossa2/libs** is the bundle of phossa2 libraries for the framework.

It requires PHP 5.4, supports PHP 7.0+ and HHVM. It is compliant with [PSR-1][PSR-1],
[PSR-2][PSR-2], [PSR-3][PSR-3], [PSR-4][PSR-4], and the proposed [PSR-5][PSR-5].

[PSR-1]: http://www.php-fig.org/psr/psr-1/ "PSR-1: Basic Coding Standard"
[PSR-2]: http://www.php-fig.org/psr/psr-2/ "PSR-2: Coding Style Guide"
[PSR-3]: http://www.php-fig.org/psr/psr-3/ "PSR-3: Logger Interface"
[PSR-4]: http://www.php-fig.org/psr/psr-4/ "PSR-4: Autoloader"
[PSR-5]: https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc.md "PSR-5: PHPDoc"

Installation
---
Install via the `composer` utility.

```bash
composer require "phossa2/libs"
```

or add the following lines to your `composer.json`

```json
{
    "require": {
       "phossa2/libs": "2.*"
    }
}
```

Change log
---

Please see [CHANGELOG](CHANGELOG.md) from more information.

Testing
---

```bash
$ composer test
```

Contributing
---

Please see [CONTRIBUTE](CONTRIBUTE.md) for more information.

Dependencies
---

- PHP >= 5.4.0

- psr/log ~1.0

- psr/cache ~1.0

- wixel/gump >= 1.4,

- zendframework/zend-diactoros ^1.3.0

- container-interop/container-interop ~1.0

License
---

[MIT License](http://mit-license.org/)
