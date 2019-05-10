# Transformer


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Transformer id            | Yes      |
| key     |  string   |   Transformer key (type)   | Yes      |
| name     |  string   |  Custom transformer name   | Yes      |
| converters    |  string  |        converters       | Yes      |



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
