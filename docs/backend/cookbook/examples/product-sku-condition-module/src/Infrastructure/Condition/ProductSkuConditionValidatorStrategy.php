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

