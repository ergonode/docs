# API requests powered by axios

All API requests are supported by the [nuxt/axios][axios] library, which makes it easy for us to use API queries.

## Introduction
---
The main configuration for the library is located in the file `nuxt.config.js`, <br>
there are the most important things you need to run the library on our system. <br>

For our purpose we've implemented `axios.js` plugin which extends native `axios` instance by:

* introducing [axios-extensions][axios-extensions] which is enabling `cacheAdapterEnhancer`. By default, It's set to `false` and to overwrite it, it has to be passed as one of the request `config`:

    ```javascript
    export const get = ({
        $axios,
    }) => $axios.$get('api/request/get', {
    	// ...
        useCache: true,
        // ...
    });
    ```
* global mechanism for prefixing each request with `languageCode` - no need to convey openly.

    ```javascript
    export const get = ({
        $axios,
    }) => $axios.$get('api/request/get'); // => en_GB/api/request/get
    ```
  
    To overwrite it:

    ```javascript
    export const get = ({
        $axios,
        languageCode
    }) => $axios.$get(`${languageCode}/api/request/get`, {
    	// ...
        withLanguage: false,
        // ...
    });
    ```

* by default It's JSON base API

### Global handling - interceptors
---
The plugin is implementing few interceptors described at [axios helpers][axios-helpers]

* `onRequest` - extending request config by: 
    * adding [`cancelToken`][axios-cancel-token] if not added through the config - canceling request on demand
    * adding `languageCode` for each request if `withLanguage` flag is set
    * adding `JWTAuthorization` token

* `onResponse` - removing [`cancelToken`][axios-cancel-token] from the memory.
  
* `onError` - responsible for capturing all errors occurring during an API query.
    All error codes are parsed accordingly, and the user receives appropriate messages.
    * Supporting HTTP codes:
      * `/5[0-9]{2}/`
      * `401` - handling `refreshToken` logic
      * `403` - user has no access for given data
      * `404` - either route or media not found 
    * Not supported codes are marked as unsupported and rejected - might be handled individually
  

### Additional methods
___
The plugin is providing methods for handling [`cancelToken`][axios-cancel-token]. The structure is represented by map of keyed arrays:

    ```javascript
    {
        [AXIOS_CANCEL_TOKEN_DEFAULT_KEY]: [
            {
                // [`cancelToken`][axios-cancel-token] source structure
            }        
        ]
    }
    ```

* `clearCancelTokens` canceling all pending requests for given keys e.g. `AXIOS_CANCEL_TOKEN_DEFAULT_KEY`. It's used everytime user is going to leave the page defined in `beforeRouteLeaveMixin`. 
* `addCancelTokens` adding custom [`cancelToken`][axios-cancel-token] for given keys e.g. `AXIOS_CANCEL_TOKEN_DEFAULT_KEY`. It might be useful for custom requests which are not depending on user navigation.
* `removeCancelToken` removing custom [`cancelToken`][axios-cancel-token] from map.

### Accessibility
---
The plugin is extending `this` scope with:

* `axios` instance accessible through the components via `this.$axios` or through the context `this.app.$axios`  
* `clearCancelTokens` accessible through the components via `this.$clearCancelTokens` or through the context `this.app.$clearCancelTokens`:
* `addCancelTokens` accessible through the components via `this.$addCancelTokens` or through the context `this.app.$addCancelTokens` 
* `removeCancelToken` accessible through the components via `this.$removeCancelToken` or through the context `this.app.$removeCancelToken` 

### Example request
---

All API queries are placed in the `services` directory for each module. Passing `$axios` is required to make the call. Rest parameters are customised and determined by request needs. 


```javascript
export const getAll = ({
    $axios,
    params = {
        limit: 9999,
        offset: 0,
        view: 'list',
        field: 'name',
        order: 'ASC',
    },
}) => $axios.$get('languages', {
    params,
});
```

> The [nuxt/axios][axios] library has internal methods adapted to API queries, see [here][axios-api].<br>

[axios]: https://axios.nuxtjs.org/
[axios-helpers]: https://axios.nuxtjs.org/helpers
[axios-cancel-token]: https://github.com/axios/axios#cancellation
[axios-extensions]: https://github.com/kuitos/axios-extensions
[axios-api]: https://github.com/axios/axios#axios-api
