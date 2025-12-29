# A text column that provide a link to the view or edit page of column relation (the relation should have a filament resource with view or edit page)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ht3aa/link-to-relation-text-column.svg?style=flat-square)](https://packagist.org/packages/ht3aa/link-to-relation-text-column)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ht3aa/link-to-relation-text-column/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ht3aa/link-to-relation-text-column/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ht3aa/link-to-relation-text-column/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ht3aa/link-to-relation-text-column/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ht3aa/link-to-relation-text-column.svg?style=flat-square)](https://packagist.org/packages/ht3aa/link-to-relation-text-column)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require ht3aa/link-to-relation-text-column
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="link-to-relation-text-column-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="link-to-relation-text-column-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="link-to-relation-text-column-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$linkToRelationTextColumn = new Ht3aa\LinkToRelationTextColumn();
echo $linkToRelationTextColumn->echoPhrase('Hello, Ht3aa!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Hasan Tahseen](https://github.com/ht3aa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
