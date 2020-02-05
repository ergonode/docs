# Template_element


| Key           | Type |Description  | Required |
|---------------|------|--------------|----------|
| position       | [Element_position](backend/api/objects/element_position.md)|       Position            | Yes      |
| size       | [Element_size](backend/api/objects/element_size.md)|       Size          | Yes      |
| variant   |  string    | element variant           | Yes      |
| type   |  string    |  element type           | Yes      |
| properties   |  [Element_properties](backend/api/objects/element_properties.md)    |  element properties           | Yes      |


**Example**

```
 {
            "position": {
                "x": 0,
                "y": 0
            },
            "size": {
                "width": 2,
                "height": 1
            },
            "properties": {
                "variant": "attribute",
                "attribute_id": "e3f236d1-0e52-5804-be5b-096bbe225fda",
                "required": true
            },
            "type": "text"
        }
```
