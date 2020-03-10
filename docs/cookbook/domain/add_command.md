# How create custom command

## Creating domain command

Domain command should represents single transactional business logic.  
This class should implement ```Ergonode\EventSourcing\Infrastructure\DomainCommandInterface```

A domain command should always have a valid state that cannot be changed, that is why the class representing it should be immutable  

```php
namespace YourNamespace\YourModule\Domain\Command;

use Ergonode\EventSourcing\Infrastructure\DomainCommandInterface;
use YourNamespace\YourModule\Domain\Entity\NoteId;

class ChangeNoteContentCommand implements DomainCommandInterface
{
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
     *
     * @throws \Exception
     */
    public function __construct(NoteId $id, string $content)
    {
        $this->id = $id;
        $this->content = $content;
    }

    /**
     * @return NoteId
     */
    public function getId(): NoteId
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

## Creating command handler

Each command needs class that handle the logic represented by the command

```php
namespace YourNamespace\YourModule\Infrastructure\Handler;

use Ergonode\EventSourcing\Infrastructure\DomainEventInterface;
use YourNamespace\YourModule\Domain\Command\ChangeNoteContentCommand;

class ChangeNoteContentCommandHandler 
{
    /**
    * @param ChangeNoteContentCommand $command
    */
    public function __invoke(ChangeNoteContentCommand $command): void
    {
        $note = $this->repositry->load($command->getId());
        $note->changeContent($command->getContent());
        $this->repositry->save($note);
    }
}
```