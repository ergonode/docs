# Import

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Import id            | Yes      |
| name     |  string   |   Import name      | Yes      |
| status     |  string   |  Import status           | Yes      |
| reason    |  string  |        Import reason       | Yes      |
| options     | array    |  Import options (e.g file id, reader id)     | Yes      |


```
{
  "id": "ee1451a5-ba84-473e-9744-26deeba71957",
  "name": "orders.csv",
  "status": "ENDED",
  "reason": null,
  "options": {
    "file": "3a26d9ff64a0c4ac45c4c4866ae0e969.csv",
    "readerId": "46bd5fba-af45-4c7c-bc37-3e1bd4c870d6"
  }
}
```
