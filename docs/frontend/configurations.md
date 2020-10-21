# Module configurations

The greatest advantage of modules based on the [VueMS][vuems] library is their advanced expandability.<br>
Each module contains a directory `config` in which all configurations related to this module can be found. <br>
<br>
The most important configuration file is `index.js`, which contains everything you need to load the module correctly.<br>
All other files are optional and depend on the purpose of the module.<br>
Some of the files kept in the `config` directory are just help files to keep order and structure in code.


## Main configuration

The main configuration is placed in the `./config/index.js` file. <br>
The file exports the properties needed to correctly configure the module.<br>

#### Properties:

* **`name`** <br>
    - Type: `String`
    - **Required: `true`**

Module name including scope, used for correct module loading. The file path is built on its base.

> For more information about naming the modules [here][doc-scope].

---

* **`order`** <br>
    - Type: `Number`
    - Required: `false`
    - Default: `1000`

The sequence of loading modules in the application. This may be important when the modules have a relationship with each other.<br>
If the value is not set to `1000` by **default**, then the modules will be loaded **after the Core Modules**.

> The Core Modules have a set decimal value (e.g. `order: 20`), so you can place another module between them.

---

* **`aliases`** <br>
    - Type: `Object`
    - **Required: `true`**<br>

The main mechanism of **communication** between the modules. By specifying the alias, <br>
we create a name by which we will referencing the resources of this module.<br>

> We can create **any number** of aliases, referring to different places in the module.
```javascript
// declare
export default {
    ...
    aliases: {
        '@Core': '/',
        '@CoreComponents': '/components',
    },
};

// use in the whole application

import List from '@Core/components/List/List';
import List from '@CoreComponents/List/List';
```

---

* **`relations`** <br>
    - Type: `Array`
    - Required: `false`

Defines relationships to other modules. If you call up another module and use its mechanisms, you have to mark it here.

> When the module is in this section and is not loaded, [VueMS][vuems] will return a reference error.

```javascript
export default {
    ...
    relations: [
        '@ergonode/attributes',
        '@ergonode/media',
    ],
};
```
---

* **`replacements`** <br>
    - Type: `Object`
    - Required: `false`

It defines the elements of the module that will be replaced by others. <br>
Simple mechanism of mapping elements to be replaced with a new element.

> The item to be replaced can be **any file** and **must exist** in the application.

```javascript
export default {
    ...
    replacements: {
      '@Core/components/coreComponent': '/components/myComponent',
    },
};
```
---

* **`plugins`** <br>
    - Type: `Array`
    - Required: `false`

It defines the plugins that are loaded globally into the application.

> The `ssr` flag is set when you want the plugin to be loaded at server startup. <br>
`ssr: false` will be adapted to `mode: 'client'`, but `ssr: true` to `mode: 'server'`.

```javascript
export default {
    ...
     plugins: [
        {
            ssr: true,
            src: './plugins/axios',
        },
     ],
};
```
---

* **`css`** <br>
    - Type: `Array`
    - Required: `false`

Defines css styles that are defined globally for the entire application.

> More information [here][nuxt-css].

```javascript
export default {
    ...
    css: [
        './assets/scss/reset.scss',
        './assets/scss/font-inter-ui.scss',
    ],
};
```

## Extend

Creating new modules is not all we usually need. <br>
Sometimes you need to replace certain elements or add some to already existing solutions.<br>

In order not to modify **Core Modules**, [VueMS library][vuems-conf] provides a solution to easily extend already existing mechanisms.<br>
Thanks to it we have  a lot of possibilities to extend modules from other modules.<br>

In order to add any extensions you need to create an `extend.js` file <br>
and use specific properties in it depending on what you want to achieve. <br>

> If you don't have an extension file is not needed.

#### Properties:

* **`dictionaries`** <br>
    - Type: `Array`

In our application there is a dictionary mechanism that defines the data sets **loaded at the start of the application**.<br>
This property gives you the possibility to add a new dictionary, such dictionary should be a set of **constant data**.<br>

