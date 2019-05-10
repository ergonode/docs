# Attribute

----
   
## GET /api/v1/{language}/attributes

Action which retrieves grid of attribute objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________


## GET /api/v1/{language}/attributes/{attribute}

Action retrieves attribute object based on attribute Id given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  attribute| string |    yes   | uuid   |Attribute Id  | "683d8fc8-0d2e-5626-b973-6935c02044eb" |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns attribute | [Attribute](backend/api/objects/attribute.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
  "id": "683d8fc8-0d2e-5626-b973-6935c02044eb",
  "code": "decoration_max_size_1",
  "type": "TEXT",
  "multilingual": false,
  "label": {
    "PL": "Wielość zdobienia 1"``
    },
  "groups": [
    "0c0e07e3-41c6-46ce-a128-ff938180301a"
  ]
}
```
_______________________________________________________________________________________

## POST /api/v1/{language}/attributes

Action adds attribute.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |



**Request body parameters**

|   Parameter  |                         Type                         | Required | Constrains | Format |    Additional information   |                          Response example                         |
|:------------:|:----------------------------------------------------:|:--------:|:----------:|:------:|:---------------------------:|:--------------------------------------------------------:|
|     code     |                        string                        |    yes   |            |        |        attribute code       |                           color                          |
|     type     |                        string                        |    yes   |            |        | attribute type (more types) |                          SELECT                          |
|    groups    |                         array                        |    yes   |            |        |       attribute group       |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029" ]        |
| multilingual |                         bool                         |    yes   |            |        |  is attribute multilingual  |                           true                           |
|  parameters  |         [Translation](backend/api/objects/translation.md)        |    no    |            |        |     attribute parameters    |               { "format": "YYYY-MM-DDDD" }               |
|     label    |         [Translation](backend/api/objects/translation.md)        |    yes   |            |        |       attribute label       |       {"PL" :"Polish label", "EN":"English label"}       |
|     hint     |         [Translation](backend/api/objects/translation.md)    |    no    |            |        |        attribute hint       |        {"PL" :"Polish hint", "EN":"English hint"}        |
|  placeholder |         [Translation](backend/api/objects/translation.md)        |    yes   |            |        |    attribute placeholder    | {"PL" :"Polish placeholder", "EN":"English placeholder"} |
|    options   | collections of  [Translation](backend/api/objects/translation.md)  |    no    |            |        |      attribute options      |    [ {"key": "key_1","translation": {"PL": "Option PL 1","EN": "Option EN 1"}}] |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns attribute | Attribute Id                                |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Example**

```
{
  "id": "062ad3e9-bc5c-5719-81d2-7456a43b2051"
}
```
_______________________________________________________________________________________

## PUT /api/v1/{language}/attributes/{attribute}

Action updates attribute for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        |Language code  |    PL   |
|  attribute | string |    yes   | uuid  | Attribute Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |

**Request body parameters**

|   Parameter  |                         Type                         | Required | Constrains | Format |    Additional information   |                          Response example                         |
|:------------:|:----------------------------------------------------:|:--------:|:----------:|:------:|:---------------------------:|:--------------------------------------------------------:|
|     code     |                        string                        |    yes   |            |        |        attribute code       |                           color                          |
|     type     |                        string                        |    yes   |            |        | attribute type (more types) |                          SELECT                          |
|    groups    |                         array                        |    yes   |            |        |       attribute group       |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029" ]        |
| multilingual |                         bool                         |    yes   |            |        |  is attribute multilingual  |                           true                           |
|  parameters  |         [Translation](backend/api/objects/translation.md)        |    no    |            |        |     attribute parameters    |               { "format": "YYYY-MM-DDDD" }               |
|     label    |         [Translation](backend/api/objects/translation.md)        |    yes   |            |        |       attribute label       |       {"PL" :"Polish label", "EN":"English label"}       |
|     hint     |         [Translation](backend/api/objects/translation.md)    |    no    |            |        |        attribute hint       |        {"PL" :"Polish hint", "EN":"English hint"}        |
|  placeholder |         [Translation](backend/api/objects/translation.md)        |    yes   |            |        |    attribute placeholder    | {"PL" :"Polish placeholder", "EN":"English placeholder"} |
|    options   | collections of  [Translation](backend/api/objects/translation.md)  |    no    |            |        |      attribute options      |           [ {"key": "key_1","translation": {"PL": "Option PL 1","EN": "Option EN 1"}}] |                   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns attribute | Attribute Id                                |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "id": "062ad3e9-bc5c-5719-81d2-7456a43b2051"
}
```
_______________________________________________________________________________________
<!---
## DELETE /api/v1/{language}/attributes/{attribute}

Action deletes attribute for given Id.
[ to do ]

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Attribute Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  attribute| string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing attribute      | no                                   |
| 400  | Bad Request - Invalid attribute id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Attribute not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Attribute can’t be deleted | [Error](backend/api/objects/error.md) |

**Response example**

[ to do ]

_______________________________________________________________________________________
 
--->   
## GET /api/v1/{language}/attributes/groups

Action which retrieves grid of attribute group objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

