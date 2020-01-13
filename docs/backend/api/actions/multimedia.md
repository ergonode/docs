# Multimedia
----

## POST /api/v1/multimedia/upload

Action for uploading multimedia.

**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| upload    | file | yes      |      | upload            | photoTest.jpg |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Create multimedia    | Multimedia Id |
| 400  | Form validation error | [Error](backend/api/objects/error.md)        |

**Response Example**

```
{
  "id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## GET /api/v1/multimedia/{multimedia}

Actions retrieves multimedia object based on multimedia ID given.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  attribute| string |    yes   | uuid   | Product Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns multimedia file   | Multimedia |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |
| 400  | Bad Request         | [Error](backend/api/objects/error.md)        |

