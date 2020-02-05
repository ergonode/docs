# Workflow

----

## GET /api/v1/{language}/workflow/default

Action which retrieves default workflow

 **URL parameters**
 
 | Parameter |  Type  | Required |   Additional  | Example |
 |:---------:|:------:|:--------:|:-------------:|:-------:|
 |  language | string |    yes   | Language code |    PL   |
 
 **Response**
 
 | Code | Description       | Response                                    |
 |------|-------------------|---------------------------------------------|
 | 200  | Returns workflow   | [Workflow](backend/api/objects/workflow.md)|
 | 404  | Not found         | [Error](backend/api/objects/error.md)        |
 
 
 **Response example**
 
 ```
 {
     "id": "28c67a76-5a78-515e-b333-fde01ed16095",
     "code": "default",
     "statuses": [
         "new",
         "draft",
         "to approve",
         "ready to publish",
         "to correct",
         "published"
     ],
     "transitions": {
         "7c9dd3e9-0740-4e1a-a0fe-ae1ff346c3e2": {
             "id": "7c9dd3e9-0740-4e1a-a0fe-ae1ff346c3e2",
             "from": "new",
             "to": "draft",
             "condition_set_id": null,
             "role_ids": []
         }
     },
     "default_status": "new"
 }
 ```

______________________________________________________________________________________

## PUT /api/v1/{language}/workflow/default

Action updates default workflow

**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     code      |    string      |    yes   |          status code        |                         in progress                          |
| statuses   |    array  |    no   |          workflow statuses       |   "statuses": ["new", "draft", "to approve", "ready to publish", "to correct", "published" ] |
| transitions  |   array    |    no    |          workflow transitions  |      [Transition](backend/api/objects/transition.md) |

 
 
 **Response**
 
 | Code | Description       | Response                                    |
 |------|-------------------|---------------------------------------------|
 | 204  | No content - Successful workflow update      | Empty                                   |
 | 400  | form validation error         | [Error](backend/api/objects/error.md)        |
 
 

 
______________________________________________________________________________________

##POST /api/v1/{language}/workflow

