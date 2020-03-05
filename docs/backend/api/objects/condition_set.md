# Condition set


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Condition set Id            | Yes      |
| conditions     |  list of conditions   |   Condition Objects           | Yes      |



**Example**

```
{
    "id": "5f751123-581c-478b-ab38-59572c862cf0",
    "conditions": [
        {
            "type": "OPTION_ATTRIBUTE_VALUE_CONDITION",
            "attribute": "e45ec75b-44e2-5dd2-a558-51ed3d0af06f",
            "value": "test"
        }
    ]
}
```
