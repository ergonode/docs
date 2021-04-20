# How to add new notification to the system

In Ergonode we have notification mechanism which can notify users about things which happened in the system.
If needed it is quite easy to add new notification type.

## Creating custom notification type

To create your own notification type you need to create class which implements `Ergonode\Notification\Domain\NotificationInterface`

Your custom notification should be quite similar to this one:

```php
class BatchActionEndedNotification implements NotificationInterface
{
    private const TYPE = 'batch-action-ended';
    private const MESSAGE = 'Batch action "%type%" ended';

    private string $message;

    private UserId $userId;

    private AbstractId $objectId;

    private array $parameters;

    private \DateTime $createdAt;

    public function __construct(BatchAction $batchAction, UserId $userId)
    {
        $this->message = self::MESSAGE;
        $this->userId = $userId;
        $this->objectId = $batchAction->getId();
        $this->parameters = ['%type%' => $batchAction->getType()->getValue()];
        $this->createdAt = new \DateTime();
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getAuthorId(): ?UserId
    {
        return $this->userId;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function getObjectId(): ?AbstractId
    {
        return $this->objectId;
    }
}
```

`TYPE` - you have to define type of your custom notification

`MESSAGE` - this is text of message for user, it can contain parameters, and then it can be translated

`$userId` - this contains author of notification

`$parameters` - this contains parameters used to vary notification message

`objectId` - this is id of object which given notification concerns

## Translation

You can translate your message using standard Symfony's translation mechanism.

In `yourmodule/src/Resources/translations` directory you need to create `notification.{langaugeCode}.yaml` file.

Polish translation for message from above example would be:

`notification.pl.yaml`:

```yaml
Batch action "%type%" ended: Akcja masowa "%type%" zakończona
```

## Triggering notification

To trigger your notification you need to pass it to instance of `Ergonode\Notification\Domain\Command\SendNotificationCommand` along with ids of users who should receive it. 
Then it needs to be dispatch with command bus. 
