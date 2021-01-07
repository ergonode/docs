# Importer

-----

This module is responsible for managing imports to ergonode from external systems or files. 


## Custom Import error

If an error occurs during the import process, we may want to inform the user by presenting the relevant content in the import error list.

For that we need to create custom error. We're doing that by creating new exception class extended from ```Ergonode\Importer\Infrastructure\Exception\ImportException```

```php
namespace YourNameSpace\Infrastructure\Exception;

class ImportBindingAttributeNotFoundException extends ImportException
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