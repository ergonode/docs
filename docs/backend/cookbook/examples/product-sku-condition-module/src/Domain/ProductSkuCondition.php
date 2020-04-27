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