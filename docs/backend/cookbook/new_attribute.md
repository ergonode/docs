# How to create new attribute type

In Ergonode there are many predefined attribute types, however new custom attribute type can be easily created, if needed.


## Attribute class

Name of every attribute class needs to end with `Attribute.php`

This file should live in `Your-module\Application\Form\Attribute\` namespace extends one of Abstract Attributes and implements `Ergonode\Attribute\Domain\Entity\AttributeInterface`.

In Ergonode system we have several Abstract Attribute classes (you can find them in `Ergonode\Attribute\Domain\Entity\Attribute` namespace), it depends on what kind of attribute you want to create, you can either use one of already created or create a custom one. 

Keep in mind that Abstract Attribute class should extend `\Ergonode\Attribute\Domain\Entity\AbstractAttribute`.

```php
namespace Ergonode\Attribute\Domain\Entity\Attribute;

/**
 */
class YourAttribute extends AbstractCollectionAttribute implements AttributeInterface
{
    public const TYPE = 'YOUR_ATTRIBUTE';

    /**
     * @JMS\VirtualProperty();
     * @JMS\SerializedName("type")
     *
     * @return string
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
```

## Commands and handlers

You can find more about commands --> [here](backend/cookbook/new_command.md)

Create a command for creation `CreateYourAttributeCommand`.
This file should live in `Your-module\Domain\Command\Attribute\Create` namespace and extends `Ergonode\Attribute\Domain\Command\Attribute\AbstractCreateAttributeCommand`.

```php
namespace Ergonode\Attribute\Domain\Command\Attribute\Create;

/**
 */
class CreateYourAttributeCommand extends AbstractCreateAttributeCommand
{
}
```

Each command needs to have handler, class that handles the logic represented by the command.

Create a handler `CreateYourAttributeCommandHandler`.
This file should live in `Your-module\Infrastructure\Handler\Attribute\Create` namespace.
Remember to tag the handler with `messenger.message_handler`

```php
namespace Ergonode\Attribute\Infrastructure\Handler\Attribute\Create;

/**
 */
class CreateYourAttributeCommandHandler
{
    /**
     * @var AttributeRepositoryInterface
     */
    private AttributeRepositoryInterface $attributeRepository;

    /**
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @param CreateYourAttributeCommand $command
     *
     * @throws \Exception
     */
    public function __invoke(CreateYourAttributeCommand $command): void
    {
        $attribute = new YourAttribute(
            $command->getId(),
            $command->getCode(),
            $command->getLabel(),
            $command->getHint(),
            $command->getPlaceholder(),
            $command->getScope()
        );

        foreach ($command->getGroups() as $group) {
            $attribute->addGroup($group);
        }

        $this->attributeRepository->save($attribute);
    }
}
```

Create a command for update `UpdateYourAttributeCommand`.This file should live in `Your-module\Domain\Command\Attribute\Update` namespace and extends `Ergonode\Attribute\Domain\Command\Attribute\AbstractUpdateAttributeCommand`.

```php
namespace Ergonode\Attribute\Domain\Command\Attribute\Update;

/**
 */
class UpdateYourAttributeCommand extends AbstractUpdateAttributeCommand
{
}
```

Create a handler `UpdateYourAttributeCommandHandler`.This file should live in `Your-module\Infrastructure\Handler\Attribute\Upadate` namespace.
Remember to tag the handler with `messenger.message_handler`

```php
namespace Ergonode\Attribute\Infrastructure\Handler\Attribute\Update;

/**
 */
class UpdateYourAttributeCommandHandler extends AbstractUpdateAttributeCommandHandler
{
    /**
     * @var AttributeRepositoryInterface
     */
    private AttributeRepositoryInterface $attributeRepository;

