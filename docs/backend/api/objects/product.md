# Product

**Response**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Product Id            | Yes      |
| sku     |  string   |   Product sku           | Yes      |
| design_template_id     |  string   |   Template Id           | Yes      |
| status    |  array  |    Product Status          | Yes      |
| version | int    | Product Version          | Yes      |
| attributes     | array    | Product attributes      | Yes      |
| categories| array   | Product categories          | Yes      |



**Example**
```
{
  "id": "b1a53322-3054-4ef0-9855-a01127549fe1",
  "sku": "SKU_470290254_94",
  "design_template_id": "4d07dad6-cde3-4d4d-aac8-1e510bc4bdf4",
  "status": {
    "value": "DRAFT"
  },
  "version": 1,
 "attributes": {
    "color": {
      "value": {
        "EN": "Green"
      },
      "type": "translation"
    },
    "pattern": {
      "value": {
        "EN": "plane"
      },
      "type": "translation"
    },
  "categories": []
  }
}
```
