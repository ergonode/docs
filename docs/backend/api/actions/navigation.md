# Navigation
----

## GET /api/v1/profile

Action returns info about logged user.

**No parameters**

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | User info         | [Navigation_user](backend/api/objects/navigation_user.md)                              |

**Response example**

```
{
 "id": "2404385c-e7c8-40f9-a393-084d16847d7f",
  "first_name": "Jon",
  "last_name": "Dove",
  "email": "test@bold.net.pl",
  "language": "EN",
  "avatar_id": null
}
```

_______________________________________________________________________________________
