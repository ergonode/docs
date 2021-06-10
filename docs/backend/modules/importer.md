# Importer

-----

This module is responsible for managing imports to ergonode from external systems or files. 


## Custom Import error

If an error occurs during the import process, we may want to inform the user by presenting the relevant content in the import error list.

For that we need to create custom error. We're doing that by creating new exception class extended from ```Ergonode\Importer\Infrastructure\Exception\ImportException```

```php
namespace YourNameSpace\Infrastructure\Exception;

class YourCustomException extends ImportException
{
    private const MESSAGE  = 'Your error message with param {param}';

    public function __construct(string $param, \Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, ['{param}' => $param], $previous);
    }
}
```

In addition to the importer.yml translation file, we can add a location-based version of our message

Now if you throw this exception in import process, message will be automatically added to import error list

## System commands

This module comes with several built-in commands dedicated to handling imports.

|Command|
|-|
|Ergonode\Importer\Domain\Command\Import\ImportSimpleProductCommand|
|Ergonode\Importer\Domain\Command\Import\ImportVariableProductCommand|
|Ergonode\Importer\Domain\Command\Import\ImportGroupingProductCommand|
|Ergonode\Importer\Domain\Command\Import\ImportCategoryCommand|
|Ergonode\Importer\Domain\Command\Import\ImportOptionCommand|
|Ergonode\Importer\Domain\Command\Import\ImportDateAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportFileAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportGalleryAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportImageAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportMultiSelectAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportNumericAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportPriceAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportSelectAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportTextareaAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportTextAttributeCommand|
|Ergonode\Importer\Domain\Command\Import\ImportUnitAttributeCommand|

Each command is associated with a specific [import process](backend/modules/importer/import_manager.md) by `ImportId` and `ImportLineId` identifier.

Sending any of these commands through the commandBus will automatically send them to a dedicated import transport, from which it will be picked up and handled by the associated consumer

```php
    use Ergonode\SharedKernel\Domain\Bus\CommandBusInterface;
    use Ergonode\Importer\Domain\Command\Import\ImportCategoryCommand;
    ...
    $command = new ImportCategoryCommand($importLineId, $importId, $code, $name);
    $this->commandBus->dispatch($command, true);
    ...
```
