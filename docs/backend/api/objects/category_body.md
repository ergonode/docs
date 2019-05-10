# Category body

**Request**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| code     |  string   |   Category Code           | Yes      |
| name     |  [Translation](backend/api/objects/translation.md)   |   Attribute Name  | No |

**Example**

```
{
  "code": "category_code_1",
  "name": {
    "DE": "Name DE",
    "EN": "Name EN"
  }
}
```
