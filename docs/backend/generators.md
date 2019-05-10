# Generators

In Ergonode generators are classes which are used for creating specific objects with there configuration. 

There are couple types of generators which can be created based on interfaces. 


<!--- ## Channel generator

Channel generator interface is used for creating Channels. 

To generate new channel, new class which implements `ChannelGeneratorInterface` must be created.

```php
<?php

namespace Ergonode\Component\Channel\Infrastructure\Generator;

interface ChannelGeneratorInterface
{
    public function generate(ChannelId $channelId, string $name): Channel;
    public function getType(): string;
}

```

It has two methods: 
* `generate` -  this method has two parameters  [`Channel Id - $id`](backend/modules/channel.md#channel-id) and `name`
* `getType` 

Example of segment generator class:
```php
<?php

namespace Ergonode\Component\CustomCompany\Infrastructure\Generator\Channel;

class DEChannelGenerator implements ChannelGeneratorInterface
{
    public function getType(): string
    {
        return self::TYPE;
    }
    public function generate(ChannelId $channelId, string $name): Channel
    {
        $connector = $this->connectorProvider->provide(ConnectorGenerator::TYPE);
        $segment = $this->segmentProvider->provide(EURSegmentGenerator::TYPE);

        $configuration = new ChannelConfiguration(
            new Language(self::LANGUAGE),
            new StoreCode(self::CODE),
            new AttributeCode(AttributeModel::PRICE_EUR),
            new AttributeCode(AttributeModel::GROSS_WEIGHT),
            array_merge(
                AttributeModel::...,
            ),
        );
        return new Channel($channelId, $name, $connector->getId(), $segment->getId(), $configuration);
    }
}

```

## Connector generator

Connector generator interface is used for creating Connectors. 
 
 
To generate new connector, new class which implements `ConnectorGeneratorInterface` must be created. 
 
 ```php
 <?php
 namespace Ergonode\Component\Channel\Infrastructure\Generator;
 
 interface ChannelGeneratorInterface
 {
     public function generate(ChannelId $channelId, string $name): Channel;
     public function getType(): string;
 }
 ```
 
 
 It has two methods: 
 * `generate` -  this method has two parameters  [`Connector Id - $id`](backend/modules/connector.md#connector-id) and `name`
 * `getType` 
 
 Example of connector generator class:
 
 
 ```php
<?php

namespace Ergonode\Component\CustomCompany\Infrastructure\Generator\Connector;

class CustomConnectorGenerator implements ConnectorGeneratorInterface
{
    public function generate(ConnectorId $id, string $name): Connector
    {
        $configuration = new ConnectorConfiguration(
            $this->host,
            $this->token
        );
        $type = new ConnectorType(MagentoConnectorProcessor::TYPE);
        return new Connector($id, $name, $type, $configuration);
    }
    public function getType(): string
    {
        return self::TYPE;
    }
}

```

## Segment Generator

Segment generator interface is used for creating Segments. 

To generate new segment, new class which implements `SegmentGeneratorInterface` must be created. 

```php
<?php

namespace Ergonode\Component\Segment\Infrastructure\Generator;

interface SegmentGeneratorInterface
{
    public function generate(SegmentId $segment, string $name): Segment;

    public function getType(): string;
}

```

It has two methods: 
* `generate` -  this method has two parameters  [`Segment Id - $id`](backend/modules/segment.md#segment-id) and `$name`
* `getType` 

Example of segment generator class:

```php
<?php

namespace Ergonode\Component\CustomCompany\Infrastructure\Generator\Segment;

class PLNSegmentGenerator implements SegmentGeneratorInterface
{
    public const TYPE = 'PLN';

    public function getType(): string
    {
        return self::TYPE;
    }

    public function generate(SegmentId $id, string $name): Segment
    {
        $segment = new Segment($id, $name);
        $segment->addSpecification(new NotExportedSpecification());
        $segment->addSpecification(new AttributeExistsSpecification(new AttributeCode('name')));
        $segment->addSpecification(new AttributeExistsSpecification(new AttributeCode('gross_weight')));
        $segment->addSpecification(new AttributeExistsSpecification(new AttributeCode('landed_cost_pln')));

        return $segment;
    }
}
```

--->

## Transformer generator

Transformer generator interface is used for creating Transformers. 

To generate new transformer, new class which implements `TransformerGeneratorStrategyInterface` must be created. 

```php
<?php
namespace Ergonode\Component\Transformer\Infrastructure\Generator;

interface TransformerGeneratorStrategyInterface
{
    public function generate(TransformerId $transformerId, string $name, string $field, array $options = []): Transformer;
    public function getType(): string;
}
```

It has two methods: 
* `generate` -  this method has two parameters  [`Transformer Id - $id`](#transformer-id), `$name`, `$field` and `$options`
* `getType` 

Example of transformer generator class:


```php
<?php

namespace Ergonode\Component\CustomCompany\Infrastructure\Generator;


class GknAttributeValueTransformerGeneratorStrategy implements TransformerGeneratorStrategyInterface
{
    private const TYPE = 'ATTRIBUTE_VALUES';

    public function generate(TransformerId $transformerId, string $name, string $field, array $options = []): Transformer
    {
        $transformer = new Transformer($transformerId, $name, 'indicator');
        $transformer->addConverter('sku', new TextConverter([], 'indicator'));
        $transformer->addConverter('name', new TextConverter(), 'values');

        return $transformer;
    }
    public function getType(): string
    {
        return self::TYPE;
    }
}

```

