# Connector
----

## GET /api/v1/{language}/connector

Action which retrieves grid of all connectors based on parameters.

More info you can find here: [Grid](backend/api/objects/grid.md)

## POST /api/v1/{language}/connector/generate

Action adds connector based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| name       | string | yes      |      | Connector name            | custom_name |
| generator | string | yes      |     | Connector generator type | COMPANY_A_GENERATOR|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Create connector    | Connector Id |
| 400  | Bad Request | [Error](backend/api/objects/error.md)        |
| 401  | Bad credentials | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

______________________________________________________________________________________
