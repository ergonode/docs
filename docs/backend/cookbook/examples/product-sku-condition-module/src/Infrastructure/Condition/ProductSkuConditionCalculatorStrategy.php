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
