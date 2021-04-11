# How to create new import source

## Source class

Any custom source class must extend```AbstractSource```

This class is used to define a new type of Source to appear in the application and can be used to store the necessary configuration data

```php
namespace YourNameSpace\Domain\Entity;

use Ergonode\SharedKernel\Domain\Aggregate\SourceId;
use Ergonode\Importer\Domain\Entity\Source\AbstractSource;

class YourSource extends AbstractSource
{
    public const TYPE = 'your-source-type';

    public function __construct(SourceId $id, string $name) 
    {
       parent::__construct($id, $name);
    }
    
    public function getType(): string
    {
        return self::TYPE;
    }
}
```

## Source class configuration

You need create Form class for configuration Your Source.

Only "name" field is required, other are dependent from you needs.

```php
namespace YourNameSpace\Application\Form;

use YourNameSpace\Application\Model\YourSourceConfigurationModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class YourSourceConfigurationForm extends AbstractType
{
    /**
     * @param array $options
     */
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
        $resolver->setDefaults([
            'translation_domain' => 'importer',
            'data_class' => YourSourceConfigurationModel::class,
            'allow_extra_fields' => true,
            'label' => 'Import settings',
        ]);
    }

    public function getBlockPrefix(): ?string
    {
        return null;
    }
}
```

Configuration Model class

```php
namespace YourNameSpace\Application\Model;

use Symfony\Component\Validator\Constraints as Assert;
use YourNameSpace\Domain\Entity\YourSource;

class YourSourceConfigurationModel
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=2)
     */
    public ?string $name = null;

    public function __construct(YourSource $source = null)
    {
        if ($source) {
            $this->name = $source->getName();
        }
    }
}
```

For providing form need to add ```YourSourceFormFactory``` class.

```php
namespace YourNameSpace\Application\Factory;

use Ergonode\Importer\Domain\Entity\Source\AbstractSource;
use YourNameSpace\Domain\Entity\YourSource;
use Symfony\Component\Form\FormFactoryInterface;
use YourNamespace\Application\Form\YourSourceConfigurationForm;
use Symfony\Component\Form\FormInterface;
use YourNamespace\Application\Model\YourSourceConfigurationModel;
use Ergonode\Importer\Application\Provider\SourceFormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class YourSourceFormFactory implements SourceFormFactoryInterface
{
    private FormFactoryInterface $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function supported(string $type): bool
    {
        return YourSource::TYPE === $type;
    }

    public function create(AbstractSource $source = null): FormInterface
    {
        $model = new YourSourceConfigurationModel($source);
        if (null === $source) {
            return $this->formFactory->create(YourSourceConfigurationForm::class, $model);
        }

        return $this->formFactory->create(
            YourSourceConfigurationForm::class,
            $model,
            ['method' => Request::METHOD_PUT]
        );
    }
}
```

Next step is to create Source Manipulation Commands and Handlers

```php
namespace YourNameSpace\Domain\Command;

use Ergonode\Importer\Domain\Command\CreateSourceCommandInterface;
use Ergonode\SharedKernel\Domain\Aggregate\SourceId;
use JMS\Serializer\Annotation as JMS;

class CreateYourSourceCommand implements CreateSourceCommandInterface
{
    /**
     * @JMS\Type("Ergonode\SharedKernel\Domain\Aggregate\SourceId")
     */
    private SourceId $id;

    /**
     * @JMS\Type("string")
     */
    private string $name;

    public function __construct(
        SourceId $id,
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): SourceId
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

```

```php
namespace YourNameSpace\Infrastructure\Handler;

use Ergonode\Importer\Domain\Repository\SourceRepositoryInterface;
use YourNameSpace\Domain\Command\CreateYourSourceCommand;
use YourNameSpace\Domain\Entity\YourSource;

class YourSourceSourceCommandHandler
{
    private SourceRepositoryInterface $repository;

    public function __construct(SourceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CreateYourSourceCommand $command): void
    {
        $source = new YourSource(
            $command->getId(),
            $command->getName()
        );

        $this->repository->save($source);
    }
}

```

At last add you source import processor.

```php
namespace YourNameSpace\Infrastructure\Processor;

use Ergonode\Importer\Domain\Entity\Import;
use Ergonode\Importer\Infrastructure\Processor\SourceImportProcessorInterface;
use YourNameSpace\Domain\Entity\YourSource;

class YourSourceImportProcess implements SourceImportProcessorInterface
{
    public function supported(string $type): bool
    {
        return $type === YourSource::TYPE;
    }

    public function start(Import $import): void
    {
        // here is body of your import process 
    }
}
```

As part of the import process, you can use one of the [dedicated commands](backend/modules/importer.md) to import specific types of data