**Dictionary object property:**<br>
    - `stateProp` - property name used in Vuex store,<br>
    - `dataFormat` - dictionary format (e.g. `[]`, `{}`),<br>
    - `requestPath` - API address for the dictionary,<br>
    - `isGrid` - flag to determine if the query goes to EndPoint with grid,<br>

>The dictionary must be in `Array` or `Object` format.<br>
**The mechanism operates on data downloaded by API from the backend application**.

```javascript
export default {
    // using example in module: @Products/config/extends.js
    dictionaries: [
        {
            stateProp: 'units',
            dataFormat: [],
            requestPath: '/units',
            isGrid: true,
        },
    ],
};
```

---

* **`extendTabs`** <br>
    - Type: `Array`

In Ergonode, many pages are tabbed, if we want to divide information on a page, we move it to a separate tab.<br>
This functionality allows you to add a new tab to a page that exists and has tabs.<br>
The mechanism is based on routing and extends existing routing. <br>
**`extendTabs` object property:**<br>
    - `name` - existing router name what we want extend,<br>
    - `children` - array with router to extend,<br>

> The site to be extended **must exist** and must have routing with `children` property.

```javascript
// using example in module: @Products/config/extends.js
export default {
    extendTabs: [
        {
            name: 'product-id',
            children: [
                {
                    name: 'product-id-variants',
                    path: 'variants',
                    component: Tabs.ProductVariantsTab,
                    meta: {
                        title: 'Variants',
                        visible: false,
                        breadcrumbs: [
                            {
                                title: 'Products',
                                icon: Icons.Product,
                            },
                            {
                                title: 'Catalog',
                                routeName: 'catalog-products',
                            },
                        ],
                        privileges: [],
                    },
                },
            ],
        },
    ],
};
```
---

* **`extendStore`** <br>
    - Type: `Object`

A mechanism to expand existing **Vuex store**. <br>
If there is a need to extend an already existing **Vuex store** then you should use this property.<br>
When using `extendStore`, the **key** is the name of the existing Vuex store <br>
and the **value** is the file that exports the content of the extended methods.

> If you want to expand the Vuex store, you should place it in a different directory than the `store`.<br>
We recommend that you use the `extends` directory.<br>

> If you create the `store` directory on the module root and place a **Vuex store** with an existing name in it, <br>
it will be replaced ([the order][doc-config] of loading the modules is important).<br>

> Vuex store runs on [vuex modules][vuex-module] mechanism.

<img src="images/extend-vuex.png"
    alt="Extend vuex store"
    />

```javascript
// using example in module: @Products/config/extends.js
export default {
    extendStore: {
        product: () => import('@Products/extends/store/product').then(m => m.default || m),
    },
};
```
---

* **`extendComponents`** <br>
    - Type: `Object`<br>

One of the important mechanisms is the possibility of **extending existing components** from outside.<br>
The operation of the components allows them to be reusable and used anywhere,<br>
but the problem is when we want to extend an existing component in a specific business context.<br>
Therefore, we have prepared a mechanism that allows you to easily **inject** a component into a specific location.<br>
<br>
The component expansion mechanism works similarly to the placeholder placed in the text, <br>
the placeholder is replaced by the data passed on to it. Our component expansion mechanism works the same way, <br>
with the appropriate placeholders scattered throughout the application, which can be referenced and passed on to the component.<br>
<br>
There are predefined places ready for expansion throughout the application.<br>

**Example:**

1. First, we place the functions for capturing the component in the place we want to extend.

```javascript
    computed: {
        ...
        extendedComponents() {
            return this.$getExtendedComponents('PLACEHOLDER_NAME');
        },
    }
```

2. Then place the captured components in the template.

```html
    <template v-for="(component, index) in extendedComponents">
        <Component
            :is="component.component"
            :key="index"
            v-bind="component.props" />
    </template>
```

3. Add the components you want to inject into a specific location.

```javascript
    export default {
        extendComponents: {
            PLACEHOLDER_NAME: [
                {
                    component: () => import('@Core/components/exampleComponent').then(m => m.default || m),
                    props: {
                        propsToSend: true,
                    },
                },
            ],
        },
    };
```

> Placeholder names are defined by the access path to the component <br>
(e.g `@Products/components/Forms/ProductForm` - extend product form component)<br>
We recommend this approach because it is very clear.

