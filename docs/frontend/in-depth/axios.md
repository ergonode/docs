# API requests powered by axios

All API requests are supported by the [nuxt/axios][axios] library,<br>
which makes it easy for us to use API queries.

### Introduction
---
The main configuration for the library is located in the file `nuxt.config.js`, <br>
there are the most important things you need to run the library on our system. <br>

To configure all necessary settings for API queries, <br>
you need to overwrite configurations by creating `axios.js` plugin in  **Core** module.<br>

All API queries pass the **authorization token**, <br>
which is created after the user's login. <br>
It is placed by default in the header of the `authorization`.<br>

All queries are based on the global `axios` method.<br>

### Structure
---
Initially, all necessary headers are added to the axios query.<br>
Then the two basic **axios** mechanism methods are replaced:<br>

* `onRequest` - this method contains everything that has to be sent with every API query.<br>
    The query address is prepared here to make it easier to work with the API.<br>
    Together with the API address the language, which is taken from user data by default, is also added.<br>
    The language in the query can be changed using the `withLanguage`.<br>

    ```javascript
    export const getTemplate = ({
        $axios,
        id,
        languageCode,
    }) => $axios.$get(`${languageCode}/products/${id}/template`, {
        withLanguage: false,
    });
    ```

* `onError` - A method responsible for capturing all errors occurring during an API query.<br>
    All error codes are parsed accordingly and the user receives appropriate messages.<br>
    There is also support for refreshing the login token, which uses `refreshToken`.<br>

> Additionally, `axios` has been enhanced with a request cancellation mechanism,<br>
which can be used with the global method of `clearCancelTokens`.


### Make request
---

All API queries are placed in the `services` directory to maintain order.<br>
All the necessary parameters are passed on to the method. <br>
Data or errors are returned<br>


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
[axios-api]: https://github.com/axios/axios#axios-api