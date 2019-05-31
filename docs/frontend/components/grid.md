# Grid

Grid is a component which mimics table behavior.
It has rows and columns on which we have full control.
We did implement basics functionalities:
* Drag & drop columns
* Selecting rows
* Removing columns
* Adding columns

_**Naming convention**_
* Ghost - when we add ghost into the name of variable / method,
it will be related to placeholder which appears below mouse on drag actions.

### Features:
* Mass actions

### Props:

* #### **columns**
    _Grid columns model._
    * type: **``Array``**,
    * required: **``true``**,
    
* #### **currentPage**
    _Current displaying grid page - pagination._
    * type: **``Number``**,
    * required: **``true``**,
    
* #### **numberOfDisplayingRows**
    _The number of how many rows we will display at each page._
    * type: **``Number``**,
    * required: **``true``**,
    
### Data:

* #### **ghostColumnIndex**
    _Index of ghost column._
    * type: **``Number``**,
    * default: **``-1``**,
    
* #### **draggedColumnIndex**
    _Index of dragged column_
    * type: **``Number``**, 
    * default: **``-1``**,
    
* #### **draggedColumn**
    _Dragged column._
    * type: **``Object``**, 
    * default: **``null``**,
    
### Computed:

* #### **templateColumns**
    _Grid template columns CSS._ - [Docs](https://developer.mozilla.org/pl/docs/Web/CSS/CSS_Grid_Layout)
    * return: **``Object``**,
    
* #### **columnWidths**
    _Used to create grid template columns layout._
    * return: **``Array``**,
        
### Methods:

#### Drag & drop
---
Drag & drop is using native browser behavior described in [Dosc](https://developer.mozilla.org/en-US/docs/Web/API/HTML_Drag_and_Drop_API).
* #### **onDragStart**
    _Method is describing behavior of the moment when we start dragging our element.
     It is called only once - on start dragging._
     
   * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
        
     ##### Actions hierarchy:
     * Get column below mouse point [`getColumnBellowMouse`](#getcolumnbellowmouse)
     * Setup [`ghostColumnIndex`](#ghostcolumnindex) and [`draggedColumnIndex`](#draggedcolumnindex)
     with index of column below mouse,
     [`draggedColumn`](#draggedcolumn) with column at index below mouse.
     * Calculate neighbour index - description below.
     * Previously calculated neighbour index is going to be used as an argument in [`addBorderToRightNeighbour`](#addbordertorightneighbour)
     to set a right border to the column which is before dragging one.
     * We need to [`createColumnCopy`](#createcolumncopy) to set it as a dragging element visualisation.
     * After we did a copy of column we can safely remove dragged column from our stored model by calling
     [`removeColumnAtIndex`](frontend/store/grid.md#removecolumnatindex-index).
     * Inserting ghost column in place of dragged column by calling [`insertColumnAtIndex`](frontend/store/grid.md#insertcolumnatindex-column-index).
     * In case that we want to mark draggable state - to do some "fancy" layout changes we have to set flag in [`draggable store`](frontend/store/draggable.md) by calling [`setDraggableState`](frontend/store/draggable.md#setdraggablestate).
          
* #### **onDragEnd**
    _Method is describing behavior of the moment when we end our drag - mouse released._
    
    * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
        
    ##### Actions hierarchy:
    * We need to calculate 3 dependencies:
        * Is there any element below our mouse.
        * The element below mouse is a trash can.
        * Ghost column is added into Grid column layout.
    * Based on these 3 condition we have to build our scenarios - at the beginning of each we have to clear a DOM from cloned copy of dragged column element by calling [`removeColumnCopy`](#removecolumncopy).
    Also for each scenario we have to save/remove grid configuration into/from **Cookie**.
        * We are going to remove the column by dropping in the trash area - then we do not have to do anything - column is already removed, right (inside [`onDragStart`](#ondragstart))?
        * We did drop column outside a Grid - we would like to add it back to his previous position.
        * We did drop column inside Grid - ghost column exists (was inserted on [`onDragOver`](#ondragover) event) then replace it with a dragged column.
    * At the end we have to set our draggable state in [`draggable store`](frontend/store/draggable.md) to **`false`** by calling [`setDraggableState`](frontend/store/draggable.md#setdraggablestate) - we did end interaction.
    * Clearing cached [`Data`](#data) variables.
* #### **onDrop**
    _Method is describing behavior of the moment when we dropped something from different element than [`Grid`](#grid) - mouse released._
    
    * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
        
    ##### Actions hierarchy:
    * Our goal is to support elements which comes from different components than [`Grid`](#grid).
    * At the first stage we have to check if the dragging element is not column.
    * Get data from backend API on successful drop element by calling [`getColumnData`](frontend/store/grid.md#getcolumndata) from [`Grid store`](frontend/store/grid.md).
    * When ghost column exists, we need to remove it from Grid template layout, clear cache.
        
* #### **onDragOver**
    _Method is describing behavior of the moment when we dragging element over draggable element._
    
    * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
    
    ##### Actions hierarchy:
    * As in [`onDragStart`](#ondragstart) we need to get column below our mouse to know where we need to add ghost column.
    * Based on **`clientX`** position of mouse and **`gridColumn`** received from [`getColumnBellowMouse`](#getcolumnbellowmouse) we need to determinate state of our cursor for column below. If the cursor is before first half of the **`gridColumn`** or after as shown in image below:
    // TODO: Add image describing action above.
    * There are few cases on which we would like to stop execution of function.
        * **`ghostColumnIndex`** is same as index of column below
        * cursor is at the first half of **`gridColumn``
        
* #### **onDragLeave**
    _Method is describing behavior of the moment when dragging element is leaving element bellow._
    
    * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
    
    ##### Actions hierarchy:
    * We need to check if the dragging element (mouse position) is about to leave [`Grid`](#grid) bounds.
    * In case condition is met, ghost element is removed from grid layout.
        
* #### **onDragEnter**
    _Method is describing behavior of the moment when dragging element is entering element bellow._
    
    * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
        
    ##### Actions hierarchy:
    * Check the existence of ghost element:
        * Getting index and the column bellow mouse position
        * We would not like to add a ghost column bellow pinned column to left or right side
        * Setting up the ghost column index at the index of grid column bellow mouse position
        * Inserting ghost column between columns bellow mouse position
        
* #### **getColumnBellowMouse**
    _Method is calculating grid column based on mouse position._
    
    * Parameters: 
        * **`clientX`** - x position of mouse.
        * **`gridColumns`** - grid columns / DOM elements.
        * **`completion`** - completion block / function will be called when we find matched column to mouse position.

* #### **createColumnCopy**
    _Method is adding copy of dragged column to document body._ 

    * Parameters: 
        * **`event`** - Described in Drag & drop docs linked above.
        * **`gridColumn`** - grid column / DOM element.

* #### **insertIDToColumnsIDCookie**
    _Method is updating cookies with newly inserted column id._ 

    * Parameters: 
        * **`index`** - Index of newly inserted column to grid columns.

* #### **removeIDFromColumnsIDCookie**
    _Method is removing column ID from cookies._
    
* #### **removeColumnCopy**
    _Method is removing copy of dragged column from document body._
        
* #### **determinateDraggedColumnPositionState**
    _Method is checking if the dragged column (mouse position) is in first half of the column bellow or in second half._
    
    * Parameters: 
        * **`clientX`** - x position of mouse.
        * **`gridColumn`** - grid column / DOM element.

* #### **addBorderToRightNeighbour**
    _Method is adding right border to column next to._
        
    * Parameters: 
        * **`neighbour`** - grid column next to column.
        
* #### **getGhostColumn**
    _Method is adding right border to column next to._
        
    * Returns: 
        * **`ghostColumn`** - ghost column data model.
