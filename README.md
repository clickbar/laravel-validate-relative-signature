# Verify signed URLs with a relative URL

[![Latest Version on Packagist](https://img.shields.io/packagist/v/clickbar/laravel-validate-relative-signature.svg?style=flat-square)](https://packagist.org/packages/clickbar/laravel-validate-relative-signature)
[![Build Status](https://img.shields.io/travis/clickbar/laravel-validate-relative-signature/master.svg?style=flat-square)](https://travis-ci.org/clickbar/laravel-validate-relative-signature)
[![Quality Score](https://img.shields.io/scrutinizer/g/clickbar/laravel-validate-relative-signature.svg?style=flat-square)](https://scrutinizer-ci.com/g/clickbar/laravel-validate-relative-signature)
[![Total Downloads](https://img.shields.io/packagist/dt/clickbar/laravel-validate-relative-signature.svg?style=flat-square)](https://packagist.org/packages/clickbar/laravel-validate-relative-signature)

In Laravel you can use the [signed middleware URL](https://laravel.com/docs/5.8/urls#signed-urls) to sign URLs for activation links etc.. There's also a undocumented relative parameter which makes it possible to sign **relative** URLs.

This is useful if you are using Laravel just as an API and host it somewhere else than your frontend. You can still use your pretty frontend URLs instead of those of the API.

e.g.: instead of signing `https://example.com/activate-email` you sign `/activate-email`.

## Installation

You can install the package via composer:

```bash
composer require clickbar/laravel-validate-relative-signature
```

## Usage

After installing the package is auto-discovered and you now have a `signed.relative` middleware to verify signed URLs with a relative URL.

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email avs@clickbar.rocks instead of using the issue tracker.

## Credits

- [Adrian Hawlitschek](https://github.com/ahawlitschek)
- [Alexander von Studnitz](https://github.com/studnitz)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
