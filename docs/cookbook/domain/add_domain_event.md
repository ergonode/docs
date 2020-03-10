# How to add domain event to aggregate root
## Creating event
If we want to enhance the aggregate with, a new business logic you have to handle it by adding a new domain event.
Each domain event must implement ```Ergonode\EventSourcing\Infrastructure\DomainEventInterface``` interface.
Domain event must be immutable. 
The event should be described with JMS annotations so that the event is serialized correctly.
```php
namespace YourNamespace\YourModule\Domain\Event;

use Ergonode\EventSourcing\Infrastructure\DomainEventInterface;
use JMS\Serializer\Annotation as JMS;

class NoteContentChangedEvent implements DomainEventInterface {

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
    private string $from;

    /**
     * @var string
     *
     * @JMS\Type("string")
     */
    private string $to;
    
    /**    
     * @param NoteId $id
     * @param string $from
     * @param string $to 
     */
    public function __construct(NoteId $id, string $from, string $to) {
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @return AggregateId|ProductId
     */
    public function getAggregateId(): AggregateId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }
    
    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->from;
    }
}
```

<div class="Alert Alert--info">

The event classes represent business events that have already happened, so it is suggested that event names should be in the past tense.

</div>
 
## Adding event to aggregate root
First, we need to add a method that represents business logic witch will be linked to our event.
```php
/**
 * @var string content
 */
public function changeContent(string $content): void
{
    if($content !== $this->content) {
        $this->apply(new NoteContentChangedEvent($this->content, $content));
    }
}
```
Then we have to add a method in our aggregate that will handle our event.

Method must have same name as given event class with ```apply``` suffix
```php
/**
 * @var NoteContentChangedEvent $event
 */
protected function applyNoteChangedEvent(NoteContentChangedEvent $event): void
{
    $this->content = $event->getTo();
}
```

Now if you want use change Note value:
```php
$note = $this->repositry->load($noteId);
$note->changeContent('Changed note content');
$this->repositry->save($note);
``` 
