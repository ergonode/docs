# Tree_categories

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| category_id    |  uuid | Category id         | Yes      |
| childrens    |  Collection of [Tree_categories](backend/api/objects/tree_categories.md)   | Collection of category tree categories     | No      |

**Example**

```
  {
             "category_id": "12b30ce4-959e-5ed7-bdd3-48c55f38098b",
             "childrens": [
                 {
                     "category_id": "6fa4bd2a-d92c-546b-913e-a3ce99bf7ef2",
                     "childrens": []
                 }
             ]
         }
```
