# Collection element

**Response**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | uuid      |  Collection element Id            | Yes      |
| product_id | uuid    |    Product Id        | Yes      |
| visible |  boolean | This element visibility for other elements in collection     | Yes      |
| created_at | date time   | Time and date of collection creation         | Yes      |

**Example**

```json
{
  "id": "4adb7224-8954-4f75-9a74-caddc0f7b391",
  "product_id": "4e4fafc0-fbaf-5000-9784-7a75b992263d",
  "visible": true,
  "created_at": "2020-03-10 14:36:35"
}
```
