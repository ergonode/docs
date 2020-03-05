# Status

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | uuid      |  Status Id            | Yes      |
| code     |  string   |   Status code  | Yes |
| color     |  string   |    status color in hex           | Yes      |
| name     |   [Translation](backend/api/objects/translation.md)     |   name translation         | No      |
| description     |   [Translation](backend/api/objects/translation.md)     |  description translation  | No      |

**Example**

```
{
    "id": "163081ad-1ea6-5c1a-b3aa-92cebf07a179",
    "code": "to correct",
    "color": "#C62828",
    "name": {
        "EN": "To correct",
        "PL": "Do poprawy"
    },
    "description": {
        "EN": "To correct",
        "PL": "Do poprawy"
    }
}
```
