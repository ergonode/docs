# Category

----
   
## GET /api/v1/{language}/categories

Action which retrieves grid of categories based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________


## POST  /api/v1/{language}/categories
        
Action adds category based on parameters

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   


**Request body parameters**

|   Parameter  |                         Type                         | Required | Constrains | Format |    Additional information   |                          Response example                         |
|:------------:|:----------------------------------------------------:|:--------:|:----------:|:------:|:---------------------------:|:--------------------------------------------------------:|
|    code   | string |    yes    |            |        |     category code      |    "category_code"
|    name   | [Translation](backend/api/objects/translation.md)  |    yes    |            |        |      category names      |          {"PL" :"Polish name", "EN":"English name"}  |                   |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Create category   | Category Id                                 |
| 400  | Form validation error| [Error](backend/api/objects/error.md)   |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
_______________________________________________________________________________________

## GET  /api/v1/{language}/categories/{category}


Action retrieves category object based on category Id given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        |Language code  |    PL   |
|  category | string |    yes   | uuid   | Category Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns attribute | [Category](backend/api/objects/category.md)  |
| 404  | Not found         | [Error](backend/api/objects/error.md)      |

**Response example**

```
{
  "id": "ee39b060-dc94-4214-b115-7a5810096314",
  "name": {
    "PL": "spodnie"
  },
  "code": "code_6"
}
```
_______________________________________________________________________________________

## PUT  /api/v1/{language}/categories/category/{category}

Action updates category based on category Id given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        |Language code  |    PL   |
|  category | string |    yes   | uuid   | Category Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |

**Request body parameters**

|   Parameter  |                         Type                         | Required |    Additional information   |                          Example                         |
|:------------:|:----------------------------------------------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     body     |[Category_body](backend/api/objects/category_body.md)|    yes   | Object containing name translations|{"name": { "DE": "Name DE","EN": "Name EN"}} |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  |No content - Successful update category | Empty |
| 400  | Form validation error| [Error](/api/objects/error.md)      |

_______________________________________________________________________________________


## DELETE /api/v1/{language}/categories/category/{category}

Action deletes category for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  category | uuid |    yes   |        | Category Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing category      | Empty                                   |
| 400  | Bad Request - Invalid category id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Category not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Category can’t be deleted | [Error](backend/api/objects/error.md) |

