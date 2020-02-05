# Product

**Response**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Product Id            | Yes      |
| sku     |  string   |   Product sku           | Yes      |
| attributes     | array    | Product attributes      | Yes      |
| categories| array   | Product categories          | Yes      |
| _links| link objects   | List of available links        | Yes      |
| status    |  [Status](backend/api/objects/status.md)  |    Product Status          | Yes      |
| workflow    |  list of workflows  |    workflows          | Yes      |
| design_template_id     |  string   |   Template Id           | Yes      |



**Example**
```
{
    "id": "363b3f66-4468-5840-bdd2-07aa3a21c11c",
    "sku": "SKU_1000",
    "attributes": {
        "esa_status": {
            "type": "string",
            "value": "new"
        },
        "esa_template": {
            "type": "string",
            "value": "d346465c-a4fe-4564-a149-a0e8311013a3"
        },
        "esa_created_at": {
            "type": "string",
            "value": "2020-01-09 15:42:20"
        }
    },
    "categories": [],
    "_links": {
        "edit": {
            "href": "/api/v1/EN/products/363b3f66-4468-5840-bdd2-07aa3a21c11c",
            "method": "PUT"
        },
        "delete": {
            "href": "/api/v1/EN/products/363b3f66-4468-5840-bdd2-07aa3a21c11c",
            "method": "DELETE"
        }
    },
    "status": {
        "attribute_id": "21aa907d-35de-5425-8980-dfb6f7db6606",
        "name": "New",
        "code": "new",
        "color": "#33373E"
    },
    "workflow": [
        {
            "name": null,
            "transition": "",
            "code": "done",
            "color": "#AA00FF"
        }
    ],
    "design_template_id": "d346465c-a4fe-4564-a149-a0e8311013a3"
}
```
