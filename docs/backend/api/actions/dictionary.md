# Dictionary

----

## GET /api/v1/{language}/dictionary/languages

Action retrieves dictionary collection for languages.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of languages | [Translation](backend/api/objects/translation.md)                              |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "EN": "English",
  "DE": "German",
  "PL": "Polish",
  "ZH": "Chinese"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/privileges

Action retrieves dictionary collection for privileges.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of privileges | [Privileges](backend/api/objects/privileges.md)                              |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**

```
 {
        "name": "Role",
        "description": "",
        "privileges": {
            "create": "USER_ROLE_CREATE",
            "read": "USER_ROLE_READ",
            "update": "USER_ROLE_UPDATE",
            "delete": "USER_ROLE_DELETE"
        }
    },
    {
        "name": "User",
        "description": "",
        "privileges": {
            "create": "USER_CREATE",
            "read": "USER_READ",
            "update": "USER_UPDATE",
            "delete": "USER_DELETE"
        }
    }
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/conditions

Action retrieves dictionary collection for conditions.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Query Parameters**

| Parameter | Description                         | Required | Data type | Allowed input                                                                             | Default value |
|-----------|-------------------------------------|----------|-----------|-------------------------------------------------------------------------------------------|---------------|
| group     | Condition group                     | No       | string    | segment, workflow                                                                            | segment          |


**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of conditions | Condition List                            |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
    "ATTRIBUTE_EXISTS_CONDITION": "Attribute exists",
    "NUMERIC_ATTRIBUTE_VALUE_CONDITION": "Numeric attribute has value",
    "OPTION_ATTRIBUTE_VALUE_CONDITION": "Option attribute has value",
    "TEXT_ATTRIBUTE_VALUE_CONDITION": "Text attribute has value",
    "LANGUAGE_COMPLETENESS_CONDITION": "Product translation completeness",
    "PRODUCT_COMPLETENESS_CONDITION": "Product completeness",
    "ROLE_EXACTLY_CONDITION": "User role is exactly",
    "USER_EXACTLY_CONDITION": "User is exactly"
}
```

_______________________________________________________________________________________


## GET /api/v1/{language}/dictionary/currencies

Action retrieves dictionary collection for currencies.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of currencies |[Translation](backend/api/objects/translation.md)                              |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**


```
{
  "GBP": "Pound Sterling",
  "USD": "US Dollar",
  "EUR": "Euro",
  "PLN": "Zloty",
  "RUB": "Russian Ruble"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/units

Action retrieves dictionary collection for units.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of units |[Translation](backend/api/objects/translation.md)                             |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**

```
{
  "m": "Metre (m)",
  "Kg": "Kilogram (Kg)",
  "s": "Second (s)",
  "A": "Ampere (A)",
  "K": "Kelvin (K)",
  "mol": "Mole (mol)",
  "cd": "Candela (cd)",
  "rad": "Radian (rad)",
  "sr": "Steradian (sr)",
  "Hz": "Hertz (Hz)",
  "N": "Newton (N)",
  "Pa": "Pascal (Pa)",
  "J": "Joule (J)",
  "W": "Watt (W)",
  "C": "Coulomb (C)",
  "V": "Volt (V)",
  "F": "Farad (F)",
  "Ω": "Ohm (Ω)",
  "S": "Siemens (S)",
  "Wb": "Weber (Wb)",
  "T": "Tesla (T)",
  "H": "Henry (H)",
  "°C": "Degree Celsius (°C)",
  "lm": "Lumen (lm)",
  "lx": "Lux (lx)",
  "Bq": "Becquerel (Bq)",
  "Gy": "Gray (Gy)",
  "Sv": "Sievert (Sv)",
  "kat": "Katal (kat)"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/date_format

Action retrieves dictionary collection for date formats.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of data_formats | [Translation](backend/api/objects/translation.md)                  |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
  "YYYY-MM-DD": "1999-01-31",
  "YY-MM-DD": "99-01-31",
  "DD.MM.YYYY": "31.01.1999",
  "DD.MM.YY": "31.01.99",
  "MM_DD_YY": "01/31/99",
  "MM_DD_YYYY": "01/31/1999",
  "MMMM_DD_YYYY": "January 31, 1999",
  "DD_MMMM_YYYY": "31 January 1999",
  "DD_MMM_YY": "31 Jan 99"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/image_format

Action retrieves dictionary collection for image formats.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of image_formats | [Translation](backend/api/objects/translation.md)                 |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
{
"jpg": "Jpg",
  "jpeg": "Jpeg",
  "gif": "Gif",
  "tiff": "Tiff",
  "tif": "Tif",
  "png": "Png",
  "bmp": "Bmp"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/attribute/types

Action retrieves dictionary collection attribute types.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of attribute types |[Translation](backend/api/objects/translation.md)                  |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |

**Response example**


```
{
  "TEXT": "Text",
  "NUMERIC": "Numeric",
  "PRICE": "Price",
  "UNIT": "Unit",
  "TEXTAREA": "Textarea",
  "SELECT": "Select",
  "MULTI_SELECT": "Multi select",
  "DATE": "Data",
  "IMAGE": "Image"
}
```

_______________________________________________________________________________________

## GET /api/v1/{language}/dictionary/attribute/groups

Action retrieves dictionary collection attribute groups.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns collection of attribute groups | [Attribute_group](backend/api/objects/attribute_group.md)                              |
| 404  | Not found         | [Error](backend/api/objects/error.md)        |


**Response example**

```
 {
    "id": "4977611b-4814-447d-9e2c-3020f5d7a3ea",
    "label": "Default",
    "default": true
  },
  {
    "id": "b48e9107-a1ad-4d38-90e3-2d5e8b1ed4c8",
    "label": "System",
    "default": false
  }
```

_______________________________________________________________________________________
