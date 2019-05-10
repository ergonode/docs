# List
---
List element is used for listing data information, scroll handling (e.g. emiting when we hit top / bottom content - it can be used for prefetching more data into your model). It can be spread into two models of presenting data:
    
- Groups: ListGroup
- Plain elements - ListElement

Option with Groups has hidding state. After we click on the group all of them getting hidden mode.

Architecture:

```
// Groups
<List>
    <ListGroup>
        <ListElement>
            <ListElementIcon />
            <ListElementDescription />
            <ListElementAction />
        </ListElement>
    </ListGroup>
</List>

// ListElements
<List>
     <ListElement>
            <ListElementIcon />
            <ListElementDescription />
            <ListElementAction />
    </ListElement>
</List>
```

To make any element in list 'Draggable' use wrapper above it oraz modifie any element with draggable HTML5 attribute.

##### ListGroup
Group element is intended for grouping elements by given index.

##### ListElement
List element is the smalles atom in the list hierarchy. It does support for:

- Drag & drop
- Disabled mode
- Element height configuration

Element can be filled up with: ListElementIcon, ListElementDescription, ListElementAction.

#### ListElementIcon
Usually it is placed at the left side of the ListElement. It does have an Icon.

#### ListElementDescription
The purpose of this element is to present data informartion: Title and Subtitle of the ListElement.

#### ListElementAction
It may have an action element inside for e.g. Button

#### Feature tasks

- Add configurable group selection mode
- Improve prefetching data
