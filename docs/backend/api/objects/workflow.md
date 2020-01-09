# Workflow


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | uuid      |  Workflow Id            | Yes      |
| code     |  string   |   Workflow code  | Yes |
| statuses     |  array   |   Workflow statuses           | Yes      |
| transitions    |  collection of  [Transition](backend/api/objects/transition.md)  |   Workflow transitions           | Yes      |
| default_status    |  string   |   code of default status           | Yes      |

**Example**

```
{
    "id": "28c67a76-5a78-515e-b333-fde01ed16095",
    "code": "default",
    "statuses": [
        "new",
        "draft",
        "to approve",
        "ready to publish",
        "to correct",
        "published"
    ],
    "transitions": {
        "7c9dd3e9-0740-4e1a-a0fe-ae1ff346c3e2": {
            "id": "7c9dd3e9-0740-4e1a-a0fe-ae1ff346c3e2",
            "from": "new",
            "to": "draft",
            "condition_set_id": null,
            "role_ids": []
        },
        "094ea767-80c1-4498-8fd6-ab13e999bc27": {
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
    },
    "default_status": "new"
}
```
