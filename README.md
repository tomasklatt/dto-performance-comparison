# dto-performance-comparison
Compare performance of associative arrays, [SpatieDTO](https://github.com/spatie/data-transfer-object) and own written DTO.

## Installation
This project uses composer.
```
composer require tomasklatt/dto-performance-comparison
```

## Usage
To test those three ways of passing data in app with default data set just use 
```
bin/dtopc run
```

To change amount of data or seed of Faker library you can use params `-s` or `-seed` and `-c` or `-count`
```
bin/dtopc run -c 10 -s 12345
```

To add own DTO library just install it via composer, create new class extending SpeedTest, add required functions and
add it `runWithParams()` in `DTOPerformanceComparison.php`.

![Example of result in Linux terminal](https://tomasklatt.cz/images/DTOPerformanceComparison.png)