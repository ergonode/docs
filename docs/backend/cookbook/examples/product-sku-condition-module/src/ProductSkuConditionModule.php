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
