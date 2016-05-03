PHPUnit Chart Bundle
=============

Symfony bundle which generates charts from phpunit XML report files.

## Composer

Install via composer

``` js
{
    "require": {
        "devotion/phpunit-chart": "~0.1"
    }
}
```

## Configuration

In this example above, default values are used:

``` yaml
devotion_php_unit_chart:
    base_path: %kernel.root_dir%/../
    type: pie-basic
```

## License

This project is under [GPL-3.0 License](LICENSE).
