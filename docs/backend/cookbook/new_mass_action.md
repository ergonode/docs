# How to create new mass action

## Mass action processor class

Any custom mass action process must implement ```BatchActionProcessorInterface``` 

```php
namespace YourNameSpace\Infrastructure\Processor;

use Ergonode\BatchAction\Domain\Entity\BatchActionId;
use Ergonode\BatchAction\Domain\ValueObject\BatchActionMessage;
use Ergonode\BatchAction\Domain\ValueObject\BatchActionType;
use Ergonode\BatchAction\Infrastructure\Provider\BatchActionProcessorInterface;
use Ergonode\SharedKernel\Domain\AggregateId;

class YourBatchActionProcessor implements BatchActionProcessorInterface
{
    public function supports(BatchActionType $type): bool
    {
        return $type->getValue() === 'you type';
    }

    /**
     * @return BatchActionMessage[]
     */    
    public function process(BatchActionId $id, AggregateId $resourceId): array
    {
        // here implement your action for given AggregateId 
    }
}
```

If, for some reason, a mass action can't be processed for a given object, you can return information about it as array of ```BatchActionMessage``` objects
In whole batch action this object is marked processed as unsuccessful.  
