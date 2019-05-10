#Template designer

## State

* #### **templateLayout** 

    _State for template layouts_
    * default: **`[]`**
    * type: **`Array`**

* #### **highlightingHintPoints** 

    _State for highlighting hint points_
    * default: **`[]`**
    * type: **`Array`**

* #### **highlightingHoverPoints** 

    _State for highlighting hover points_
    * default: **`[]`**
    * type: **`Array`**

* #### **isDraggedElementColliding**

    _State is dragged element colliding_
    * default: **`false`**
    * type: **`Boolean`**

* #### **title**
    
    _State for title_
    * default: **`''`**
    * type: **`String`**
  
* #### **titleValidationError**
    
    _State for title validator error_
    * default: **`null`**
    * type: **`String`**
  
* #### **types** 


    _State for_types
    * default: **`[]`**
    * type: **`Array`**
    
## Actions

* #### getTemplateByID (path, token, onError )

[ to do ]

   * **Parameters:** 
        - **`path`** - 
        - **`token`** - JWT token
        - **`onError`** - callback function on error

* #### updateTemplateDesigner (id, data, token, onSuccess, onError)

[ to do ]

   * **Parameters:** 
        - **`id`** -
        - **`data,`** -
        - **`token,`** -
        - **`onSuccess,`** -
        - **`onError,`** -
        

* #### createTemplateDesigner (data, token, onSuccess, onError)

[ to do ]

   * **Parameters:** 
        - **`data`** -
        - **`token`** -
        - **`onSuccess`** -
        - **`onError,`** -

* #### getTypes (path, token, params, onSuccess, onError)

[ to do ]

   * **Parameters:** 
        - **`path`** - 
        - **`token`** - JWT token
        - **`params`** - 
        - **`onSuccess`** - callback function on success
        - **`onError`** - callback function on error

* #### addElementToLayoutAtCoordinates (elementToAdd)

[ to do ]

   * **Parameters:** 
        - **`elementToAdd`** - 

* #### updateLayoutElementCoordinates (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### updateObstaclesAtPoints (points, isObstacle)

[ to do ]

   * **Parameters:** 
        - **`points`** - 
        - **`isObstacle`** - 

* #### initializeDraggedElementCollision (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### initializeHighlightingHintPoints (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### initializeHighlightingHoverPoints (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### setTemplateDesignerSectionTitle (row, column, title)

[ to do ]

   * **Parameters:** 
        - **`row`** - 
        - **`column`** - 
        - **`title`** - 

* #### setTemplateDesignerTitle (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### setTemplateDesignerValidationErrorTitle (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### insertElementToLayout (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### setElementRequirement (id, required)

[ to do ]

   * **Parameters:** 
        - **`id`** - 
        - **`required`** - 

* #### setTemplateDesignerLayout (payload)

[ to do ]

   * **Parameters:** 
        - **`payload`** - 

* #### clearStorage ()

[ to do ]

   * **No parameters** 


