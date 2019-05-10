# Transformer
----

## POST /api/v1/transformers/create

In future this action would create transformer based on parameters given.

**formData parameters**

| Parameter | Type   | Required | Additional information | Example |
|-----------|--------|----------|------------------------|---------|
| name      | string | yes      | Transformer name          | custom_name  |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns transfer Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Bad request         | [Error](backend/api/objects/error.md)        |
| 401  | Bad credentials         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## POST /api/v1/transformers/generate

This action creates transformer based on transformer generator.

**formData parameters**

| Parameter | Type   | Required | Additional information | Example |
|-----------|--------|----------|------------------------|---------|
| name      | string | yes      | Transformer name          | custom_name  |
| type      | string | yes      | Transformer generator type          | EXAMPLE_TRANSFORMER  |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns transfer Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Bad request         | [Error](backend/api/objects/error.md)        |
| 401  | Bad credentials         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## GET /api/v1/transformers/{transformer}

Action retreives transformer object based on transformer Id given.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  transformer| string |    yes   | uuid   | Transformer Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns transformer   | [Transformer](backend/api/objects/transformer.md)|
| 400  | Bad request        | [Error](backend/api/objects/error.md)        |
| 401  | Bad credentials         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
  "id": "e1f5f04a-fdb8-5f60-aafb-e5d0bec47fd2",
  "key": "EXAMPLE_TRANSFORMER",
  "name": "custom_name",
  "converters": {
    "__default": {
      "sku": {
        "field": "CustomItemCode",
        "type": "text"
      }
    },
    "values": {
      "availability_test": {
        "field": "Availability_QTY_test1",
        "type": "text"
      },
      "availability_test2": {
        "field": "Availability_QTY_test2",
        "type": "text"
      }
    }
  }
}
```

## POST /api/v1/processors

Action creates processor based on based on parameters given.
        
**formData parameters**

| Parameter | Type   | Required | Additional information | Example |
|-----------|--------|----------|------------------------|---------|
| import      | string | yes      | Importer Id         | ee1451a5-ba84-473e-9744-26deeba71957  |
| transformer      | string | yes      | Transformer id          | ee1451a5-ba84-473e-9744-26deeba71957  |
| action      | string | yes      | Processor action        | ATTRIBUTE  |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns processor Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Bad request        | [Error](backend/api/objects/error.md)        |
| 401  | Bad credentials         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```
