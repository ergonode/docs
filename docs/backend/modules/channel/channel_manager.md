## Export process information

Every single export process has its representation in the form of information about the total amount of processed data (lines) and errors that occurred.

`Ergonode\Channel\Domain\Repository\ExportRepositoryInterface` has several methods to help manage this information.

* `ExportRepositoryInterface::addError(ExportId $exportId, string $message, array $parameters = [])`

This method allows you to add an error message to the selected export process

* `ExportRepositoryInterface::addLine(ExportLineId $lineId, ExportId $exportId, AggregateId $objectId)`

This method allows you to add information about the processing line(exported object)

* `ExportRepositoryInterface::processLine(ExportLineId $lineId)`

Mark the export line as processed

Actual information and state for given export process can be obtained by GET `api/v1/channels/{channel}/exports/{export}` endpoint.