    /**
     * @param AttributeRepositoryInterface $attributeRepository
     */
    public function __construct(AttributeRepositoryInterface $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /**
     * @param UpdateYourAttributeCommand $command
     *
     * @throws \Exception
     */
    public function __invoke(UpdateYourAttributeCommand $command): void
    {
        $attribute = $this->attributeRepository->load($command->getId());

        Assert::isInstanceOf($attribute, YourAttribute::class);
        $attribute = $this->update($command, $attribute);

        $this->attributeRepository->save($attribute);
    }
}
```

## Command factories

Create a handler for creation command `CreateYourAttributeCommandFactory`.This file should live in `Your-module\Infrastructure\Factory\Command\Create` namespace and implements `Ergonode\Attribute\Infrastructure\Factory\Command\CreateAttributeCommandFactoryInterface`
If autoconfiguration is not used remember to tag your service with `component.attribute.create_attribute_command_factory_interface` 

```php
namespace Ergonode\Attribute\Infrastructure\Factory\Command\Create;

/**
 */
class CreateYourAttributeCommandFactory implements CreateAttributeCommandFactoryInterface
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function support(string $type): bool
    {
        return $type === YourAttribute::TYPE;
    }

    /**
     * @param FormInterface $form
     *
     * @return DomainCommandInterface
     *
     * @throws \Exception
     */
    public function create(FormInterface $form): DomainCommandInterface
    {
        /** @var AttributeFormModel $data */
        $data = $form->getData();

        return new CreateYourAttributeCommand(
            new AttributeCode($data->code),
            new TranslatableString($data->label),
            new TranslatableString($data->hint),
            new TranslatableString($data->placeholder),
            new AttributeScope($data->scope),
            $data->groups,
        );
    }
}
```

Create a handler for updating command `UpdateYourAttributeCommandFactory`.This file should live in `Your-module\Infrastructure\Factory\Command\Update` namespace and implements `Ergonode\Attribute\Infrastructure\Factory\Command\UpdateAttributeCommandFactoryInterface`
If autoconfiguration is not used remember to tag your service with `component.attribute.update_attribute_command_factory_interface`

```php
namespace Ergonode\Attribute\Infrastructure\Factory\Command\Update;

/**
 */
class UpdateYourAttributeCommandFactory implements UpdateAttributeCommandFactoryInterface
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function support(string $type): bool
    {
        return $type === YourAttribute::TYPE;
    }

    /**
     * @param AttributeId   $id
     * @param FormInterface $form \
     *
     * @return DomainCommandInterface
     *
     */
    public function create(AttributeId $id, FormInterface $form): DomainCommandInterface
    {
        /** @var AttributeFormModel $data */
        $data = $form->getData();

        return new UpdateYourAttributeCommand(
            $id,
            new TranslatableString($data->label),
            new TranslatableString($data->hint),
            new TranslatableString($data->placeholder),
            new AttributeScope($data->scope),
            array_map(fn($group) => new AttributeGroupId($group), $data->groups),
        );
    }
}
```

## Value Constrain Strategy

To be able to validate values which are used in our new attribute `YourAttributeValueConstraintStrategy` needs to be created. This file should live in `Your-module\Infrastructure\Provider\Strategy` namespace and implements `Ergonode\Attribute\Infrastructure\Provider\AttributeValueConstraintStrategyInterface`
If autoconfiguration is not used remember to tag your service with `component.attribute.attribute_validation_interface`

```php
namespace Ergonode\Attribute\Infrastructure\Provider\Strategy;

class YourAttributeValueConstraintStrategy implements AttributeValueConstraintStrategyInterface
{
    /**
     * @param AbstractAttribute $attribute
     *
     * @return bool
     */
    public function supports(AbstractAttribute $attribute): bool
    {
        return $attribute instanceof YourAttribute;
    }

    /**
     * @param AbstractAttribute $attribute
     *
     * @return Constraint
     */
    public function get(AbstractAttribute $attribute): Constraint
    {
        return new Collection([
            'value' => [],
        ]);
    }
}

