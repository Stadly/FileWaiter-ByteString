# FileWaiter-ByteString

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Byte string file adapter for [FileWaiter](https://github.com/Stadly/FileWaiter).

## Install

Via Composer

``` bash
$ composer require stadly/file-waiter-bytestring
```

## Usage

``` php
use Stadly\FileWaiter\Adapter\ByteString;
use Stadly\FileWaiter\File;
use Stadly\FileWaiter\Waiter;

$content = 'FILE CONTENT STORED AS STRING';

$streamFactory = new \GuzzleHttp\Psr7\HttpFactory();        // Any PSR-17 compatible stream factory.
$file = new File(new ByteString($content, $streamFactory));

$responseFactory = new \GuzzleHttp\Psr7\HttpFactory();      // Any PSR-17 compatible response factory.
$waiter = new Waiter($file, $responseFactory);

// Serve the byte string using FileWaiter.
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email magnar@myrtveit.com instead of using the issue tracker.

## Credits

- [Magnar Ovedal Myrtveit][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [LICENSE](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/stadly/file-waiter-bytestring.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Stadly/FileWaiter-ByteString/main.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Stadly/FileWaiter-ByteString.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Stadly/FileWaiter-ByteString.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/stadly/file-waiter-bytestring.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/stadly/file-waiter-bytestring
[link-travis]: https://app.travis-ci.com/github/Stadly/FileWaiter-ByteString
[link-scrutinizer]: https://scrutinizer-ci.com/g/Stadly/FileWaiter-ByteString/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Stadly/FileWaiter-ByteString
[link-downloads]: https://packagist.org/packages/stadly/file-waiter-bytestring
[link-author]: https://github.com/Stadly
[link-contributors]: https://github.com/Stadly/FileWaiter-ByteString/contributors
