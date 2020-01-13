# Comment

----


## POST /api/v1/{language}/comments

Action adds comment based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     content      |    string      |    yes   |          comment content        |                         some comment                          |
| object_id   |    string      |    yes   |          commented object Id        |  "9b0ceb29-26ac-4852-a602-6e5680a3a029"                    |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns comment Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```


## GET /api/v1/{language}/comments/{comment}

Action retrieves comment object based on comment Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  comment | string |    yes   | uuid   | Comment Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns comment   | [Comment](backend/api/objects/comment.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
    "id": "0f27069f-0b2f-455a-9e46-b31a276c92e6",
    "author_id": "1d0d73c8-b5c2-5083-bbb1-f6740fa59a6d",
    "object_id": "d48a1e58-4bf1-5014-9cc6-b879e5f044d0",
    "created_at": "2020-01-10 16:41:37",
    "edited_at": "2020-01-10 16:43:13",
    "content": "example commeeeeent"
}
```

______________________________________________________________________________________

## PUT /api/v1/{language}/comments/{comment}

Action which updates comment object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  comment | string |    yes   | uuid   | Comment Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     content      |    string      |    yes   |          comment content        |                         some comment                          |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful comment update      | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________

## DELETE /api/v1/{language}/comments/{comment}

Action deletes comment for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  comment | uuid |    yes   |        | Comment Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing comment      | Empty                                   |
| 400  | Bad Request - Invalid comment id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Comment not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Comment can’t be deleted | [Error](backend/api/objects/error.md) |

_______________________________________________________________________________________


## GET /api/v1/{language}/comments

Action which retrieves grid of comment objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)
