# Reader
----

## GET /api/v1/{language}/readers

Action which retrieves grid of products based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

## POST  /api/v1/{language}/readers

Action adds READER based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**formData parameters**

| Parameter | Type   | Required | Additional information | Example |
|-----------|--------|----------|------------------------|---------|
| name       | string | yes      | Reader name            | custom_reader |
| type      | string | yes      | Reader Type       |  csv |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Create reader    | Reader Id |
| 400  | Form validation error | [Error](backend/api/objects/error.md)        |

**Response Example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
-----

## GET /api/v1/{language}/reader/{reader}

Action retrieves reader object based on reader Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  attribute| string |    yes   | uuid   | Reader Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns reader   | [Reader](backend/api/objects/reader.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
  "id": "46bd5fba-af45-4c7c-bc37-3e1bd4c870d6",
  "name": "custom_reader",
  "type": "csv",
  "configuration": [],
  "formatters": []
}
```
