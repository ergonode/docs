# Module structure

## Introduction

A single module in its construction corresponds to a typical Nuxt-based project structure.<br>
By using the [VueMS][vuems] library we can build modules like small projects based on [NuxtJS][nuxt].<br>
Modules are based on mechanisms [Nuxt Modules][nuxt-modules], but they have no restrictions on the structure. <br>
The module can have any structure, which means it can be a single functionality or a large and complex business logic.<br>
We create the modules according to our own needs and it depends on us what their structure will be.<br>


When creating a new business context we usually try to create a new module that works with the remaining ones.<br>
Often modules are related to each other because they use some mechanisms from other modules.<br>


We have created an architecture that makes it **easy to develop and scale** our application.<br>
The module architecture allows you to **add new solutions**, but also to **replace existing ones**.<br>
We can replace the whole module with a completely different one, or just some parts of it.<br>

We know that the work of **Ergonode** developers is completely different from the work of developers implementing our solution for a client.<br>
This solution was created mainly for the latter ones.<br>


## Structure

We have assumed that the modules will be created according to the concept of creating an npm package, <br>
so that after creating the modules locally, it can be easily transferred to the [npm server][npm].<br>
> The module must contain the `package.json` file and all module content must be in the `src` directory. <br>

You can also add a `README.md` and `LICENSE` files.


<img src="images/module-structure.png"
        alt="Module structure"
        />

### Required files:

* **package.json**<br>
    This file should contain all information about module.<br>

    **Example file:**
    ```json
    {
        "name": "@ergonode/comments",
        "version": "1.0.0-beta",
        ...
        "main": "src/index.js",
        "files": [
            "src/*"
        ],
        "keywords": [
            ...
            "ergonode",
            "ergonode-module",
            "ergonode-module-required"
        ]
    }
    ```

    > The properties in this file are used when we want to publish our package on the npm server. <br>
    For more information about naming the modules [here][doc-scope].

* **./src/index.js**<br>
    In the project directory we create an entry file called index.js, needed to run the module.

    > We can run an additional logic that starts when the module is loaded.<br>
    The default exported function must be asynchronous. All listed methods have access to configuration data from the [VueMS][vuems] library.<br>
    We can add two additional functions:<br>
    `beforeModule()` - asynchronous function run before the module is loaded,<br>
    `afterModule()` - synchronous function started after the module is loaded,<br>

```javascript
export async function beforeModule() {
    // run before loading module
}
export default async function () {
    // module logic
}
export async function afterModule() {
    // run after loading module
}
```
* **./src/config/index.js**<br>
    Main configuration file include all [module configurations][doc-config].

    > Module must have a config directory with `index.js` file.<br>
    All available configurations can be placed in this directory.<br>
    More information [here][doc-config].
```javascript
export default {
    name: '@ergonode/comments',
    order: 170,
    relations: [
        '@ergonode/products',
    ],
    aliases: {
        '@Comments': '/',
    },
};
```

### Directory structure

By using the [VueMS][vuems] library we can maintain the same directory structure as in [NuxtJS][nuxt]. <br>
Looking at the module structure we can see its similarity to a typical Nuxt-based project [structure][nuxt-dirs]. <br>
if you want to change the default directory structure, you have to change it in the [VueMS configuration][vuems-dirs].

<img src="images/module-content.png"
    alt="Module content"
    />

**Directories:**
* **assets**<br>
    The assets directory contains uncompiled assets such as your styles, images, or fonts.
* **components**<br>
    The components directory is where you put all your Vue.js components which are then imported into your pages.
* **config**<br>
    All [module configuration][doc-config] files.
* **defaults**<br>
    All module default vars.
* **layouts**<br>
    Application layouts.
* **locales**<br>
    Module i18n translations.
* **middleware**<br>
    The middleware directory contains application middleware. <br>
    Middleware lets you define custom functions that can be run before rendering either a page or a group of pages (layout).
    > Currently there is only support for global middlewares. <br>
    Create file with `.global.js` suffix then middleware will be run before all pages.
* **mixins**<br>
    All module mixin files.
* **models**<br>
    All module models files.
* **pages**<br>
    The pages directory contains your application's views and routes.
* **plugins**<br>
    The plugins directory contains Javascript plugins that you want to run before instantiating the root Vue.js Application.
* **services**<br>
    Contains all services with API requests.
* **store**<br>
    The store directory contains Vuex Store files.<br>
    Directory with configuration under store are considered as store modules, with a name such as directory name.


[vuems]: https://www.npmjs.com/package/@ergonode/vuems
[vuems-conf]: https://www.npmjs.com/package/@ergonode/vuems#setup
[vuems-dirs]: https://www.npmjs.com/package/@ergonode/vuems#directories
[nuxt]: https://nuxtjs.org/
[nuxt-modules]: https://nuxtjs.org/guide/modules/
[nuxt-dirs]: https://nuxtjs.org/guides/get-started/directory-structure
[nuxt-conf]: https://nuxtjs.org/guide/configuration
[vue]: https://vuejs.org/
[vue-router]: https://router.vuejs.org/guide/#html
[npm]: https://www.npmjs.com/
[npm-ergo]: https://www.npmjs.com/search?q=keywords:ergonode-module
[doc-config]: frontend/configurations
[doc-scope]: frontend/architecture/app-structure?id=scope