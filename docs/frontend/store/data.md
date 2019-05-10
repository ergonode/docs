# Data (Dictionaries)

## State

* #### **languages**
    
    _Dictionary with all available languages for translations_
    * default: **`{}`**
    * type: **`Object`**
  
* #### **currencies**
    
    _Dictionary with all available currencies_
    * default: **`{}`**
    * type: **`Object`**

* #### **units**
    
    _Dictionary with all available units_
    * default: **`{}`**
    * type: **`Object`**

* #### **attrTypes**
    
    _Dictionary with all available attribute types_
    * default: **`{}`**
    * type: **`Object`**

* #### **attrGroups**
    
    _Dictionary with all available attribute groups_
    * default: **`[]`**
    * type: **`Array`**

* #### **dateFormats**
    
    _Dictionary with all available date formats_
    * default: **`{}`**
    * type: **`Object`**

* #### **imageFormats**
    
    _Dictionary with all available image formats_
    * default: **`{}`**
    * type: **`Object`**

## Actions

* #### getAllData (token, onError)

    _Action which sends request to API, with JWT token to get all awailabel dictionaries._

    * **Parameters:**
        - **`token`** - parameter with token value
        - **`onError`** - parameter with error callback

* #### clearAllData ()

    _Action which clear all dictionaries in store._

    * **Parameters:** <br>
        No parameters
        
