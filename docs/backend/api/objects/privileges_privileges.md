# Privileges privileges

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| create    |  string | create role         | Yes      |
| read    |  string | read role         | Yes      |
| updated    |  string | update role         | Yes      |
| delete    |  string | delete role         | Yes      |

**Example**

```
    {
         "create": "USER_ROLE_CREATE",
         "read": "USER_ROLE_READ",
         "update": "USER_ROLE_UPDATE",
         "delete": "USER_ROLE_DELETE"
    }
```
