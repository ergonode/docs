# Language

----
   
## GET /api/v1/{language}/language/autocomplete

Action which retrieves list of languages based on seach value and other parameters.


**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   

**Query Parameters**

| Parameter | Description                         | Required | Data type | Allowed input                                                                             | Default value |
|-----------|-------------------------------------|----------|-----------|-------------------|---------------|
| search     | Searched value                     | No       | string      string      | null            |
| limit     | Max number of return records        | No       | int       |             |             |
| field     | Name of the column used for sorting | No       | string    | Column name  |               |
| order     | Sorting order                       | No       | string    | DESC, ASC         | DESC          |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns attribute | [Language](backend/api/objects/language.md)  |

**Response example**

```
{
        "id": "a1083663-61ad-4c1c-b979-a5aec82574df",
        "code": "DE",
        "name": "German",
        "active": false
    }
```

_______________________________________________________________________________________

## GET /api/v1/{language}/languages


Action which retrieves grid of languages objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________

## PUT /api/v1/{language}/languages

Action which updates languages


**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   



**Request body parameters**

|   Parameter  |     Type     | Required |    Additional information   |           Example           |
|:------------:|:------------:|:--------:|:---------------------------:|:---------------------------:|
|  collection    |    array    |    yes   |        List of languages             |            ["PL", "EN" ]       |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful updated languages   | Empty                        |
| 400  | Form Validation Error | [Error](backend/api/objects/error.md)                    |


_________________________________________

## PUT /api/v1/{language}/languages

Action which retrieves language data for given language code 


**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |   
|  translationLanguage | string |    yes   | Language code |    FR |   


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns attribute | [Language](backend/api/objects/language.md)  |
| 404  | Not found | [Error](backend/api/objects/error.md)  |

**Response example**

```
{
        "id": "a1083663-61ad-4c1c-b979-a5aec82574df",
        "code": "DE",
        "name": "German",
        "active": false
    }
```
