# Channel

| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| id       | string      |  Channel Id            | Yes      |
| name     |  string   |   Channel name      | Yes      |
| connector_id     |  string   |  Connector Id           | Yes      |
| segment_id    |  string  |        Segment Id       | Yes      |
| configruation     | array    |  Channel configuration     | Yes      |


**Example**

```
{
  "id": "9c658fb1-a4b7-4039-bcb9-fbf20accc238",
  "name": "test",
  "connector_id": "ae8987ad-bf33-57dd-b81e-e9c12b8e85d7",
  "segment_id": "b12045c1-fe46-58e0-bb4d-bda2197bb9aa",
  "configuration": {
    "price": "landed_cost_pln",
    "weight": "gross_weight",
    "language": "PL",
    "attributes": [
      "color",
      "sieze",
      "name",
      "weight"
    ],
    "configurable": [
      {
        "included": [
          "color"
        ],
        "excluded": [
          "size"
        ]
      },
      {
        "included": [
          "color",
          "size"
        ],
        "excluded": []
      }
    ],
    "sets": {
      "default": 1
    },
    "store_code": "pl"
  }
}
```
