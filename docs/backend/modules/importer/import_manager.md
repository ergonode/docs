## Import process information

Every single import process has its representation in the form of information about the total amount of processor data (lines), the amount of processed data or errors that occurred

`Ergonode\Importer\Domain\Repository\ImportRepositoryInterface` has several methods to help manage this information.

* `ImportRepositoryInterface::addError(ImportId, string, array)`

This method allows you to add an error message to the selected import process

* `ImportRepositoryInterface::addLine(ImportLineId $id, ImportId $importId, string $type)` 

This method allows you to add information about the processor line(imported object)

* `ImportRepositoryInterface::markLineAsSuccess(ImportLineId $id, AggregateId $aggregateId):` 

Marks the import line as valid

* `ImportRepositoryInterface::markLineAsSuccess(ImportLineId $id, AggregateId $aggregateId)` 

Marks the import line as valid

Actual information and state for given import process can be obtained by GET `api/v1/sources/{source}/imports/{import}` endpoint.
