PHPUnit Chart Bundle
=============

[![Latest Stable Version](https://poser.pugx.org/devotion/phpunit-chart-bundle/v/stable)](https://packagist.org/packages/devotion/phpunit-chart-bundle)
[![Build Status](https://api.travis-ci.org/VincentCATILLON/PHPUnitChartBundle.png?branch=master)](http://travis-ci.org/VincentCATILLON/PHPUnitChartBundle)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/ce543957-f9b9-49c5-816e-3227b1d81038/big.png)](https://insight.sensiolabs.com/projects/ce543957-f9b9-49c5-816e-3227b1d81038)
[![License](https://poser.pugx.org/devotion/phpunit-chart-bundle/license)](https://packagist.org/packages/devotion/phpunit-chart-bundle)


Symfony bundle which generates charts from phpunit XML report files.

## Composer

Install via composer

``` js
{
    "require": {
        "devotion/phpunit-chart": "~0.3"
    }
}
```

## Database

In order to persist unit tests coverage evolution (only on changes), update with doctrine

``` js
app/console doctrine:database:create
app/console doctine:schema:update --force
```

## Configuration

In this example above, default values are used:

``` yaml
devotion_php_unit_chart:
    base_path: %kernel.root_dir%/../
    type: pie-basic
    history_size: 10
```

## Usage

__Mandatory URL parameters__:
- file (the report filename, in the base path defined in your configuration)

__Optional URL parameters__:
- title (In plain text, the chart title to display)
- type (The chart type to use):
-- pie-basic
-- areaspline

__Examples__:
``` yaml
<domain.tld>/?file=default.xml
<domain.tld>/?file=default.xml&title=AppBundle coverage
<domain.tld>/?file=default.xml&type=areaspline
```

## License

This project is under [GPL-3.0 License](LICENSE).

## Credits

[jQuery](https://www.jquery.com)

[Highcharts](https://www.highcharts.com)
