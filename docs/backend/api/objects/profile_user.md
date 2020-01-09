# Navigation user

**Response**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  User Id            | Yes      |
| first_name     |  string   |   User First name           | Yes      |
| last_name     |  string   |   User Last Name          | Yes      |
| email |  string  |    User Email       | Yes      |
| language    | string    | User Language            | Yes      |
| avatar_id     | string    | User Avatar Id             | Yes      |
| role     | string    | User Role             | Yes      |
| privileges     | array    | List of user privileges             | Yes      |


**Example**
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