```
## Form

Create form class `YouAttributeForm`

This file should live in `Your-module\Application\Form\Attribute` namespace and extends:
* `Symfony\Component\Form\AbstractType`
* `Ergonode\Attribute\Application\Form\Attribute\AttributeFormInterface`
If autoconfiguration is not used remember to tag your service with `attribute.form.attribute_form_interface`

```php
namespace Ergonode\Attribute\Application\Form\Attribute;

class YourAttributeForm extends AbstractType implements AttributeFormInterface
{
    /**
     * @param string $type
     *
     * @return bool
     */
    public function supported(string $type): bool
    {
        return YourAttribute::TYPE === $type;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'code',
                AttributeCodeType::class
            )
            ->add(
                'label',
                TranslationType::class
            )
            ->add(
                'hint',
                TranslationType::class
            )
            ->add(
                'placeholder',
                TranslationType::class
            )
            ->add(
                'groups',
                AttributeGroupType::class
            )
            ->add(
                'scope',
                TextType::class,
                        );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AttributeFormModel::class,
            'translation_domain' => 'attribute',
            'allow_extra_fields' => true,
        ]);
    }

    /**
     * @return null|string
     */
    public function getBlockPrefix(): ?string
    {
        return null;
    }
}
```

## Grid

If you want be able to use your attribute on a grid you need to create following classes.


Create column class `YourAttributeColumn`

This file should live in `Your-module\Grid\Column` namespace and extends `\Ergonode\Grid\Column\AbstractColumn`

```php
namespace Ergonode\Grid\Column;

/**
 */
class YourColumn extends AbstractColumn
{
    public const TYPE = 'YOUR_ATTRIBUTE';

    /**
     * {@inheritDoc}
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}
```

Create strategy class `YourAttributeColumnStrategy` 

This file should live in `Your-module\Infrastructure\Grid\Column\Provider\Strategy` namespace and implements `Ergonode\Product\Infrastructure\Grid\Column\Provider\Strategy\AttributeColumnStrategyInterface`

```php
namespace Ergonode\Product\Infrastructure\Grid\Column\Provider\Strategy;

/**
 */
class YourAttributeColumnStrategy implements AttributeColumnStrategyInterface
{
    /**
     * {@inheritDoc}
     */
    public function supports(AbstractAttribute $attribute): bool
    {
        return $attribute instanceof YourAttribute;
    }

    /**
     * {@inheritDoc}
     */
    public function create(AbstractAttribute $attribute, Language $language): ColumnInterface
    {
        return new YourAttributeColumn(
            $attribute->getCode()->getValue(),
            $attribute->getLabel()->get($language)
        );
    }
}
```

Create DataSet Builder class `YourAttributeDataSetQueryBuilder`

This file should live in `Your-module\Infrastructure\Grid\Builder\Query` namespace and extends `Ergonode\Product\Infrastructure\Grid\Builder\Query\AbstractAttributeDataSetBuilder`

```php
namespace Ergonode\Product\Infrastructure\Grid\Builder\Query;

/**
 */
class YourAttributeDataSetQueryBuilder extends AbstractAttributeDataSetBuilder
{
    /**
     * {@inheritDoc}
     */
    public function supports(AbstractAttribute $attribute): bool
    {
        return $attribute instanceof YourAttribute;
    }
}
```

Create renderer class `YourAttributeColumnRenderer`

```php
namespace Ergonode\Product\Infrastructure\Grid\Column\Renderer;

/**
 */
class YourAttributeColumnRenderer extends \Ergonode\Grid\Column\Renderer\ColumnRendererInterface
{
    /**
     * {@inheritDoc}
     */
    public function supports(ColumnInterface $column): bool
    {
        return $column instanceof YourAttributeColumn;
    }

    /**
     * {@inheritDoc}
     */

    public function render(ColumnInterface $column, string $id, array $row)
    {
        // TODO return your column value
    }
}
```

<div class="Alert Alert--success">

Please keep in mind that behat and unit tests are recommended. 

</div>
