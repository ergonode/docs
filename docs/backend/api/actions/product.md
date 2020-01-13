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
    "id": "363b3f66-4468-5840-bdd2-07aa3a21c11c",
    "sku": "SKU_1000",
    "attributes": {
        "esa_status": {
            "type": "string",
            "value": "new"
        },
        "esa_template": {
            "type": "string",
            "value": "d346465c-a4fe-4564-a149-a0e8311013a3"
        },
        "esa_created_at": {
            "type": "string",
            "value": "2020-01-09 15:42:20"
        }
    },
    "categories": [],
    "_links": {
        "edit": {
            "href": "/api/v1/EN/products/363b3f66-4468-5840-bdd2-07aa3a21c11c",
            "method": "PUT"
        },
        "delete": {
            "href": "/api/v1/EN/products/363b3f66-4468-5840-bdd2-07aa3a21c11c",
            "method": "DELETE"
        }
    },
    "status": {
        "attribute_id": "21aa907d-35de-5425-8980-dfb6f7db6606",
        "name": "New",
        "code": "new",
        "color": "#33373E"
    },
    "workflow": [
        {
            "name": null,
            "transition": "",
            "code": "done",
            "color": "#AA00FF"
        }
    ],
    "design_template_id": "d346465c-a4fe-4564-a149-a0e8311013a3"
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
