# Connector magento

-----

This module is responsible for connecting and exporting data to Magento 2

It contains connection configuration to and mechanics which enables exporting data to Magento 2

## Mappers 

Mappers are used for mapping ergonode objects, 
for example attributes, products etc. on structure which is used by Magento 2.
  
Mappers are classes which implements `MagentoProductMapperInterface`. 

```php
<?php

namespace Ergonode\Component\ConnectorMagento\Infrastructure\Mapper;

interface MagentoProductMapperInterface
 public function map(MagentoProduct $magentoProduct, DomainProduct $domainProduct, MapperConfiguration $configuration): ProductInterface;
}
```

Mappers can be found under following directory (`Ergonode\Component\ConnectorMagento\Infrastructure\Mapper`) currently in the system there are couple default mappers:

* `MagentoConfigurableProductExtensionMapper` - mapping configurable products
* `MagentoInputAttributeMapper` - mapping input attributes
* `MagentoProductCategoryMapper` - mapping product categories
* `MagentoProductImageMapper` - mapping product images
* `MagentoProductPriceMapper` - mapping product prices
* `MagentoProductWeightMapper` - mapping product weight
* `MagentoSelectAttributeMapper` - mapping select attributes
* `MagentoSimpleProductMapper` - mapping simple products


To create a custom mapper new class which implements `MagentoProductMapperInterface` needs to be created.





