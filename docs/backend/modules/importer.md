# Importer

-----

This module is responsible for managing imports to ergonode from external systems or files. 


## Reader

**Reader** is a component responsible for reading files in different formats. 

One Reader class is responsible for one file type.

To use it you need to create a class which implements **FileReaderInterface**.

```php
<?php
namespace Ergonode\Component\Importer\Infrastructure\Reader;

interface FileReaderInterface extends \IteratorAggregate, \Countable
{
    public function open(string $file, array $configuration = [], array $formatters = []): void;
    public function read(): \Traversable;
    public function close(): void;
}

```

Example of **Reader** you can find here:
`Ergonode\Component\Importer\Infrastructure\Reader\CsvFileReader.php`


## Formatter

**Formatters** are objects responsbile for changing every line from input file. 

One **Formatter** class is responsible for one text editing operation. For example it can be used for removing some unwanted characters or changing text encoding.

You you need to create a class which implements **FormatterInterface**.

```php
<?php
namespace Ergonode\Component\Importer\Infrastructure\Formatter;

interface FormatterInterface
{
    public function format(string $string): string;
}
```

