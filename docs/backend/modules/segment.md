# Segment

-----

This module is responsible for managing segments. 
In Ergonode segments are entities used for filtering products according to [Specifications](#Specification).

**Segment** extends class: [`AbstractAggregateRoot`](backend/modules/core.md#abstractaggregateroot). 

**Segment class can be founded:<br> `Ergonode\Component\Segment\Domain\Entity\Segment.php`**


To create an object of **Segment** class [`Segment Id - $id`](backend/modules/segment.md#segment-id) and `$name` is needed.


## Segment Id

Segment Id is an entity which extends [`AbstractId`](backend/modules/core.md#abstractid)

Segment Id object represents Segment identifier.

## Creating Segments
 
?> **Frontend** - [Click here](frontend/modules/segment.md) <br><br> **Backend** - [Click here](backend/generators.md#segment-generator) 


## Specification

Specifications are design based on [specification pattenr](https://en.wikipedia.org/wiki/Specification_pattern)

Specification classes are responsible for conditions which are used for filtering. 

**Specification implements classes: <a id="segmentspecificationinterface">`SegmentSpecificationInterface`</a>**


```php
<?php

namespace Ergonode\Component\Segment\Domain\Specification;

interface SegmentSpecificationInterface
{
    public function isSatisfiedBy(DomainProduct $domainProduct, ChannelProduct $channelProduct): bool;
}

```

It has one method `isSatisfiedBy` which has two parameters [`Domain product`](backend/modules/product.md#domainproduct) and [`Channel product`](backend/modules/channel.md#channel-product) .
<br> This method should contain filter logic. 



### Default Specifications

If new specifications is needed can be easily created. For more click [here](#creating-specification). 
 <br>In Ergonode there are couple default specifications:

|      |                                                          |
|-------------|--------------------------------------------------------------------------------------|
| **Name**        | **AttributeExistsSpecification**                                                         |
| Location    | Ergonode\Component\Segment\Infrastructure\Specification\AttributeExistsSpecification |
| Description | Specification which checks if given attribute in product exist and has given value.  |
|      |                                                          |
| **Name**        | **AttributeValueSpecification**                                                         |
| Location    | Ergonode\Component\Segment\Infrastructure\Specification\AttributeValueSpecification |
| Description | Specification which checks if given attribute in product exist and has given value.  |
|      |                                                          |
| **Name**        | **NotExportedSpecification**                                                         |
| Location    | Ergonode\Component\Segment\Infrastructure\Specification\NotExportedSpecification |
| Description | Specification which checks if product should be exported.  |




### Creating specification

If new specification needed, new class which implements [SegmentSpecificationInterface](#segmentspecificationinterface) must be created. 
The whole filter logic should be in `isSatisfiedBy` method. 

