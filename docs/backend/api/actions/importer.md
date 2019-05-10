# Importer
----

## GET /api/v1/{language}/imports

Action which retrieves grid of imports based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

## GET /api/v1/{language}/imports/{import}

Action retreives import object based on object Id given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  import| string |    yes   | uuid   | import Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns import   | [Import](backend/api/objects/import.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |



**Response example**

```
{
  "id": "ee1451a5-ba84-473e-9744-26deeba71957",
  "name": "products.csv",
  "status": {
    "value": "ENDED"
  },
  "reason": null,
  "options": {
    "file": "3a26d9ff64a0c4ac45c4c4866ae0e969.csv",
    "readerId": "46bd5fba-af45-4c7c-bc37-3e1bd4c870d6"
  }
}
```

## /api/v1/{language}/imports/upload

Action in which you can upload import file.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| transformer  | string | yes      | uuid| transformer generator Id | 46bd5fba-af45-4c7c-bc37-3e1bd4c870d6|
| reader | string | yes      |uuid  | reader Id            | 1f67c19f-f897-5f66-a2a6-bb338ab2dad5|
| action | string | yes      |  | Processor action            | 1f67c19f-f897-5f66-a2a6-bb338ab2dad5|
| upload | file | yes      |  | The field used to upload file and create import            | 1f67c19f-f897-5f66-a2a6-bb338ab2dad5|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Import id    | Import Id |
| 400  | Form validation error | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
