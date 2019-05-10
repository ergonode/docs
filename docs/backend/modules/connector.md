# Connector

-----

This module is responsible for managing connectors

In Ergonode connector is entity used for managing specific connectors to the external systems. 

Based on interfaces from this module there are created specific connectors. Each type of connection to the external system needs to have its own module e.g [`connector-magento`](backend/modules/connector-magento.md), `connector-shopware` etc.

**Connector** extends class: [`AbstractAggregateRoot`](backend/modules/core.md#abstract-aggregate-root).

**Connector class can be founded:<br> `Ergonode\Component\Connector\Domain\Entity\Connector.php`**


Following parameters are need in order to create **Connector**:
 * [`ConnectorId`](#connector-id)
 * **`Name`**
 * [`ConnectorType`](#connector-type)
 * [`ConnectorConfiguration`](#connector-configuration)
 
 
## Connector Id

Connector id is an entity which extends [`AbstractId`](backend/modules/core.md#abstractid)

Connector id object represents Connector identifier.

## Creating Connectors
 
?> **Frontend** - [Click here](frontend/modules/connector.md) <br><br> **Backend** - [Click here](backend/generators.md#connector-generator) 


## Connector configuration


It is a class which stores **Connector** configuration.

**Connector configuration class can be founded:<br> `Ergonode\Component\Connector\Infrastructure\Configuration\ConnectorConfiguration.php`**


Following parameters are need in order to create **Connector configuration**:
* `url`
* `token`


## Connector type 

Connector type is a value object which represents type of connector.
