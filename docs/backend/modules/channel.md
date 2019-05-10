# Channel

-----

This module is responsible for managing channels.
In Ergonode channels are entities used for configuration of exports. 
It binds [`Segments`](backend/modules/segment.md) and [`Connectors`](backend/modules/connector.md). 

**Channel** extends class: [`AbstractAggregateRoot`](backend/modules/core.md#abstract-aggregate-root).

**Channel class can be founded:<br> `Ergonode\Component\Channel\Domain\Entity\Channel.php`**


Following parameters are need in order to create **Channel**:
 * [`ChannelId`](#channel-id)
 * **`Name`**
 * [`ConnectorId`](backend/modules/connector.md#connector-id)
 * [`SegmentId`](backend/modules/segment.md#segment-id)
 * [`ChannelConfiguration`](#channel-configuration)
 
 

## Channel id


Channel Id is an entity which extends [`AbstractId`](backend/modules/core.md#abstractid)

Channel id object represents Channel identifier.

## Creating Channels
 
?> **Frontend** - [Click here](frontend/modules/channel.md) <br><br> **Backend** - [Click here](backend/generators.md#channel-generator) 

## Channel configuration

It is a class which stores **Channel** configuration.

**Channel configuration class can be founded:<br> `Ergonode\Component\Channel\Infrastructure\Configuration\ChannelConfiguration.php`**


## Channel product
 
ChannelProduct class is responsible for storing information about products after processing in channel, For example with export statuses and dates.

**Channel product class can be founded:<br> `Ergonode\Component\Channel\Domain\Entity\ChannelProduct.php`**

Following parameters are need in order to create **Channel product**:
* [`ProductId`](backend/modules/product.md#product-id) 
* [`ChannelId`](backend/modules/channel.md#channel-id) 

It has 4 statuses:
* `CREATED`
* `EXPORTED`
* `REJECTED`
* `ERROR`


