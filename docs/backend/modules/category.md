# Category

The module is responsible for managing categories and category trees.

## Aggregates

|Class|Description|
|-|-|
|Ergonode\Category\Domain\Entity\Category|Domain representation of category|

## Commands

|Command class|Action|
|-|-|
|Ergonode\Category\Domain\Command\CreateCategoryCommand|Adding a new category|
|Ergonode\Category\Domain\Command\UpdateCategoryCommand|Updating of category|
|Ergonode\Category\Domain\Command\DeleteCategoryCommand|Deletion of category|


## Events

|Event class|Called when|
|-|-|
|Ergonode\Category\Domain\Event\CategoryCreatedEvent|The category has been created|
|Ergonode\Category\Domain\Event\CategoryDeletedEvent|The category has been deleted|
|Ergonode\Category\Domain\Event\CategoryNameChangedEvent|The category name has been changed|

## Projectors

### DbalAttributeCreateEventProjector

Namespace: ```Ergonode\Category\Infrastructure\Persistence\Projector\DbalCategoryCreatedEventProjector``` \
Triggered event: ```Ergonode\Category\Domain\Event\CategoryCreatedEvent```\
Description: Create category entry in table ```categories```