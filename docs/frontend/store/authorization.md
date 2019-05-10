# Authorization

## State

* #### **token**
    
    _State for JWT authorization token storage_
    * default: **`''`**
    * type: **`String`**
  
* #### **user**
    
    _State for user data storage_
    * default: **`{}`**
    * type: **`Object`**
   
## Actions

* #### authenticateUser (payload)

    _Action which sends request with credentials to API to get JWT token. <br>
    This action also calls [`setToken`](#settoken-token) mutation and set Cookie with this token._

    * **Parameters:**
      * **`payload`** - data with user credentials

* #### fetchUserData (payload)

    _Action which sends request to API, with JWT payload to get user data. <br>
    This action also calls [`setUser`](#setuser-userdata) mutation and set Cookie with user data._

    * **Parameters:**
      * **`token`** - parameter with token value
        
* #### logOutUser ([payload])

    _This action calls [`setToken`](#settoken-token) and [`setUser`](#setuser-userdata) mutations with `null` paramters and clears Cookie. <br>
    If we call it with reload parameter site will be reloaded._

    * **Parameters:**
      * **`payload (optional)`** - sets flag which reloads site
