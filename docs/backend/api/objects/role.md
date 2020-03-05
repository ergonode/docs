# Role


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | uuid      |  Role Id            | Yes      |
| name     |  string   |   Role name  | Yes |
| description     |  string   |   Role description           | Yes      |
| privileges     |  array   |   List of privileges           | Yes      |
| hidden     |  boolean   |   Role visibility           | Yes      |

**Example**

```
{
    "id": "b7002ff2-6e18-41fc-9dfe-d783c4dc0b72",
    "name": "Test comment role (88601438-a70d-49ca-90c7-96f1fd89f3f5)",
    "description": "Test comment role",
    "privileges": [
        "PRODUCT_CREATE",
        "PRODUCT_UPDATE",
        "PRODUCT_READ",
        "PRODUCT_DELETE"
    ],
    "hidden": false
}
```
