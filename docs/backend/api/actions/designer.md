# Designer
----

## GET /api/v1/{language}/templates

Action which retrieves grid of template objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________

## POST /api/v1/{language}/templates

Action adds template based on parameters.


**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL |

**Request body parameters**

| Parameter | Type                             | Required | Additional information                            | Example |
|-----------|----------------------------------|----------|---------------------------------------------------|---------|
| name      | string                           | yes      | template name                                     | strix   |
| image      | uuid                           | no      | template image                                     | 683d8fc8-0d2e-5626-b973-6935c02044eb   |
| elements  | [Template_element](backend/api/objects/template_element.md)| yes      |            |        | elements which needs to be added to your template | [Template_element](backend/api/objects/template_element.md)|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Create template   | temlate Id                                |
| 400  | Form validation error | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
_______________________________________________________________________________________

## GET /api/v1/{language}/templates/{template}

Action retrieves template object based on template Id given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  template| string |    yes   | uuid   | Template Id | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Create template   | Template Id                                |
| 404  | Not found | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
    "id": "b308d11c-377e-4cd4-81d5-1f75b7c53c2e",
    "name": "Name",
    "image_id": null,
    "group_id": "418c48d3-d2c3-4c30-b627-93850c38d59c",
    "elements": [
        {
            "position": {
                "x": 0,
                "y": 0
            },
            "size": {
                "width": 2,
                "height": 1
            },
            "properties": {
                "variant": "attribute",
                "attribute_id": "e3f236d1-0e52-5804-be5b-096bbe225fda",
                "required": true
            },
            "type": "text"
        }
    ]
}
```
_______________________________________________________________________________________

## PUT /api/v1/{language}/templates/{template}

Action updates template object based on template Id and parameters given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  template| string |    yes   | uuid   | Template Id | 683d8fc8-0d2e-5626-b973-6935c02044eb|

**Request body parameters**

| Parameter | Type                             | Required | Additional information                            | Example |
|-----------|----------------------------------|----------|---------------------------------------------------|---------|
| name      | string                           | yes      | template name                                     | strix   |
| image      | uuid                           | no      | template image                                     | 683d8fc8-0d2e-5626-b973-6935c02044eb   |
| elements  | [Template_element](backend/api/objects/template_element.md)| yes      |            |        | elements which needs to be added to your template | [Template_element](backend/api/objects/template_element.md)|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204   |  No content - Successful update template    | Empty                                |
| 404  | Not found | [Error](backend/api/objects/error.md)        |

_______________________________________________________________________________________


## DELETE /api/v1/{language}/templates/{template}

Action deletes template for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  template | uuid |    yes   |        | Template  Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing template      | Empty                                   |
| 400  | Bad Request - Invalid template id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - Template not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - Template can’t be deleted | [Error](backend/api/objects/error.md) |



_______________________________________________________________________________________

## GET /api/v1/{language}/templates/group

Action retrieves all designer template groups.

More info you can find here: [Grid](backend/api/objects/grid.md)


_______________________________________________________________________________________


## GET /api/v1/{language}/templates/types 

Action retrieves all designer template types.

More info you can find here: [Grid](backend/api/objects/grid.md)
