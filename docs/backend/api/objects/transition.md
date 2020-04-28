# Transition


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | uuid      |  transition Id            | Yes      |
| from     |  string   |   status code  | Yes |
| to     |  string   |    status code          | Yes      |
| condition_set_id     |  uuid   |   condition set id           | Yes      |
| role_ids     |  array   |   List of role ids           | No     |

**Example**

```
 {
     "id": "094ea767-80c1-4498-8fd6-ab13e999bc27",
     "from": "draft",
     "to": "new",
     "condition_set_id": null,
     "role_ids": [
         "1143a5e9-11ec-5b47-b881-4099d5d066a2",
         "e7451cd9-0e68-5501-97a3-d1362cc16616",
         "add26a2a-f33e-5fe6-a8fc-180e46e9185e"
     ]
 }
```
