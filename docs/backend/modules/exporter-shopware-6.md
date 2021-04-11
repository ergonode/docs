# Exporter Shopware 6

---------------------

## Introduction

Module which extends Ergonode functionality with a new export channel to Shopware6.

We believe that Ergonode is the source of truth, so first you need to add new property, category, cross-selling etc which would match objects in Shopware6

Products are based on `Product number` and Custom fields on `Technical name`.

## Process
All the magic starts in the first handler. `ExporterShopware6\Infrastructure\ProcessExportCommandHandler`  Which is responsible for starting the export process to Shopware6.

1. Start Export
2. Step-by-step process Export
3. End Export


### Start Process
Start process synchronizes the required data for export and set time of end export.

Synchronizer are based on `Ergonode\ExporterShopware6\Infrastructure\Synchronizer\SynchronizerInterface`

It downloads and update:
* Languages
* Currency
* Tax

In configuration `service.yaml`
```yaml
Ergonode\ExporterShopware6\Infrastructure\Processor\Process\StartShopware6ExportProcess:
  arguments:
    - '@Ergonode\ExporterShopware6\Infrastructure\Synchronizer\CurrencySynchronizer'
    - '@Ergonode\ExporterShopware6\Infrastructure\Synchronizer\TaxSynchronizer'
    - '@Ergonode\ExporterShopware6\Infrastructure\Synchronizer\LanguageSynchronizer'
```
### Step-by-step process Export
Step processes run in the correct order. All are based on `Ergonode\ExporterShopware6\Infrastructure\Processor\ExportStepProcessInterface`

They are easily extendable by changing the `services.yml` in application config.
```yaml
Ergonode\ExporterShopware6\Infrastructure\Handler\ProcessExportCommandHandler:
    tags: ['messenger.message_handler']
    arguments:
        $steps:
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\PropertyGroupStep'
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\CustomFieldStep'
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\CategoryStep'
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\VariableProductStep'
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\SimpleProductStep'
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\CategoryRemoveStep'
            - '@Ergonode\ExporterShopware6\Infrastructure\Processor\Step\ProductCrossSellingStep'
```

### End Process
Set time of export finish.

## Step description 

### PropertyGroupStep
Adding and updating the Property set on the configuration form.

Both steps are published by the commands `Ergonode\ExporterShopware6\Domain\Command\Export\PropertyGroupExportCommand` which arrives to `Ergonode\ExporterShopware6\Infrastructure\Processor\Process\PropertyGroupExportProcess`.

* Find and get PropertyGroup info from Shopware6 in Default Language.
* Mapping value from Ergonode Base
* Insert or update PropertyGroup
* Replace process for other selected languages
* Start option process

Mapping is a process which overwrites data from Shopware6 with the Ergonode data. PropertyGroup mappers implement `Ergonode\ExporterShopware6\Infrastructure\Mapper\PropertyGroupMapperInterface` which are left open to be extended.

When adding or changing a mapper, we must not forget to add configuration to `services.yml` as fallows:
```yaml
Ergonode\ExporterShopware6\Infrastructure\Builder\Shopware6PropertyGroupBuilder:
    arguments:
        - '@Ergonode\ExporterShopware6\Infrastructure\Mapper\PropertyGroup\PropertyGroupNameMapper'
        - ...  
```

### CustomFieldStep
Adding and updating the CustomField set on the configuration form.

Both steps are published by the commands `Ergonode\ExporterShopware6\Domain\Command\Export\CustomFieldExportCommand` which arrives to `Ergonode\ExporterShopware6\Infrastructure\Processor\Process\CustomFiledExportProcess`.

* Find and get CustomField info from Shopware6 in Default Language.
* Mapping value from Ergonode Base
* Insert or update CustomField
* Replace process for other selected languages

Mapping is a process which overwrites data from Shopware6 with the Ergonode data. CustomField mappers implement `Ergonode\ExporterShopware6\Infrastructure\Mapper\CustomFieldMapperInterface` which are left open to be extended.

When adding or changing a mapper, we must not forget to add configuration to `services.yml` as fallows
```yaml
Ergonode\ExporterShopware6\Infrastructure\Builder\Shopware6CustomFieldBuilder:
    arguments:
        - '@Ergonode\ExporterShopware6\Infrastructure\Mapper\CustomField\CustomFieldNameMapper'
        - ...  
```

### CategoryStep
Adding and updating the Category Tree set on the configuration form.

Both steps are published by the commands `Ergonode\ExporterShopware6\Domain\Command\Export\CategoryExportCommand` which arrives to `Ergonode\ExporterShopware6\Infrastructure\Processor\Process\CategoryExportProcess`.

* Find and get Category info from Shopware6 in Default Language.
* Mapping value from Ergonode Base
* Insert or update Category
* Replace process for other selected languages

Mapping is a process which overwrites data from Shopware6 with the Ergonode data. Category mappers implement `Ergonode\ExporterShopware6\Infrastructure\Mapper\CategoryMapperInterface`  which are left open to be extended.

When adding or changing a mapper, we must not forget to add configuration to `services.yml` as fallows:
```yaml
Ergonode\ExporterShopware6\Infrastructure\Builder\Shopware6CategoryBuilder:
    arguments:
        - '@Ergonode\ExporterShopware6\Infrastructure\Mapper\Category\CategoryNameMapper'
        - ...  
```

### VariableProductStep and SimpleProductStep
Adding and updating the Products in relation to a segment (if set) or the entire catalog. The important to first export products with variants.

Both steps are published by the commands `Ergonode\ExporterShopware6\Domain\Command\Export\ProductExportCommand` which arrives to `Ergonode\ExporterShopware6\Infrastructure\Processor\Process\ProductExportProcess`.

* Find and get product info from Shopware6 in Default Language.
* Mapping value from Ergonode Base 
* Insert or update product
* Replace process for other selected languages

Mapping is a process which overwrites data from Shopware6 with the Ergonode data.  Product mappers implement `Ergonode\ExporterShopware6\Infrastructure\Mapper\ProductMapperInterface` which are left open to be extended.

When adding or changing a mapper, we must not forget to add configuration to `services.yml` as fallows:
```yaml
Ergonode\ExporterShopware6\Infrastructure\Builder\Shopware6ProductBuilder:
    arguments:
        - '@Ergonode\ExporterShopware6\Infrastructure\Mapper\Product\ProductSkuMapper'
        - ...   
```

### ProductCrossSellingStep
Adding and updating the ProductCrossSelling set on the configuration form.

Both steps are published by the commands `Ergonode\ExporterShopware6\Domain\Command\Export\ProductCrossSellingExportCommand` which arrives to  `Ergonode\ExporterShopware6\Infrastructure\Processor\Process\ProductCrossSellingExportProcess`.

* Find and get ProductCrossSelling info from Shopware6 in Default Language.
* Mapping value from ProductCrossSelling Base
* Insert or update ProductCrossSelling
* Replace process for other selected languages

Mapping is a process which overwrites data from Shopware6 with the Ergonode data.  ProductCrossSelling mappers implement `Ergonode\ExporterShopware6\Infrastructure\Mapper\ProductCrossSellingMapperInterface` which are left open to be extended.

When adding or changing a mapper, we must not forget to add configuration to `services.yml` as fallows:
```yaml
Ergonode\ExporterShopware6\Infrastructure\Builder\ProductCrossSellingBuilder:
    arguments:
        - '@Ergonode\ExporterShopware6\Infrastructure\Mapper\ProductCrossSelling\ProductCrossSellingRootProductIdMapper'
        - ...  
```
