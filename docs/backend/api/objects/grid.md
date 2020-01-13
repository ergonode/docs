# Grid

Grid is used in all application modules which are able to show data.
It is designed to be versatile as much as possible. 
Once you are doing request for grid you are using following parameters to configure what data you want retrieve.

**URL parameters**

| Parameter |  Type  | Required |   Additional  | Example |
|:---------:|:------:|:--------:|:-------------:|:-------:|
|  language | string |    yes   | Language code |    PL   |

**Query Parameters**

| Parameter | Description                         | Required | Data type | Allowed input                                                                             | Default value |
|-----------|-------------------------------------|----------|-----------|-------------------------------------------------------------------------------------------|---------------|
| limit     | Max number of return records        | No       | int       |  \>= 0 , < 300                                                                            | 50            |
| Offset    | First record number                 | No       | int       |  \>= 0                                                                                    | 0             |
| field     | Name of the column used for sorting | No       | string    | Column name                                                                               |               |
| order     | Sorting order                       | No       | string    | DESC, ASC                                                                                 | DESC          |
| columns   | Column list                         | No       | string    | Comma separated list of columns                                                           |               |
| filter    | List of filters                     | No       | json      | column_name_1=filtered_value_1;column_name_2=filtered_value_2                             |               |
| show      | Data scope which would be returned. | No       | string    | Comma separated list of parameters:COLUMN - column configurationDATA - collection of data | COLUMN, DATA  |

**Response**

| Key           | Description                                                                                                                                                                         | Required |
|---------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|----------|
| columns       | Column configuration(more info see below)                                                                                                                                           | Yes      |
| collection    | Collection of data which will be displayed. Element contains column identifier - key, and values which would be shown on grid. Values can be text or array it depends on column type. | Yes      |
| configuration | Grid configuration parameters collection                                                                                                                                            | Yes      |
| offset        | First record number                                                                                                                                                                 | Yes      |
| limit         | Number of return records                                                                                                                                                            | Yes      |
| count         | Total number of records                                                                                                                                                             | Yes      |
| filtered      | Filtered line count                                                                                                                                                                 | Yes      |

**Columns**

Columns object contains list of columns with their configuration.

| Key            | Description                                 | Required | Additional information                                                               |
|----------------|---------------------------------------------|----------|--------------------------------------------------------------------------------------|
| id             | Field Id                                    | Yes      | Used also as filter parameter - unique                                               |
| label          | Column label                                | Yes      |                                                                                      |
| type           | Column type                                 | Yes      | Define type of data in column (TEXT, BOOL, INTEGER, COLLECTION)                      |
| width          | Column width                                | Optional | Define column width. Once empty - automatic width                                    |
| filter         | Collection of parameters used for filtering | Optional | Once empty - no filters for this column                                             |
| filter.type    | Filter type                                 | Yes      | Available input - TEXT, SELECT, MULTI_SELECT                                         |
| filter.options | List of options for given filter            | Optional | Applicable only for filter.type = SELECT or MULTI_SELECT                            |
| visible        | Column visibility                           | Yes      |                                                                                      |
| editable       | Column editability                          | Yes      | if in grid configuration allow_column_edit = false this parameter should be ignored |

**Configuration**

Configuration object contains configuration parameters and it is always key-value pair.

|      Parameter      | Type    | default | Description                                 |
|-------------------  |---------|---------|---------------------------------------------|
| allow_column_resize | boolean | false   | If true, column size can be changed by user |
| allow_column_edit   | boolean | false   | If true, column can be edited by user       |
| allow_column_move   | boolean | false   | If true, columns can be moved by user       |

**Response**

| Code | Description       | Response                                    |
|------|-------------------|---------------------------------------------|
| 200  | Returns grid   |  **Grid** |
| 404  | Not found         | [Error](backend/api/objects/error.md)                |

**Example**

```
{
    "configuration": {
        "allow_column_resize": false,
        "allow_column_edit": false,
        "allow_column_move": false
    },
    "columns": [
        {
            "id": "id",
            "type": "TEXT",
            "label": "Id",
            "visible": true,
            "editable": false,
            "deletable": false
        },
        {
            "id": "name",
            "type": "TEXT",
            "label": "Name",
            "visible": true,
            "editable": false,
            "deletable": false,
            "filter": {
                "type": "TEXT"
            }
        },
        {
            "id": "image_id",
            "type": "TEXT",
            "label": "Icon",
            "visible": true,
            "editable": false,
            "deletable": false,
            "filter": {
                "type": "TEXT"
            }
        },
        {
            "id": "group_id",
            "type": "TEXT",
            "label": "Group",
            "visible": true,
            "editable": false,
            "deletable": false,
            "filter": {
                "type": "SELECT",
                "options": [
                    {
                        "id": "418c48d3-d2c3-4c30-b627-93850c38d59c",
                        "name": "Suggested",
                        "custom": false
                    },
                    {
                        "id": "641c614f-0732-461f-892f-b6df97939599",
                        "name": "My templates",
                        "custom": true
                    }
                ]
            }
        },
        {
            "id": "_links",
            "type": "LINK",
            "label": null,
            "visible": false,
            "editable": false,
            "deletable": false
        }
    ],
    "collection": [
        {
            "id": "d346465c-a4fe-4564-a149-a0e8311013a3",
            "name": "Template",
            "image_id": null,
            "group_id": "418c48d3-d2c3-4c30-b627-93850c38d59c",
            "_links": {
                "get": {
                    "href": "http://127.0.0.1:8000/api/v1/EN/conditionsets/d346465c-a4fe-4564-a149-a0e8311013a3",
                    "method": "GET"
                },
                "edit": {
                    "href": "http://127.0.0.1:8000/api/v1/EN/conditionsets/d346465c-a4fe-4564-a149-a0e8311013a3",
                    "method": "PUT"
                },
                "delete": {
                    "href": "http://127.0.0.1:8000/api/v1/EN/conditionsets/d346465c-a4fe-4564-a149-a0e8311013a3",
                    "method": "DELETE"
                }
            }
        }
    ],
    "info": {
        "offset": 0,
        "limit": 50,
        "count": 1,
        "filtered": 1,
        "actions": []
    }
}
```
