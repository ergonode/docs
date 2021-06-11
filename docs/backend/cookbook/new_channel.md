# How to create a new channel

Channel 
* Entity Class to management
* external service connector (if required)
* specific configuration of a specific target system

In your channel [module].
## Domain 
New channel should extend Abstract Class `Ergonode\Channel\Domain\Entity\AbstractChannel` in  `src\Domain` folder.

```php
use Ergonode\Channel\Domain\Entity\AbstractChannel;

/**
 */
class YourChannel extends AbstractChannel
{
    public function getType(): string
    {
        return 'your-type';        
    }
}
``` 

Next Create [command] to management. 
```php
use Ergonode\EventSourcing\Infrastructure\DomainCommandInterface;

/**
*/
class CreateYourChannelCommand implements DomainCommandInterface
{
    private ChannelId $id;

    private string $name;

    public function __construct(ChannelId $id, string $name) 
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): ChannelId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
``` 

And the builder to it. Which should implements `Ergonode\Channel\Application\Provider\CreateChannelCommandBuilderInterface` 
```php
use Ergonode\Channel\Application\Provider\CreateChannelCommandBuilderInterface;

/**
 */
class YourCreateChannelCommandBuilder implements CreateChannelCommandBuilderInterface
{
    public function supported(string $type): bool
    {
        return 'your-type' === $type;
    }

    public function build(FormInterface $form): DomainCommandInterface
    {
        $data = $form->getData();

        $name = $data->name;

        return new CreateYourChannelCommand(ChannelId::generate(), $name);
    }
}
```
Similarly update builder which should implements `Ergonode\Channel\Application\Provider\UpdateChannelCommandBuilderInterface` 
```php
use Ergonode\Channel\Application\Provider\UpdateChannelCommandBuilderInterface;

/**
 */
class Shopware6UpdateChannelCommandBuilder implements UpdateChannelCommandBuilderInterface
{
    public function supported(string $type): bool
    {
        return 'your-type' === $type;
    }

    public function build(ChannelId $id, FormInterface $form): DomainCommandInterface
    {
        return new UpdateYourChannelCommand();
    }
}
```
## Application
A form is required to complete the channel data. To create it you need a factory, class that implements `Ergonode\Channel\Application\Provider\ChannelFormFactoryInterface` 
```php
use Ergonode\Channel\Application\Provider\ChannelFormFactoryInterface;

/**
 */
class YourChannelFormFactory implements ChannelFormFactoryInterface
{
    public function supported(string $type): bool
    {
        return 'your-type' === $type;
    }

    public function create(AbstractChannel $channel = null): FormInterface
    {
        $model = new YourChannelFormModel($channel);
        return $this->formFactory->create(YourChannelForm::class, $model);
    }
}
```
As you can see in the example, you should write model and form.
```php
use Symfony\Component\Validator\Constraints as Assert;

/**
 */
class YourChannelFormModel
{
    /**
     * @var string|null
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=2)
     */
    public ?string $name = null;

    public function __construct(YourChannel $channel = null)
    {
        if ($channel) {
            $this->name = $channel->getName();
        }
    }

}
```

````php
use Symfony\Component\Form\AbstractType;

/**
 */
class Shopware6ChannelForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Name',
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'translation_domain' => 'exporter',
                'data_class' => YourChannelFormModel::class,
                'allow_extra_fields' => true,
                'label' => 'Export settings',
            ]
        );
    }
}
````
Now we have new Channel. 

Next step is configure export process.

## Infrastructure
Start export command should handle `Ergonode\Exporter\Domain\Command\Export\ProcessExportCommand`
```php
use Ergonode\Exporter\Domain\Command\Export\ProcessExportCommand;

/**
 */
class ProcessExportCommandHandler
{
    public function __invoke(ProcessExportCommand $command)
    {
        //place for your export code
    }
}
```

## Export

It is an entity that reflects one export process. One channel can have many exports.

Export lives under `Ergonode\Channel\Domain\Entity` namespace.

It stores the following data:

* when process was started and finished,
* what is the status of that process,
* which Channel it belongs to,

It has methods for:
* starting export process
* stopping export process
* ending export process

### Export Lines

Export lines are identified by ExportLineId (`Ergonode\Channel\Domain\ValueObject\ExportLineId`)

### Export Repository

This is class implements `Ergonode\Channel\Domain\Repository\ExportRepositoryInterface`

It can be used for 
* loading export - `load(ExportId $id)`
* saving export - `save(Export $export)`
* checking if export exists - `exists(ExportId $id)`
* deleting export - `delete(Export $export)`
* marking line as processed - `processLine(ExportLineId $exportLineId)`
* adding Error to the line - `addError(ExportId $exportId, string $message, array $parameters = [])`
* adding line to export - `addLine(ExportLineId $lineId, ExportId $exportId, AggregateId $objectId)`

### Export Exceptions

If any error occurs during the export process, we may want to inform a user by presenting the relevant content in the export error list.

For that special exception type is created - `\Ergonode\Channel\Infrastructure\Exception\ExportException`

It is recommended to extend it while creating your own custom exceptions in export.


[module]: <backend/cookbook/new_module.md>
[command]: <backend/cookbook/new_command.md>
