# How create custom aggregate root

## Creating aggregate root identifier class

Each aggregate root uses it's own identifier, is simple value object that extends ```Ergonode\SharedKernel\Domain\AggregateId``` class. 

```php
namespace YourNamespace\YourModule\Domain\Entity;

use Ergonode\SharedKernel\Domain\AggregateId;

class NoteId extends AggregateId
{
}
```

<div class="Alert Alert--success">

Use of dedicated identifiers reduces the risk of mistaken use of the identifier of one object type in another one.

</div>

## Creating aggregate root class

```php
namespace YourNamespace\YourModule\Domain\Entity;

use Ergonode\EventSourcing\Infrastructure\DomainEventInterface;

class Note extends AbstractAggregateRoot {

    /**
     * @var NoteId $id
     *
     * @JMS\Type("YourNamespace\YourModule\Domain\Entity\NoteId")
     */
    private NoteId $id;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private string $content;

    /**
     * @return AggregateId|NoteId
     */
    public function getId(): AggregateId
    {
        return $this->id;
    }
}
```
Aggregate root object should always be in correct state, so all necessary parameters should always be passed through the constructor.

```php
    /**
     * @param NoteId $id
     * @param string $content
     *
     * @throws \Exception
     */
    public function __construct(NoteId $id, string $content)
    {
    }
```
On next step we need to add Domain event that represent creating Note object
```php
namespace YourNamespace\YourModule\Domain\Event;

use Ergonode\EventSourcing\Infrastructure\DomainEventInterface;
use JMS\Serializer\Annotation as JMS;

class NoteCreatedEvent implements DomainEventInterface {

    /**
     * @var NoteId $id
     *
     * @JMS\Type("YourNamespace\YourModule\Domain\Entity\NoteId")
     */
    private NoteId $id;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private string $content;
    
    /**    
     * @param NoteId $id
     * @param string $content
     */
    public function __construct(NoteId $id, string $content) {
        $this->content = $content;
    }

    /**
     * @return AbstractId|ProductId
     */
    public function getAggregateId(): AbstractId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
}
``` 
And aggregate root constructor should look like this
```php
    /**
     * @param NoteId $id
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(NoteId $id, string $content)
    {
        $this->apply(new NoteCreatedEvent($id, $content));
    }
```
In the end we need to add method that handle our construction event
```php
/**
 * @var NoteCreatedEvent $event
 */
protected function applyAddProductNoteEvent(NoteCreatedEvent $event): void
{
    $this->content = $event->getContent();
}
```

Now if you want use Note Aggregate type:
```php
$note = new Note(NoteId::generate(), 'My note content');
$this->repositry->save($note);
``` 
