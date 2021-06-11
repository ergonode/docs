# Channel

-----

This module is responsible for managing exports from ergonode to external systems or files.


## Custom Export error

If an error occurs during the export process, we may want to inform the user by presenting the relevant content in the export error list.

For that we need to create custom error. We're doing that by creating new exception class extended from ```Ergonode\Channel\Infrastructure\Exception\ExportException```

```php
namespace YourNameSpace\Infrastructure\Exception;

class YourCustomException extends ExportException
{
    private const MESSAGE  = 'Your error message with param {param}';

    public function __construct(\Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, $previous);
    }
}
```

In addition to the exporter.yml translation file, we can add a location-based version of our message

Now if you throw this exception in export process, message will be automatically added to export error list

## System commands

This module comes with several built-in commands dedicated to handling exports and interfaces which can be used while writing custom export module 

|Command|
|-|
|Ergonode\Channel\Domain\Command\DeleteChannelCommand|
|Ergonode\Channel\Domain\Command\ExportChannelCommand|
|Ergonode\Channel\Domain\Command\Export\DeleteExportCommand|
|Ergonode\Channel\Domain\Command\Export\ProcessExportCommand|



|Interface|
|-|
|Ergonode\Channel\Domain\Command\ChannelCommandInterface|
|Ergonode\Channel\Domain\Command\CreateChannelCommandInterface|
|Ergonode\Channel\Domain\Command\ExporterCommandInterface|


Commands are associated with a specific [export process](backend/modules/channel/channel_manager.md) by `ExportId` and `ExportLineId` identifier.

Sending any of these commands through the commandBus will automatically send them to a dedicated export transport, from which it will be picked up and handled by the associated consumer

```php
    use Ergonode\SharedKernel\Domain\Bus\CommandBusInterface;
    ...
    $command = new YourCustomCommand($exportLineId, $exportId, $code, $name);
    $this->commandBus->dispatch($command, true);
    ...
```
