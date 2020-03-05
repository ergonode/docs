# Sku condition

To create own custom condition module you need to implement interfaces.

```
Ergonode\Condition\Domain\ConditionInterface

Ergonode\Condition\Infrastructure\Condition\ConditionCalculatorStrategyInterface

Ergonode\Condition\Infrastructure\Condition\ConditionConfigurationStrategyInterface

Ergonode\Condition\Infrastructure\Condition\ConditionValidatorStrategyInterface
```

In this example we create condition for product sku with is equal operator.

Create class ProductSkuCondition in file `product-sku-condition-module/src/Domain/ProductSkuCondition.php`

```php
<?php

declare(strict_types=1);

namespace YourVendor\ProductSkuConditionModule\Domain;

use Ergonode\Condition\Domain\ConditionInterface;
use JMS\Serializer\Annotation as JMS;

class ProductSkuCondition implements ConditionInterface
{
    public const TYPE = 'YOUR_NAME_SPACE_PRODUCT_SKU_CONDITION';
    public const PHRASE = 'YOUR_NAME_SPACE_PRODUCT_SKU_CONDITION_PHRASE';


    public const OPERATOR_IS_EQUAL = '=';

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private string $operator;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private string $value;

    /**
     * @param string $operator
     * @param string $value
     */
    public function __construct(string $operator, string $value)
    {
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function getType(): string
    {
        return self::TYPE;
    }
}

```

I next step we implement 
```Ergonode\Condition\Infrastructure\Condition\ConditionCalculatorStrategyInterface``` in 
file ```product-sku-condition-module/src/Infrastructure/Condition/ProductSkuConditionCalculatorStrategy.php```

```php
<?php

declare(strict_types=1);

namespace YourVendor\ProductSkuConditionModule\Infrastructure\Condition;

use Ergonode\Condition\Domain\Condition\ProductSkuExistsCondition;
use Ergonode\Condition\Domain\ConditionInterface;
use Ergonode\Condition\Infrastructure\Condition\ConditionCalculatorStrategyInterface;
use Ergonode\Product\Domain\Entity\AbstractProduct;
use YourVendor\ProductSkuConditionModule\Domain\ProductSkuCondition;

class ProductSkuConditionCalculatorStrategy implements ConditionCalculatorStrategyInterface
{
    /**
     * @param string $type
     * @return bool
     */
    public function supports(string $type): bool
    {
        return $type === ProductSkuCondition::TYPE;
    }

    /**
     * @inheritDoc
     */
    public function calculate(AbstractProduct $object, ConditionInterface $configuration): bool
    {
        $operator = $configuration->getOperator();
        $value = strtolower($configuration->getValue());
        $sku = strtolower($object->getSku()->getValue());

        switch ($operator) {
            case ProductSkuExistsCondition::IS_EQUAL:
                return $value === $sku;
        }
    }
}
```

And our condition needs configuration in file `product-sku-condition-module/src/Infrastructure/Condition/ProductSkuConditionConfigurationStrategy.php`

```php
<?php
 
declare(strict_types=1);

namespace YourVendor\ProductSkuConditionModule\Infrastructure\Condition;

use Ergonode\Condition\Infrastructure\Condition\ConditionConfigurationStrategyInterface;
use Ergonode\Core\Domain\ValueObject\Language;
use Symfony\Contracts\Translation\TranslatorInterface;
use YourVendor\ProductSkuConditionModule\Domain\ProductSkuCondition;

class ProductSkuConditionConfigurationStrategy implements ConditionConfigurationStrategyInterface
{
    /**
     * @var TranslatorInterface
     */
    private TranslatorInterface $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param string $type
     * @return bool
     */
    public function supports(string $type): bool
    {
        return $type === ProductSkuCondition::TYPE;
    }

    /**
     * @inheritDoc
     */
    public function getConfiguration(Language $language): array
    {
        return [
            'type' =>  ProductSkuCondition::TYPE,
            'name' => $this
                ->translator
                ->trans(ProductSkuCondition::TYPE, [], 'condition', $language->getCode()),
            'phrase' => $this
                ->translator
                ->trans(ProductSkuCondition::PHRASE, [], 'condition', $language->getCode()),
            'parameters' => [
                [
                    'name' => 'operator',
                    'type' => 'SELECT',
                    'options' => [
                        ProductSkuCondition::OPERATOR_IS_EQUAL =>
                            $this->translator->trans('Is equal', [], 'condition', $language->getCode()),
                    ],
                ],
                [
                    'name' => 'value',
                    'type' => 'TEXT',
                ],
            ],
        ];
    }
}

```

