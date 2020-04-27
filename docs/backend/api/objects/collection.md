# Collection

**Response**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | uuid      |  Collection Id            | Yes      |
| code     |  string   |   Collection code           | Yes      |
| name     |  [Translation](backend/api/objects/translation.md)      |   Collection name           | No      |
| description    |  [Translation](backend/api/objects/translation.md)      |    Collection description       | No      |
| type_id | uuid    | Collection type id          | Yes      |
| elements     | array of [Collection element](backend/api/objects/collection_element.md)     | Collection elements      | No      |
| created_at | date time   | Time and date of collection creation         | Yes      |
| edited_at | date time   | Time and date of collection last edit         | Yes      |



**Example**
```
{
  "id": "279b1ffa-fc24-50c6-a6e5-82a5464facf7",
  "code": "product_collection_21",
  "name": {
    "EN": "English_name_21",
    "PL": "Polish_name_21"
  },
  "description": {
    "EN": "English_description_21",
    "PL": "Polish_description_21"
  },
  "type_id": "5e33f500-2558-556d-baea-63546b64a0b5",
  "elements": {
    "96310184-b6e9-41d9-9629-00c4fd0ace9d": {
      "id": "96310184-b6e9-41d9-9629-00c4fd0ace9d",
      "product_id": "48e77a5b-0dee-5aac-bcb6-b2975f1be149",
      "visible": true,
      "created_at": "2020-03-10 14:36:35"
    }
  },
  "created_at": "2020-03-10 14:36:16",
  "edited_at": "2020-03-10 14:36:35"
}
```
