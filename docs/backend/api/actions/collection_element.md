# Product Collection Element

   
## GET /api/v1/{language}/collections/{collection}/elements

Action which retrieves grid of collection elements for given collection based on parameters.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


More info you can find here: [Grid](backend/api/objects/grid.md)

__________________________________________



## POST  /api/v1/{language}/collections/{collection}/elements
        
Action adds collection element for given collection. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |     Example                   |
|:------------:|:--------------:|:--------:|:---------------------------:|:-----------------------------:|
|     productId      |    uuid      |    yes   |          collection sku        |            true       |
|     visible      |    boolean      |    yes   |      This element visibility for other elements in collection       |            true       |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Collection element created   | Collection element Id                                 |
| 400  | Form validation error| [Error](backend/api/objects/error.md)   |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
__________

## GET /api/v1/{language}/collections/{collection}/elements/{product}

Action retrieves collection element for given collection and product. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|
|  product id | string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection   | [Collection element](backend/api/objects/collection_element.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
 {
   "id": "4adb7224-8954-4f75-9a74-caddc0f7b391",
   "product_id": "4e4fafc0-fbaf-5000-9784-7a75b992263d",
   "visible": true,
   "created_at": "2020-03-10 14:36:35"
 }
```
__________


## PUT /api/v1/{language}/collections/{collection}/elements/{product}

Action updates collection element for given collection and product. 


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|
|  product id | string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |     Example                   |
|:------------:|:--------------:|:--------:|:---------------------------:|:-----------------------------:|
|     visible      |    boolean      |    yes   |      This element visibility for other elements in collection      |            true       |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful collection element update     | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________

## DELETE /api/v1/{language}/collections/{collection}/elements/{product}

Action deletes collection element for given collection and product. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|
|  product id | string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing collection element     | Empty                                   |
| 400  | Bad Request - Invalid collection element id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Collection element not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Collection element can’t be deleted | [Error](backend/api/objects/error.md) |


__________________________________________



## POST /api/v1/{language}/collections/{collection}/elements/multiple
        
Action adds many collection elements to given collection. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  collection id | string |    yes   | uuid   | Collection Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |     Example                   |
|:------------:|:--------------:|:--------:|:---------------------------:|:-----------------------------:|
|     segments      |    array      |    no   |      Array of segment Ids      |    "segments": ["a4898f22-bcca-5842-bc78-b2401191cea8","1bdcab91-5fc1-42c0-8a7f-4602ca9a2511"]      |
|     skus      |    array      |    no   |      Array of product Skus       |       "skus": ["a4898f22-bcca-5842-bc78-b2401191cea8","1bdcab91-5fc1-42c0-8a7f-4602ca9a2511"]   |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Collection elements  created   | Collection Id                                 |
| 400  | Form validation error| [Error](backend/api/objects/error.md)   |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