Action adds workflow based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     code      |    string      |    yes   |          status code        |                         in progress                          |
| statuses   |    array  |    no   |          workflow statuses       |   "statuses": ["new", "draft", "to approve", "ready to publish", "to correct", "published" ] |
| transitions  |   array    |    no    |          workflow transitions  |      [Transition](backend/api/objects/transition.md) |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns workflow Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```


______________________________________________________________________________________

## PUT /api/v1/workflow/default/status/{status}/default

Action which updates default status

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  status | string |    yes   | uuid   | status Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|

**Response**
 
 | Code | Description       | Response                                    |
 |------|-------------------|---------------------------------------------|
 | 204  | No content - Successful default status update      | Empty                                   |
 | 400  | form validation error         | [Error](backend/api/objects/error.md)        |


 
______________________________________________________________________________________


## GET /api/v1/{language}/workflow/default/transitions/{source}/{destination}

Action which retrieves transition based on given source and destination status

*URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |
|  source | string |    yes   | Source status id  | 1143a5e9-11ec-5b47-b881-4099d5d066a2 |
|  destination | string |    yes | Destination status id  | 1253f558-e921-440e-8ae5-15104b886859 |

 **Response**
 
 | Code | Description       | Response                                    |
 |------|-------------------|---------------------------------------------|
 | 200  | Returns transition   | [Transition](backend/api/objects/transition.md)|
 | 404  | Not found         | [Error](backend/api/objects/error.md)        |
 
 
 **Response example**
 
 ```
 {
     "id": "094ea767-80c1-4498-8fd6-ab13e999bc27",
     "from": "draft",
     "to": "new",
     "condition_set_id": null,
     "role_ids": [
         "1143a5e9-11ec-5b47-b881-4099d5d066a2",
         "e7451cd9-0e68-5501-97a3-d1362cc16616",
         "add26a2a-f33e-5fe6-a8fc-180e46e9185e"
     ]
 }
 ```


______________________________________________________________________________________

## PUT  /api/v1/{language}/workflow/default/transitions/{source}/{destination}

Action which updates transitions

*URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |
|  source | string |    yes   | Source status id  | 1143a5e9-11ec-5b47-b881-4099d5d066a2 |
|  destination | string |    yes | Destination status id  | 1253f558-e921-440e-8ae5-15104b886859 |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
| condition_set  |   uuid    |    no    |          condition set  |     ["1143a5e9-11ec-5b47-b881-4099d5d066a2" |
| roles  |   array    |    no    |          list of role ids  |     "roles": ["1143a5e9-11ec-5b47-b881-4099d5d066a2","1253f558-e921-440e-8ae5-15104b886859"] |



______________________________________________________________________________________



## DELETE /api/v1/{language}/workflow/default/transitions/{source}/{destination}

Action deletes transition for given statuses.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   | uuid   |Language code  |    PL   |
|  source | string |    yes   | uuid |Source status id  | 1143a5e9-11ec-5b47-b881-4099d5d066a2 |
|  destination | string |    yes | uuid | Destination status id  | 1253f558-e921-440e-8ae5-15104b886859 |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing transition      | Empty                                   |
| 400  | Bad Request - Invalid status id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - status not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - status can’t be deleted | [Error](backend/api/objects/error.md) |



______________________________________________________________________________________

## GET /api/v1/{language}/workflow/default/transitions

Action which retrieves grid of transitions objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________

## POST /api/v1/{language}/workflow/default/transitions

Action adds transition based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|  source | string |    yes   | Source status id  | 1143a5e9-11ec-5b47-b881-4099d5d066a2 |
|  destination | string |    yes | Destination status id  | 1253f558-e921-440e-8ae5-15104b886859 |
| condition_set  |   uuid    |    no    |          condition set  |     ["1143a5e9-11ec-5b47-b881-4099d5d066a2"] |
| roles  |   array    |    no    |          list of role ids  |     "roles": ["1143a5e9-11ec-5b47-b881-4099d5d066a2","1253f558-e921-440e-8ae5-15104b886859"] |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns status Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

_______________________________________________________________________________________

   
## POST /api/v1/{language}/status

Action adds status based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     color      |    string      |    yes   |          color in hex        |                         ff0000                          |
|     code      |    string      |    yes   |          status code        |                         in progress                          |
| name   |    [Translation](backend/api/objects/translation.md)      |    no   |          status name        |   {"PL" :"Polish name", "EN":"English name"}                |
| description  |    [Translation](backend/api/objects/translation.md)       |    no    |          status description  |      {"PL" :"Polish description", "EN":"English description"} |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns status Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/status/{status}

Action retrieves status object based on status Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  status | string |    yes   | uuid   | status Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns status   | [Status](backend/api/objects/status.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
    "id": "163081ad-1ea6-5c1a-b3aa-92cebf07a179",
    "code": "to correct",
    "color": "#C62828",
    "name": {
        "EN": "To correct",
        "PL": "Do poprawy"
    },
    "description": {
        "EN": "To correct",
        "PL": "Do poprawy"
    }
}
```

______________________________________________________________________________________

## PUT /api/v1/{language}/status/{status}

Action which updates status object.


**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  status | string |    yes   | uuid   | status Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|




**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     color      |    string      |    yes   |          color in hex        |                         ff0000                          |
|     code      |    string      |    yes   |          status code        |                         in progress                          |
| name   |    [Translation](backend/api/objects/translation.md)      |    no   |          status name        |   {"PL" :"Polish name", "EN":"English name"}                |
| description  |    [Translation](backend/api/objects/translation.md)       |    no    |          status description  |      {"PL" :"Polish description", "EN":"English description"} |



**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 204  | No content - Successful status update      | Empty                                   |
| 400  | form validation error         | [Error](backend/api/objects/error.md)        |


_______________________________________________________________________________________

## DELETE /api/v1/{language}/status/{status}

Action deletes status for given Id.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Response example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  status | uuid |    yes   |        | status Id  |    683d8fc8-0d2e-5626-b973-6935c02044eb   |
|  language | string |    yes   | uuid   |Language code  |    PL   |

**Response**

| Code | Description                                     | Response                             |
|------|-------------------------------------------------|--------------------------------------|
| 204  | No content - Successful removing status      | Empty                                   |
| 400  | Bad Request - Invalid status id              | [Error](backend/api/objects/error.md) |
| 404  | Not found - status not exists                | [Error](backend/api/objects/error.md) |
| 405  | Method Not Allowed - status can’t be deleted | [Error](backend/api/objects/error.md) |

_______________________________________________________________________________________


## GET /api/v1/{language}/status

Action which retrieves grid of status objects based on parameters.


More info you can find here: [Grid](backend/api/objects/grid.md)

_______________________________________________________________________________________
