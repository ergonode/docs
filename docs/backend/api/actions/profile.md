# Profile
----

## GET /api/v1/profile

Action returns info about logged user.

**No parameters**

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | User info         | [Profile_user](backend/api/objects/profile_user.md)                              |

**Response example**

```
{
    "id": "1d0d73c8-b5c2-5083-bbb1-f6740fa59a6d",
    "first_name": "Johnny",
    "last_name": "Bravo",
    "email": "test@ergonode.com",
    "language": "EN",
    "avatar_id": null,
    "role": "Superadmin",
    "privileges": [
        "READER_CREATE",
        "READER_READ",
        "READER_UPDATE",
        "READER_DELETE",
    ]
}
```

_______________________________________________________________________________________


## GET /api/v1/profile/log

Action which retrieves grid of logs for logged in account based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________


## GET /api/v1/profile/notifications

Action which retrieves grid of logs for logged in account based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________
