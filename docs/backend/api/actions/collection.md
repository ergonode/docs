# Product Collection


----
   
## GET /api/v1/{language}/collections

Action which retrieves grid of collections based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________



## POST  /api/v1/{language}/collections/
        
Action adds collection based on parameters

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     code      |    string      |    yes   |          collection code        |                         example_code                          |
| name   |         [Translation](backend/api/objects/translation.md)      |    no   |         Collection name        |       {"PL" :"Polish name", "EN":"English name"}                   |
| description   |         [Translation](backend/api/objects/translation.md)      |    no   |         Collection description        |       {"PL" :"Polish description", "EN":"English description"}                   |
| typeId  |    uuid       |    yes    |          collection type id  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029"|



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Collection created   | Collection Id                                 |
| 400  | Form validation error| [Error](backend/api/objects/error.md)   |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
__________


## GET /api/v1/{language}/collection/{collection}

Action retrieves collection object based on collection id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection   | [Collection](backend/api/objects/collection.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
  "id": "279b1ffa-fc24-50c6-a6e5-82a5464facf7",
  "code": "product_collection_21",
  "name": {
    "EN": "English_name_21",
    "PL": "Polish_name_21"
  },
  "description": {
    "EN": "English_description_21",
    "PL": "Polish_description_21"
  },
  "type_id": "5e33f500-2558-556d-baea-63546b64a0b5",
  "elements": {
    "96310184-b6e9-41d9-9629-00c4fd0ace9d": {
      "id": "96310184-b6e9-41d9-9629-00c4fd0ace9d",
      "product_id": "48e77a5b-0dee-5aac-bcb6-b2975f1be149",
      "visible": true,
      "created_at": "2020-03-10 14:36:35"
    }
  },
  "created_at": "2020-03-10 14:36:16",
  "edited_at": "2020-03-10 14:36:35"
}
```
__________

## PUT /api/v1/{language}/collections/{collection}

Action which updates collection object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     sku      |    string      |    yes   |          collection sku        |                         sku_123                          |
| templateId   |    string      |    yes   |          template id        |  "9b0ceb29-26ac-4852-a602-6e5680a3a029"                    |
| categoryIds  |    array       |    no    |          category ids list  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029", "683d8fc8-0d2e-5626-b973-6935c02044eb" ] |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful collection update  | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________

## DELETE /api/v1/{language}/collections/{collection}

Action deletes collection for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   | uuid   |Language code  |    PL   |
|  collection | uuid |    yes   |        | Collection Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing collection      | Empty                                   |
| 400  | Bad Request - Invalid collection id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Collection not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Collection can’t be deleted | [Error](backend/api/objects/error.md) |
