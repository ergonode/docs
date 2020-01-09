# Product

----

## POST /api/v1/{language}/products

Action adds product based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     sku      |    string      |    yes   |          product sku        |                         sku_123                          |
| templateId   |    string      |    yes   |          template id        |  "9b0ceb29-26ac-4852-a602-6e5680a3a029"                    |
| categoryIds  |    array       |    no    |          category ids list  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029", "683d8fc8-0d2e-5626-b973-6935c02044eb" ] |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns product Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```


## GET /api/v1/{language}/products/{product}

Action retrieves product object based on product Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  product | string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns product   | [Product](backend/api/objects/product.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
   "sequence": 1,
   "events": [],
   "id": "f935325b-5492-4ff4-8646-3d1cdef3e042",
   "sku": "TRU/015M/CG",
   "design_template_id": "1f67c19f-f897-5f66-a2a6-bb338ab2dad5",
   "status": {
     "value": "DRAFT"
   },
   "version": 1,
   "attributes": {
     "2f4ed4ef-8e53-5db8-9161-560147dc459a": {
       "value": "RU_015M_CG.jpg",
       "type": "string"
     },
     "504c203c-0ce7-5b49-b560-41e2acbeed37": {
       "value": "RU_015M_MAIN.jpg",
       "type": "string"
     }
   },
   "categories": []
}
```

______________________________________________________________________________________

## PUT /api/v1/{language}/products/{product}

Action which updates product object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  product | string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     sku      |    string      |    yes   |          product sku        |                         sku_123                          |
| templateId   |    string      |    yes   |          template id        |  "9b0ceb29-26ac-4852-a602-6e5680a3a029"                    |
| categoryIds  |    array       |    no    |          category ids list  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029", "683d8fc8-0d2e-5626-b973-6935c02044eb" ] |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful product update      | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________

## DELETE /api/v1/{language}/products/{product}

Action deletes product for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  product | uuid |    yes   |        | Product Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing product      | Empty                                   |
| 400  | Bad Request - Invalid product id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Product not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Product can’t be deleted | [Error](backend/api/objects/error.md) |

_______________________________________________________________________________________


## GET /api/v1/{language}/products

Action which retrieves grid of product objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________


## GET /api/v1/{language}/products/{product}/history

Action which retrieves grid of product history objects based on parameters.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  product | uuid |    yes   |        | Product Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |



More info you can find here: [Grid](backend/api/objects/grid.md)
