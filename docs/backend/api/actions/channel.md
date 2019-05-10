# Channel

----

## GET /api/v1/channels

Action which retrieves grid of all chennels.

## POST /api/v1/channels/generate

Action adds generate channels based on parameters.

 
**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| name      | string | yes      |      | Channel name            | channel_name |
| type      | string | yes      |      | Channel generator type  | TEST_EN_GENERATOR |

 
**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Channel generated | Channel Id |
| 400  | Bad request       | [Error](backend/api/objects/error.md)        |
| 401  | Bad credentials   | [Error](backend/api/objects/error.md)        |

**Response Example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## GET /api/v1/channels/{channel}

Action retrives channel object based on object id given.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  channel | string |    yes   | uuid   | Channel Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns channel   | [Channel](backend/api/objects/channel.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "id": "9c658fb1-a4b7-4039-bcb9-fbf20accc238",
  "name": "test",
  "connector_id": "ae8987ad-bf33-57dd-b81e-e9c12b8e85d7",
  "segment_id": "b12045c1-fe46-58e0-bb4d-bda2197bb9aa",
  "configuration": {
    "price": "landed_cost_pln",
    "weight": "gross_weight",
    "language": "PL",
    "attributes": [
      "color",
      "sieze",
      "name",
      "weight"
    ],
    "configurable": [
      {
        "included": [
          "color"
        ],
        "excluded": [
          "size"
        ]
      },
      {
        "included": [
          "color",
          "size"
        ],
        "excluded": []
      }
    ],
    "sets": {
      "default": 1
    },
    "store_code": "pl"
  }
}
```
