# Segment
----

## GET /api/v1/{language}/segments/{segment}

Action retrieves segment object based on segment Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  segment| string |    yes   | uuid   | Segment Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns segment   | [Segment](backend/api/objects/segment.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
  "id": "9b3533f9-3596-436a-8bf9-73b795c3e8e9",
  "name": "segment name"
}
```

## POST /api/v1/{language}/segments

In future this action would create segment based on parameters given.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     name      |    string      |    yes   |          segment name        |     custom_name                          |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns segment Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## POST /api/v1/{language}/segments/generate
        
This action creates segment based on segment generator.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| name       | string | yes      |      | Segment name            | custom_name |
| type | string | yes      |  | Segment generator type         | GENERATOR_NAME|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns generated segment Id    | Segment Id |
| 404  | Not found | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
