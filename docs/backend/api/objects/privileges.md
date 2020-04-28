# Privileges


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| name    |  string | Privilege name         | Yes      |
| description    | string   | Privilege description       | Yes      |
| privileges    | [Privileges](backend/api/objects/privileges_privileges.md)   | Privileges list       | Yes      |

**Example**

```
    {
           "name": "Role",
           "description": "",
           "privileges": {
               "create": "USER_ROLE_CREATE",
               "read": "USER_ROLE_READ",
               "update": "USER_ROLE_UPDATE",
               "delete": "USER_ROLE_DELETE"
           }
       },
```
