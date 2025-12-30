# A text column that provide a link to the view or edit page of column relation (the relation should have a filament resource with view or edit page)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ht3aa/link-to-relation-text-column.svg?style=flat-square)](https://packagist.org/packages/ht3aa/link-to-relation-text-column)
[![Total Downloads](https://img.shields.io/packagist/dt/ht3aa/link-to-relation-text-column.svg?style=flat-square)](https://packagist.org/packages/ht3aa/link-to-relation-text-column)

![LinkToRelationTextColumn Example](image.png)

## Installation

You can install the package via composer (for now only support filament v3):

```bash
composer require ht3aa/link-to-relation-text-column
```


## Usage

The `LinkToRelationTextColumn` class extends Filament's `TextColumn` and automatically creates clickable links to the view or edit page of related models in your Filament tables.

### Basic Usage

Import the class in your Filament resource:

```php
use Ht3aa\LinkToRelationTextColumn\LinkToRelationTextColumn;
```

Then use it in your table definition. The column will automatically detect the related model and find its corresponding Filament resource:

```php
use Ht3aa\LinkToRelationTextColumn\LinkToRelationTextColumn;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            LinkToRelationTextColumn::make('user.name')
                ->label('User'),
            // ... other columns
        ]);
}
```

The column will:
- Automatically detect the related model (e.g., `User` from the `user` relation)
- Find the corresponding Filament resource for that model
- Create a link to the view page (if available) or edit page (if view is not available)
- Display an icon (arrow-top-right-on-square) when a link is available

### Specifying a Resource Manually

If you need to explicitly specify which Filament resource to use, you can use the `relationResource()` method:

```php
use Ht3aa\LinkToRelationTextColumn\LinkToRelationTextColumn;
use App\Filament\Resources\UserResource;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            LinkToRelationTextColumn::make('user.name')
                ->label('User')
                ->relationResource(UserResource::class),
            // ... other columns
        ]);
}
```

### Example: Complete Table Definition

```php
use Filament\Tables\Table;
use Ht3aa\LinkToRelationTextColumn\LinkToRelationTextColumn;

public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('id'),
            LinkToRelationTextColumn::make('author.name')
                ->label('Author')
                ->searchable(),
            LinkToRelationTextColumn::make('category.name')
                ->label('Category')
                ->relationResource(CategoryResource::class),
            // ... other columns
        ]);
}
```

## Credits

- [Hasan Tahseen](https://github.com/ht3aa)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
