# Designer
----

## GET /api/v1/{language}/templates

Action which retrieves grid of template objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

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
| elements  | [Template_element](backend/api/objects/template_element.md)| yes      |            |        | elements which needs to be added to your template | [Template_element](backend/api/objects/template_element.md)|
| sections  | [Template_section](backend/api/objects/template_section.md) | yes      |            |        | sections in which template is divided                  | [Template_section](backend/api/objects/template_section.md) |

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
  "id": "1f67c19f-f897-5f66-a2a6-bb338ab2dad5",
  "name": "Strix",
  "image": "Strix",
  "group_id": "418c48d3-d2c3-4c30-b627-93850c38d59c",
  "elements": [
    {
      "id": "fdcab065-efde-56ce-aaaa-864eab66f061",
      "label": "description",
      "x": 0,
      "y": 1,
      "width": 1,
      "height": 1,
      "required": false,
      "type": "TEXTAREA",
      "min_width": 1,
      "min_height": 1,
      "max_width": 4,
      "max_height": 10
    },
    {
      "id": "79ad94e6-f2ff-5fe2-9f1e-7d9314e2f3e3",
      "label": "group_sku",
      "x": 0,
      "y": 3,
      "width": 1,
      "height": 1,
      "required": false,
      "type": "TEXT",
      "min_width": 1,
      "min_height": 1,
      "max_width": 4,
      "max_height": 1
    },
    {
      "id": "96bde122-c00a-5ff4-9843-6d81a9355e0b",
      "label": "supplier_number",
      "x": 1,
      "y": 1,
      "width": 1,
      "height": 1,
      "required": false,
      "type": "TEXT",
      "min_width": 1,
      "min_height": 1,
      "max_width": 4,
      "max_height": 1
    }
  ],
  "sections": []
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

| Parameter | Type                             | Required | Constrains | Format | Additional information                            | Example |
|-----------|----------------------------------|----------|------------|--------|---------------------------------------------------|---------|
| name      | string                           | yes      |            |        | template name                                     | strix   |
| elements  | [Template_element](backend/api/objects/template_element.md)| yes      |            |        | elements which needs to be added to your template | [Template_element](backend/api/objects/template_element.md)|
| sections  | [Template_section](backend/api/objects/template_section.md) | yes      |            |        |sections in which template is divided             | [Template_section](backend/api/objects/template_section.md) |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200   | Returns template   | Template Id                                |
| 404  | Not found | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/templates/group

Action retrieves all designer template groups.

More info you can find here: [Grid](backend/api/objects/grid.md)


_______________________________________________________________________________________


## GET /api/v1/{language}/templates/types 

Action retrieves all designer template types.

More info you can find here: [Grid](backend/api/objects/grid.md)
