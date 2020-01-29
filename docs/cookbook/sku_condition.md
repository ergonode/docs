# Sku condition

To create own custom condition module you need to implement interfaces.

```
Ergonode\Condition\Domain\ConditionInterface

Ergonode\Condition\Infrastructure\Condition\ConditionCalculatorStrategyInterface

Ergonode\Condition\Infrastructure\Condition\ConditionConfigurationStrategyInterface

Ergonode\Condition\Infrastructure\Condition\ConditionValidatorStrategyInterface
```

In this example we create condition for product sku with is equal operator.

Create class ProductSkuCondition

```php
<?php 
//file  src/Domain/ProductSkuCondition.php
declare(strict_types=1);

namespace YourNameSpace\ProductSkuConditionModule\Domain;

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
```
Ergonode\Condition\Infrastructure\Condition\ConditionCalculatorStrategyInterface
```

```php
<?php
declare(strict_types=1);

namespace YourNameSpace\ProductSkuConditionModule\Infrastructure\Condition;

use Ergonode\Condition\Domain\Condition\ProductSkuExistsCondition;
use Ergonode\Condition\Domain\ConditionInterface;
use Ergonode\Condition\Infrastructure\Condition\ConditionCalculatorStrategyInterface;
use Ergonode\Product\Domain\Entity\AbstractProduct;
use YourNameSpace\ProductSkuConditionModule\Domain\ProductSkuCondition;


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

And our condition needs configuration. 
```php
<?php

declare(strict_types=1);

namespace YourNameSpace\ProductSkuConditionModule\Domain;

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

Also we need to validate form

```php
form
```
