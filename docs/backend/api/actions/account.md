# Account

----


## GET /api/v1/{language}/accounts

Action which retrieves grid of accounts based on parameters.




More info you can find here: [Grid](backend/api/objects/grid.md)


## POST /api/v1/{language}/accounts

Action adds account based on parameters.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |


**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
|     email      |    string      |    yes   |       valid email adress |                         example@ergonode.pl                          |
| firstName   |    string      |    yes   |          first name         |  "John"                    |
| lastName  |    string       |    yes    |          last name  |      "Smith" |
| language  |    string       |    yes    |          language  |      "EN" |
| password  |    string       |    yes    |          password  |      "veryHardPass123" |
| passwordRepeat |    string  |    yes    |          password confirmation  |      "veryHardPass123" |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 201  | Returns account Id| "9b0ceb29-26ac-4852-a602-6e5680a3a029"      |
| 400  | Bad request         | [Error](backend/api/objects/error.md)        |


**Response Example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## GET /api/v1/{language}/accounts/{user}

Action retrieves account object based on account Id given. 

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  user | string |    yes   | uuid   | Account Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns account   | [Account](backend/api/objects/account.md)|
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response Example**

```

  "id": "a36a7743-ad18-4787-a7f4-8d2de27f85c6",
  "first_name": "John",
  "last_name": "Dove",
  "email": "matt@test.pl",
  "language": "EN",
  "avatar_id": null
}
```

## PUT /api/v1/{language}/accounts/{user}

Actions which updates account object.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  user | string |    yes   | uuid   | Account Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|



**Request body parameters**

|   Parameter  |    Type        | Required |    Additional information   |                          Example                         |
|:------------:|:--------------:|:--------:|:---------------------------:|:--------------------------------------------------------:|
| firstName   |    string      |    yes   |          first name         |  "John"                    |
| lastName  |    string       |    yes    |          last name  |      "Smith" |
| language  |    string       |    yes    |          language  |      "EN" |
| password  |    string       |    yes    |          password  |      "veryHardPass123" |
| passwordRepeat |    string  |    yes    |          password confirmation  |      "veryHardPass123" |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Account updated   | Account Id                 |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```


 ## PUT /api/v1/{language}/accounts/{user}/avatar

Action which adds avatar to account.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  user | string |    yes   | uuid   | Account Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| multimedia| string | yes      |uuid  | Multimedia Id            | 1f67c19f-f897-5f66-a2a6-bb338ab2dad5|


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Account updated   | Account Id                 |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

## PUT /api/v1/{language}/{user}/password

Action which change password for account.

**URL parameters**

| Parameter |  Type  | Required | Format |   Additional  | Example |
|:---------:|:------:|:--------:|:------:|:-------------:|:-------:|
|  language | string |    yes   |        | Language code |    PL   |
|  user | string |    yes   | uuid   | Account Id  | 683d8fc8-0d2e-5626-b973-6935c02044eb|


**formData parameters**

| Parameter | Type   | Required |Format| Additional information | Example |
|-----------|--------|----------|------|------------------------|---------|
| password  |    string       |    yes    |          password  |      "veryHardPass123" |
| passwordRepeat |    string  |    yes    |          password confirmation  |      "veryHardPass123" |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Account updated   | Account Id                 |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"id": "b0509b2f-7037-4786-a9a6-b675eac0493a"
}
```

