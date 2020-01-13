# Comment

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id     |  string   |   Comment Id           | Yes      |
| author_id       | string      |  Author id            | Yes      |
| object_id     |  string   |   Commented object id           | Yes      |
| created_at   |  date  |     Creation Date         | Yes      |
| edited_at    | date   |  Edition date           | Yes      |
| content     | string  |  Comment content            | Yes      |



**Example**

```
{
    "id": "0f27069f-0b2f-455a-9e46-b31a276c92e6",
    "author_id": "1d0d73c8-b5c2-5083-bbb1-f6740fa59a6d",
    "object_id": "d48a1e58-4bf1-5014-9cc6-b879e5f044d0",
    "created_at": "2020-01-10 16:41:37",
    "edited_at": "2020-01-10 16:43:13",
    "content": "example comment"
}
```
