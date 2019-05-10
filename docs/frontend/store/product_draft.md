# Product Draft

## State


* #### **id** null,
    
    _State for id_
    * default: **`null`**
    * type: **`String`**
  
* #### **sku** 
    
    _State for sku_
    * default: **`''`**
    * type: **`String`**

* #### **template** 
    
    _State for template_
    * default: **`''`**
    * type: **`String`**

* #### **category** 
    
    _State for category_
    * default: **`''`**
    * type: **`String`**

* #### **languageCode** 
    
    _State for language code_
    * default: **`''`**
    * type: **`String`**

* #### **templateLayout** 
    
    _State for template layouts_
    * default: **`[]`**
    * type: **`Array`**

* #### **completeness** 
  
    _State for completness_
    * default: **`{}`**
    * type: **`Object`**

* #### **templates** 
    
    _State for templates_
    * default: **`[]`**
    * type: **`Array`**

* #### **categories** 
    
    _State for categories_
    * default: **`[]`**
    * type: **`Array`**


## Actions

* #### setProductSku (payload)

[ to do ]
   * **Parameters:**
       - **`payload`** - 

* #### setProductTemplate (payload)

[ to do ]
   * **Parameters:**
       - **`payload`** - 

* #### setProductCategory (payload)

[ to do ]
   * **Parameters:**
       - **`payload`** - 

* #### setDraftLanguageCode (payload)

[ to do ]
   * **Parameters:**
       - **`payload`** - 

* #### getProductDraft (payload)

[ to do ]
   * **Parameters:**
       - **`payload`** - 
* #### getTemplates (token, onError)

[ to do ]
   * **Parameters:**
       - **`token`** - JWT token
       - **`onError`** -  callback function on error 

* #### getCategories (token, onError)

[ to do ]
   * **Parameters:**
        - **`token`** - JWT token
        - **`onError`** -  callback function on error 

* #### getProductCompleteness (id, languageCode, token, onError)

[ to do ]
   * **Parameters:**
       - **`id`** - 
       - **`languageCode`** - 
       - **`token`** - JWT token
       - **`onError`** -  callback function on error 
 
* #### setProductTemplateElementValue (payload)

[ to do ]
   * **Parameters:**
       - **`payload`** - 

* #### clearStorage ()

[ to do ]
   * **No Parameters**

* #### createProduct (data, token, onSuccess, onError)

[ to do ]
   * **Parameters:**
       - **`data`** - 
       - **`token`** - JWT token
       - **`onSuccess`** - callback function on success
       - **`onError`** -  callback function on error 

* #### applyDraft (id, token, onSuccess, onError)

[ to do ]
   * **Parameters:**
        - **`id`** - 
        - **`token`** - JWT token
        - **`onSuccess`** - callback function on success
        - **`onError`** -  callback function on error 

* #### updateProduct (id, data, token, onSuccess, onError)

[ to do ]
   * **Parameters:**
        - **`id`** - 
        - **`data`** - 
        - **`token`** - JWT token
        - **`onSuccess`** - callback function on success
        - **`onError`** -  callback function on error  

