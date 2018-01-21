# Laravel Castable

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Laravel package that adds custom casts for models attributes.

## Install

Via Composer

``` bash
$ composer require gregoriohc/laravel-castable
```

In Laravel 5.5 the package will autoregister the service provider. In Laravel 5.4 and before you must install this service provider.

``` php
// config/app.php
'providers' => [
    ...
    Gregoriohc\Castable\ServiceProvider::class,
    ...
];
```

## Usage

### With Castable base model

The fastest way is using `\Gregoriohc\Castable\CustomCastableModel` as your base model.

### Without Castable base model

Add `HasCustomCasts` trait to your the model you want to add custom attribute casting (if you want to use it in all your models, I suggest adding it to your own base model).

Override `castAttribute` model method:
 
``` php
protected function castAttribute($key, $value)
{
    return $this->customCastAttribute($key, parent::castAttribute($key, $value));
}
```

Override `setAttribute` model method:
 
``` php
public function setAttribute($key, $value)
{
    return parent::setAttribute($key, $value)->customSetAttribute($key, $value);
}
```

Override `toArray` model method:
 
``` php
public function toArray()
{
    return $this->customToArray(parent::toArray());
}
```

Add custom casted attributes to the model casts array:
 
``` php
protected $casts = [
    'location' => 'point',
    'bounding_box' => 'multipoint',
];
```

A full model example would look like this:

``` php
namespace App\Models;

use Gregoriohc\Castable\HasCustomCasts;

class Place extends \Illuminate\Database\Eloquent\Model
{
    use HasCustomCasts;
    
    protected $casts = [
        'location' => 'point',
        'bounding_box' => 'multipoint',
    ];

    protected function castAttribute($key, $value)
    {
        return $this->customCastAttribute($key, parent::castAttribute($key, $value));
    }

    public function setAttribute($key, $value)
    {
        return parent::setAttribute($key, $value)->customSetAttribute($key, $value);
    }
    
    public function toArray()
    {
        return $this->customToArray(parent::toArray());
    }
}
```

### Attribute migration, setting and getting

Depending on the custom caster, the attribute will accept and return different values when setting/getting. Also, the required database migration type will differ. For the included casters, you can see the doc in the caster class file.

For example, for the point caster requires a `Point` database migration type, and to set its value you can do the following:

``` php
$place->location = [12.345, 67.890];
```

### Configuration

You can optionally publish the config file with:

``` bash
$ php artisan vendor:publish --provider="Gregoriohc\Castable\ServiceProvider" --tag="config"
```

### Creating a custom caster

You can create a custom caster extending the `\Gregoriohc\Castable\Casters\Caster` class and implementing `as` and `from` methods. For example:

``` php
namespace \App\Casters;

class SerializableObject extends \Gregoriohc\Castable\Casters\Caster
{
    public function as($value)
    {
        return unserialize($value);
    }

    public function from($value)
    {
        return serialize($value);
    }
}
```

The `as` method must transform the raw attribute value (from the database or internal) to the usable model attribute, and the `from` method must do the opposite thing.

After that, add the custom caster to the config file:

``` php
// config/castable.php
'casters' => [
    ...
    'serializable' => \App\Casters\SerializableObject::class,
    ...
];
```

## Testing

``` bash
$ composer test
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

### Security

If you discover any security related issues, please email gregoriohc@gmail.com instead of using the issue tracker.

## Socialware

You're free to use this package, but if it makes it to your production environment I highly appreciate you sharing it on any social network.

## Credits

- [Gregorio Hernández Caso][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/gregoriohc/laravel-castable.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/gregoriohc/laravel-castable/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/gregoriohc/laravel-castable.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/gregoriohc/laravel-castable.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/gregoriohc/laravel-castable.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/gregoriohc/laravel-castable
[link-travis]: https://travis-ci.org/gregoriohc/laravel-castable
[link-scrutinizer]: https://scrutinizer-ci.com/g/gregoriohc/laravel-castable/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/gregoriohc/laravel-castable
[link-downloads]: https://packagist.org/packages/gregoriohc/laravel-castable
[link-author]: https://github.com/gregoriohc
[link-contributors]: ../../contributors
