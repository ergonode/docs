#  Tree

----

## GET /api/v1/{language}/trees

Action which retrieves grid of category trees based on parameters.




More info you can find here: [Grid](backend/api/objects/grid.md)

______________________________________________________________________________________

## POST /api/v1/{language}/trees

Action adds tree based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     code      |    string      |    yes   |          tree sku        |                         sku_123                          |
|     name    |         [Translation](backend/api/objects/translation.md)        |    yes   |                  catregory tree name     |       {"PL" :"Polish name", "EN":"English name"}       |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns tree Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

______________________________________________________________________________________

## GET /api/v1/{language}/trees/{tree}

Action retrieves tree object based on tree Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  tree | string |    yes   | uuid   | Tree Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns tree   | [Tree](backend/api/objects/tree.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
    "id": "853d54e8-4540-5f12-8655-7f804f43e1f8",
    "code": "default",
    "name": {
        "EN": "English_name",
        "PL": "Polish_name",
        "ZH": "Chinese_name"
    },
    "categories": [
        {
            "category_id": "12b30ce4-959e-5ed7-bdd3-48c55f38098b",
            "childrens": [
                {
                    "category_id": "6fa4bd2a-d92c-546b-913e-a3ce99bf7ef2",
                    "childrens": []
                }
            ]
        }
    ]
}
```

______________________________________________________________________________________

## PUT /api/v1/{language}/trees/{tree}

Action which updates tree object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  tree | string |    yes   | uuid   | Tree Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     name    |         [Translation](backend/api/objects/translation.md)        |    yes   |                  catregory tree name     |       {"PL" :"Polish name", "EN":"English name"}       |
| categories   |          [Tree_categories](backend/api/objects/tree_categories.md)       |    no   |          category tree categories      |      [Tree_categories](backend/api/objects/tree_categories.md)               |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful tree update      | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________
## DELETE /api/v1/{language}/trees/{tree}

Action deletes tree for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  tree | uuid |    yes   |        | Tree Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing tree      | Empty                                   |
| 400  | Bad Request - Invalid category tree id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Category tree not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Category tree can’t be deleted | [Error](backend/api/objects/error.md) |

