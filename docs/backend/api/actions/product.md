# Product
----
## GET /api/v1/{language}/templates

Action which retrieves grid of products based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

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


## GET /api/v1/{language}/product/{product}

Action retrieves product object based on product Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  attribute| string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


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



## POST /api/v1/{language}/product/

Action adds product based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| sku       | string | yes      |      | Product Sku            | TNE/O90014/SZ1 |
| templateId| string | yes      |uuid  | Temlate Id            | 1f67c19f-f897-5f66-a2a6-bb338ab2dad5|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Create product    | Product Id |
| 400  | Form validation error | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

______________________________________________________________________________________

## PUT /api/v1/{language}/products/{product}

Action which updates product object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  attribute| string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     sku      |    string      |    yes   |          product sku        |                         sku_123                          |
| templateId   |    string      |    yes   |          template id        |  "9b0ceb29-26ac-4852-a602-6e5680a3a029"                    |
| categoryIds  |    array       |    no    |          category ids list  |        [ "9b0ceb29-26ac-4852-a602-6e5680a3a029", "683d8fc8-0d2e-5626-b973-6935c02044eb" ] |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Product updated   | Product Id                 |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
