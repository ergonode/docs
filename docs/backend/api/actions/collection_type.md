# Collection Type



----
   
## GET /api/v1/{language}/collections/type

Action which retrieves grid of collections based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________



## POST  /api/v1/{language}/collections/type
        
Action adds collection type based on parameters

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     code      |    string      |    yes   |          collection code        |                         example_code                          |
| name   |         [Translation](backend/api/objects/translation.md)      |    no   |    Collection type name       |       {"PL" :"Polish name", "EN":"English name"}                   |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Collection type created   | Collection type Id                                 |
| 400  | Form validation error| [Error](backend/api/objects/error.md)   |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
__________


## GET /api/v1/{language}/collections/type/{type}

Action retrieves collection type object based on collection type id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection   | [Collection type](backend/api/objects/collection_type.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```json
{
  "id": "5e33f500-2558-556d-baea-63546b64a0b5",
  "code": "up-sell",
  "name": {
    "EN": "Up-sell",
    "PL": "Up-sell"
  }
}
```
__________

## PUT /api/v1/{language}/collections/type/{type}

Action which updates collection type object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection type | string |    yes   | uuid   | Collection Type Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     name      |        [Translation](backend/api/objects/translation.md)           |    no   |          collection type name       |                        {"PL" :"Polish name", "EN":"English name"}                        |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful removing collection type     | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |

_____________________________


## DELETE /api/v1/{language}/collections/type/{type}

Action deletes collection type for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   | uuid   |Language code  |    PL   |
|  collection type | uuid |    yes   |        | Collection Type Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing collection      | Empty                                   |
| 400  | Bad Request - Invalid collection id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Collection not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Collection can’t be deleted | [Error](backend/api/objects/error.md) |
