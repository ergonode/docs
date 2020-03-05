# Tree

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id    |  uuid | Category tree id         | Yes      |
| code    |  string | Category tree code         | Yes      |
| name    |   [Translation](backend/api/objects/translation.md) | Category tree name         | No      |
| categories    | Collection of [Tree_categories](backend/api/objects/tree_categories.md)   | Category tree categories     | No      |

**Example**

```
  {
      "id": "853d54e8-4540-5f12-8655-7f804f43e1f8",
      "code": "default",
      "name": {
          "EN": "English_name",
          "PL": "Polish_name",
          "ZH": "Chinese_name"
      },
      "categories": [
          {
              "category_id": "12b30ce4-959e-5ed7-bdd3-48c55f38098b",
              "childrens": [
                  {
                      "category_id": "6fa4bd2a-d92c-546b-913e-a3ce99bf7ef2",
                      "childrens": []
                  }
              ]
          }
      ]
  }
```
