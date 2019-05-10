# Grid


## State

* #### **numberOfDisplayedElements**
    
    _State for number of displayed elements_
    * default: **`25`**
    * type: **`Int`**
  
* #### **columns**
    
    _State for columns_
    * default: **`[]`**
    * type: **`Array`**
     
* #### **rows**
    
    _State for rows_
    * default: **`[]`**
    * type: **`Array`**
        
* #### **count**
    
    _State for element count_
    * default: **`0`**
    * type: **`Int`**
        
* #### **filtered**
    
    _State for number of filtered elements_
    * default: **`0`**
    * type: **`Int`**
        
* #### **filter**
    
    _State for filter_
    * default: **`''`**
    * type: **`String`**
           
* #### **globalFilters**
    
    _State for global filters_
    * default: **`[]`**
    * type: **`Array`**
           
* #### **displayedPage**
    
    _State for displayed page_
    * default: **`1`**
    * type: **`Int`**
           
* #### **configuration**
    
    _State for configuration_
    * default: **`{}`**
    * type: **`Object`**
           
* #### **sortedByColumn**
    
    _State for sorted by column_
    * default: **`{}`**
    * type: **`Object`**
           
* #### **isSelectedAllRows**
    
    _State for 'is selected all rows' value  storage_
    * default: **`false`**
    * type: **`Boolean`**
           
* #### **selectedRows**
    
    _State for selected rows_
    * default: **`{}`**
    * type: **`Object`**
   
## Actions

* #### getData (token, params, path, onError)

    [ to do ]
     * **Parameters:**
          * **`token`** - JWT token
          * **`params`** - parameters
          * **`path`** - path to api
          * **`onError`** - callback function on error


* #### getColumnData (index, columnId, offset, limit, path, onError)

   [ to do ]
   
    * **Parameters:**
         * **`index`** - 
         * **`columnId`** - 
         * **`offset`** - 
         * **`limit`** - 
         * **`path`** - 
         * **`onError`** - callback function on error

* #### setFilter (filter, id)

    [ to do ]
     * **Parameters:**
         * **`filter`** - filter
         * **`id`** - id

* #### setSortingState (sortedColumn)

    [ to do ]

    * **Parameters:**
      * **`sortedColumn`** -
               
* #### changeNumberOfDisplayingElements (number)

   [ to do ]
    * **Parameters:**
      * **`number`** - number of displayed elements

* #### changeDisplayingPage (number)

   [ to do ]
    * **Parameters:**
      * **`number`** -

* #### setColumnWidth (payload)

   [ to do ]
    * **Parameters:**
      * **`payload`** -
* #### moveColumnToIndex (column columnIndex, indexToMove)

   [ to do ]
     * **Parameters:**
         * **`column`** - 
         * **`columnIndex`** - 
         * **`indexToMove`** - 

* #### insertColumnAtIndex (column, index)

   [ to do ]
     * **Parameters:**
         * **`column`** - 
         * **`column`** - 

* #### removeColumnAtIndex (index)

   [ to do ]
     * **Parameters:**
         * **`index`** - 

* #### setSelectionForAllRows (isSelected)

   [ to do ]
     * **Parameters:**
         * **`isSelected`** - 

* #### setSelectedRow (row, value)

   [ to do ]
     * **Parameters:**
         * **`row`** - 
         * **`value`** - 

* #### clearData ()

   [ to do ]
   
## Getters
      
   [ to do ]