> There is a global `$getExtendedComponents` method in the application that takes all the components <br>
passed for expansion and places them in a prepared place.

> In addition, there is the `$extendedForm` method, which takes components according to the type.<br>
The mechanism is tripled in several places in the application to load data according to the data type (e.g `AttributeForm`, `ProductForm`).

> All placeholders placed in the application are described in the [modules section][doc-modules] of the application, with each module.

---


* **`extendMethods`** <br>
    - Type: `Object`<br>

The mechanism works the same as `extendComponents`, but instead of the components the placeholders are filled with methods.<br>
The methods can return information or just set up some data. <br>
The methods can take any parameters, it depends on the information provided while creating the placeholder.

**Example:**

1. First, we place the functions for capturing the methods in the place we want to extend.

```javascript
const methods = await this.$extendMethods('PLACEHOLDER_NAME', {
    $this: this,
    data,
});
```

2. Add the method you want to inject into a specific location.

```javascript
export default {
    extendMethods: {
        'PLACEHOLDER_NAME': ({
            $this, data = [],
        }) => {
            return data;
        }
    }
};
```

> There is a global `$extendMethods` method in the application that takes all the methods <br>
passed for expansion and places them in a prepared place.

> All placeholders placed in the application are described in the [modules section][doc-modules] of the application, with each module.

> The methods work in **asynchronous** mode.

## Routing

File required if the module has pages and wants to define its own routing. <br>
If the routing exists, **you must create** a file named `routes.js` and put all the routing rules in it.<br>

Information from this file determines the routing passed to the [`@nuxtjs/router`][nuxt-router] library,<br>
which overwrites the default Nuxt routing.<br>

The **array** exported in the file is parsed and combined by the [VueMS library][vuems] and passed <br>
to the main configuration of `new Router()`.

> [Here][doc-helpers] are described `privileges.js` and `imports.js` files.

```javascript
import {
    Icons,
    Pages,
    Tabs,
} from './imports';
import Privileges from './privileges';

export default [
    {
        name: 'unit-id',
        path: '/settings/units/unit/:id',
        component: Pages.UnitEdit,
        meta: {
            isMenu: false,
            redirectTo: 'unit-id-general',
        },
        children: [
            {
                name: 'unit-id-general',
                path: 'general',
                component: Tabs.UnitGeneralTab,
                meta: {
                    title: 'Options',
                    breadcrumbs: [
                        {
                            title: 'System',
                            icon: Icons.Settings,
                        },
                        {
                            title: 'Units',
                            routeName: 'settings-units',
                        },
                    ],
                    privileges: [],
                },
            },
        ],
    },
];
```

## Helpers

Support files are files that are not imposed by [VueMS][vuems-conf], they are to make your work easier. <br>

> Of course, if you want, you can create your own support files. The `config` directory is used for this.

#### Files:

* **`privileges.js`** <br>
    A file storing all all permissions imposed by the module. Used mainly in routing - `routes.js`.

```javascript
export default {
    SETTINGS: {
        namespace: 'SETTINGS',
        create: 'SETTINGS_CREATE',
        read: 'SETTINGS_READ',
        update: 'SETTINGS_UPDATE',
        delete: 'SETTINGS_DELETE',
    },
};
```

* **`imports.js`** <br>
    A file storing all imports needed in the configuration files.

```javascript
export const Pages = {
    Login: () => import('@Core/pages/login/index').then(m => m.default || m),
};

export const Tabs = {
    MainSettingsTab: () => import('@Core/components/Tabs/MainSettingsTab').then(m => m.default || m),
};
```

[vuems]: https://www.npmjs.com/package/@ergonode/vuems
[vuems-conf]: https://www.npmjs.com/package/@ergonode/vuems#config-directory
[vuex-module]: https://vuex.vuejs.org/guide/modules.html
[nuxt-css]: https://nuxtjs.org/api/configuration-css/
[nuxt-router]: https://github.com/nuxt-community/router-module
[doc-scope]: frontend/architecture/app-structure?id=scope
[doc-helpers]: frontend/configurations?id=helpers
[doc-config]: frontend/configurations?id=properties
[doc-modules]: frontend/modules