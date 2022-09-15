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

To change amount of data of Faker library you can use params `-c` or `-count`
```
bin/dtopc run -c 10
```

To add own DTO library just install it via composer and create new runner class extending AbstractRunner.

![Example of result in Linux terminal](https://tomasklatt.cz/images/DTOPerformanceComparison.png)