# Segment

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Segment Id            | Yes      |
| status       | string      |  Segment status            | Yes      |
| code       | string      |  Segment code            | Yes      |
| name     |   [Translation](backend/api/objects/translation.md)    |   Segment Name      | No      |
| description     |   [Translation](backend/api/objects/translation.md)    |   Segment Description      | No      |
| condition_set_id  | uuid      |  Condition set id            | Yes      |

```
{
  "id": "a4898f22-bcca-5842-bc78-b2401191cea8",
  "status": "NEW",
  "code": "test_segment",
  "name": {
    "EN": "English_segment_name",
    "PL": "Polish_segment_name"
  },
  "description": {
    "EN": "English_segment_name",
    "PL": "Polish_segment_name"
  },
  "condition_set_id": "6a0d9868-28cd-577f-b949-907a3932ad96"
}
```

