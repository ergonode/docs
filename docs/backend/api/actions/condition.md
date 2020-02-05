# Condition

----


## POST /api/v1/{language}/conditionsets

Action adds conditionSet based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     conditions      |    array of objects      |    yes   |          conditionSet objects depends on condition type        |                  [{"type": "OPTION_ATTRIBUTE_VALUE_CONDITION", "attribute": "e45ec75b-44e2-5dd2-a558-51ed3d0af06f", "value": "test"}]                     |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns conditionSet Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```


## GET /api/v1/{language}/conditionsets/{conditionSet}

Action retrieves conditionSet object based on conditionSet Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  conditionSet | string |    yes   | uuid   | ConditionSet Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns conditionSet   | [Condition set](backend/api/objects/condition_set.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

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

______________________________________________________________________________________

## PUT /api/v1/{language}/conditionsets/{conditionSet}

Action which updates conditionSet object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  conditionSet | string |    yes   | uuid   | ConditionSet Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     conditions      |    array of objects      |    yes   |          conditionSet objects depends on condition type        |                  [{"type": "OPTION_ATTRIBUTE_VALUE_CONDITION", "attribute": "e45ec75b-44e2-5dd2-a558-51ed3d0af06f", "value": "test"}]                     |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful conditionSet update      | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________

## DELETE /api/v1/{language}/conditionsets/{conditionSet}

Action deletes conditionSet for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  conditionSet | uuid |    yes   |        | ConditionSet Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing conditionSet      | Empty                                   |
| 400  | Bad Request - Invalid conditionSet id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - ConditionSet not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - ConditionSet can’t be deleted | [Error](backend/api/objects/error.md) |

_______________________________________________________________________________________


## GET /api/v1/{language}/conditions/{condition}


Action retrieves conditions object based on condition Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  condition | string |    yes   | uuid   | Condition Code  | OPTION_ATTRIBUTE_VALUE_CONDITION |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns condition   | Condition object |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
    "type": "OPTION_ATTRIBUTE_VALUE_CONDITION",
    "name": "Option attribute has value",
    "phrase": "Attribute [attribute] has option [value]",
    "parameters": [
        {
            "name": "attribute",
            "type": "SELECT",
            "options": {
                "e45ec75b-44e2-5dd2-a558-51ed3d0af06f": "code_41",
                "39f3b186-0407-5755-a2bc-60b3e22b7a09": "code_42",
                "d49ffcc1-2880-5a1f-bdb6-1955d3015d22": "code_43",
                "0be4064c-d1d1-5a17-8328-5e0389ccc387": "code_44",
                "6f371c67-21f3-5b80-8c9d-41b09b64e462": "code_45",
                "af274203-ce99-5ab2-b589-a27dd8831719": "code_46",
                "8cefb378-f5ab-5f56-bd23-d9072dc6280e": "code_47",
                "dea99e98-1d41-58c0-a4a0-6f9905cdd74c": "code_48",
                "39c65d21-cc06-55b8-a5ee-c6ef0ecf7562": "code_49",
                "d48a1e58-4bf1-5014-9cc6-b879e5f044d0": "code_50"
            }
        },
        {
            "name": "value",
            "type": "TEXT"
        }
    ]
}
```

