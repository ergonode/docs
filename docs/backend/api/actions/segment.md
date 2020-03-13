# Segment
----

   
## GET /api/v1/{language}/segments

Action which retrieves grid of segments based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________


## POST  /api/v1/{language}/segments
        
Action adds segment based on parameters

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     code      |    string      |    yes   |          segment code        |                         example_code                          |
| condition_set_id  |    uuid       |    no    |          condition set id  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029"|
| name   |         [Translation](backend/api/objects/translation.md)      |    no   |         segment name        |       {"PL" :"Polish name", "EN":"English name"}                   |
| description   |         [Translation](backend/api/objects/translation.md)      |    no   |         segment description        |       {"PL" :"Polish description", "EN":"English description"}                   |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Segment created   | Segment Id                                 |
| 400  | Form validation error| [Error](backend/api/objects/error.md)   |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```


__________

## GET /api/v1/{language}/segments/{segment}

Action retrieves segment object based on segment Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  segment| string |    yes   | uuid   | Segment Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns segment   | [Segment](backend/api/objects/segment.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
  "id": "a4898f22-bcca-5842-bc78-b2401191cea8",
  "status": "NEW",
  "code": "test_segment",
  "name": {
    "EN": "English_segment_name",
    "PL": "Polish_segment_name"
  },
  "description": {
    "EN": "English_segment_name",
    "PL": "Polish_segment_name"
  },
  "condition_set_id": "6a0d9868-28cd-577f-b949-907a3932ad96"
}
```
_________

## PUT /api/v1/{language}/segments/{segment}

Action which updates segment object.


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
| condition_set_id  |    uuid       |    no    |          condition set id  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029"|
| name   |         [Translation](backend/api/objects/translation.md)      |    no   |         segment name        |       {"PL" :"Polish name", "EN":"English name"}                   |
| description   |         [Translation](backend/api/objects/translation.md)      |    no   |         segment description        |       {"PL" :"Polish description", "EN":"English description"}                   |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful segment update   | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


__________


## DELETE /api/v1/{language}/segments/{segment}

Action deletes segment for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   | uuid   |Language code  |    PL   |
|  segment | uuid |    yes   |        | Segment Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing segment      | Empty                                   |
| 400  | Bad Request - Invalid segment id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Segment not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Segment can’t be deleted | [Error](backend/api/objects/error.md) |

__________

## GET /api/v1/{language}/segments/{segment}/products

Action which retrieves grid of products based on parameters for given segment.


More info you can find here: [Grid](backend/api/objects/grid.md)
