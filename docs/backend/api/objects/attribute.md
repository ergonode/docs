# Attribute

**Response**

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Attribute Id            | Yes      |
| code     |  string   |   Attribute Code           | Yes      |
| type     |  string   |   Attribute Type           | Yes      |
| label    |  array  |     [Translation](backend/api/objects/translation.md)          | Yes      |
| hint     | array    |  [Translation](backend/api/objects/translation.md)            | Yes      |
| placeholder     | array  |  [Translation](backend/api/objects/translation.md)            | Yes      |
| multilingual| bool   |  Is attribute Multilingual (if yes attr can be translated)           | Yes      |
| groups   |  array    |  To what groups attribute belongs           | Yes      |



**Example**

```
{
  "id": "c33ad15f-9719-53c5-bba7-22ebee12855e",
  "code": "code_1",
  "type": "TEXT",
  "label": {
    "PL": "Polish_label_1",
    "EN": "English_label_1",
    "ZH": "Chinese_label_1"
  },
  "hint": {
    "PL": "Polish_hint_1",
    "EN": "English_hint_1",
    "ZH": "Chinese_hint_1"
  },
  "placeholder": {
    "PL": "Polish_placeholder_1",
    "EN": "English_placeholder_1",
    "ZH": "Chinese_placeholder_1"
  },
  "multilingual": true,
  "groups": []
}
```