Also we need to validate form ```product-sku-condition-module/src/Infrastructure/Condition/ProductSkuConditionValidatorStrategy.php```

```php
<?php

declare(strict_types=1);

namespace YourVendor\ProductSkuConditionModule\Infrastructure\Condition;

use Ergonode\Condition\Infrastructure\Condition\ConditionValidatorStrategyInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraint;
use YourVendor\ProductSkuConditionModule\Domain\ProductSkuCondition;

/**
 */
class ProductSkuConditionValidatorStrategy implements ConditionValidatorStrategyInterface
{
    /**
     * @inheritDoc
     */
    public function supports(string $type): bool
    {
        return $type === ProductSkuCondition::TYPE;
    }

    /**
     * @inheritDoc
     */
    public function build(array $data): Constraint
    {
        return new Assert\Collection(
            [
                'operator' => [
                    new Assert\NotBlank(),
                    new Assert\Choice([ProductSkuCondition::OPERATOR_IS_EQUAL]),
                ],
                'value' => [
                    new Assert\NotBlank(),
                ],
            ]
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getValidatedClass(): string
    {
        return ProductSkuCondition::class;
    }
}
```

Now we need register this classes in the `product-sku-condition-module/src/Application/DependencyInjection/ProductSkuConditionModuleExtension.php` class   as symfony module
```php
<?php

declare(strict_types=1);

namespace YourVendor\ProductSkuConditionModule\Application\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ProductSkuConditionModuleExtension  extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../../Resources/config')
        );

        $loader->load('services.yml');
    }
}

```
And in the `product-sku-condition-module/src/Resources/config/services.yml` we need register our services

```yaml
services:
    _defaults:
        autowire: true
        autoconfigure: true
        public: false

    YourVendor\ProductSkuConditionModule\Infrastructure\:
        resource: '../../Infrastructure/*'


```

And we need add our module
```php
<?php

declare(strict_types=1);

namespace YourVendor\ProductSkuConditionModule;

use Ergonode\Core\Application\AbstractModule;
use YourVendor\ProductSkuConditionModule\Application\DependencyInjection\ProductSkuConditionModuleExtension;

class ProductSkuConditionModule extends AbstractModule
{

    protected function getContainerExtensionClass(): string
    {
        return ProductSkuConditionModuleExtension::class;
    }

}
```


And finally our module must be added to  the `config/bundles.php` 
```
YourVendor\ProductSkuConditionModule\ProductSkuConditionModule::class => ['all' => true],
```

and in the arrays in files `config/packages/egronode_segment.yaml` and `config/packages/egronode_workflow.yaml` 
we need add our condition

```
ergonode_workflow:
  conditions:
    ...
    - YourVendor\ProductSkuConditionModule\Domain\ProductSkuCondition
```

```
ergonode_segment:
  conditions:
    ...
    - YourVendor\ProductSkuConditionModule\Domain\ProductSkuCondition
```

To test our module as composer packages you can in the composer.json add 
```
"repositories": [
        {
            "type": "path",
            "url": "path-to-yourproduct-sku-condition-module"
        }
    ]
```

and you module must include composer.json  with proper requirements

```
{
  "name": "your-vendor-name/your-module-name",
  "type": "ergonode-module",
  "description": "Your description",
  "license" : "Your Free License",
  "require": {
    "php": "^7.4",
  },
  "autoload": {
    "psr-4": {
      "YourVendor\\ProductSkuConditionModule\\": "src/"
    }
  },
  "autoload-dev": {
  }
}
```

and execute command 
``` 
composer req "your-vendor-name/your-module-name @dev"
```

and in the api ```/api/v1/EN/dictionary/conditions``` endpoint you should have 
```
{
...
    "YOUR_NAME_SPACE_PRODUCT_SKU_CONDITION": "YOUR_NAME_SPACE_PRODUCT_SKU_CONDITION",
...
}
 ``` 

full code example you can find in the   [product-sku-condition-module](examples/product-sku-condition-module)