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
