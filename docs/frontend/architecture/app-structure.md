# Application structure

The structure of the **Ergonode** project is completely different from the typical <br>
[**Vue.js**][vue] and [**NuxtJS**][nuxt] framework-based approach to creating a project.

> *[NuxtJS directory structure][nuxt-dirs]*


Combination of Vue and NuxtJS frameworks gives us the opportunity to build any web application we want. <br>
Unfortunately, application built on this approach is monolithic and we cannot extend its behavior.<br>
Of course we can extend project with some elements, but these are small fragments that do not add much. <br>
In addition, NuxtJS forces developers to have a specific directory structure (page, middleware, store, etc.).<br>
This gives us a rigid application built on specific principles.<br><br>
That's why we created the [VueMS][vuems] library.

## VueMS
---

<p align="center">
    <img width="250" src="images/VueMS-github.png"
        alt="VueMS logo"
        />
</p>

[**VueMS**][vuems] gives the possibility to divide the application into micro parts that use all [**Vue.js**][vue] + [**NuxtJS**][nuxt] mechanisms, <br>
but do not have their limitations. Structure of these parts is identical to the monolithic application, <br>
however each module can operate separately, communicate and interact with one another. <br>
Modules can be both small elements (single component, plugin) and complex structures <br>
(components, plugins, middleware, store, pages, etc.).

**Advantages of VueMS:**

* Each module can have its **own business context** communicating separately with the backend application.
* Modules can be **turned active or inactivate** anytime which allows to customize the application for each client individually.
* Modules can be **loaded locally** within the application and downloaded from external servers (npm, Verdaccio).
* Thanks to having modules on external servers, we can **version them**, therefore the modules are independent and easy to expand.
* The customer can **upgrade any package** or **replace it** with another one.
* Our solution is based on the built-in mechanism of [**NuxtJS modules**][nuxt-modules] in order **not to modify the basic operation of the framework**.
* The mechanism is **closely related** to [**Vue.js**][vue] and was created only for this framework.
* The main task of the library is to **transform the monolithic approach** to Nuxt architecture into a modular one.
* We needed each module to have a **structure similar to a large application**, so that its directory layout <br>
and mechanisms would not differ from a large monolithic application.

<p align="center">
    <img src="images/architecture.png"
        alt="Micro frontend architecture"
        />
</p>


## Structure
---

Ergonode in the **developer version** contains in its structure the most important configurations needed for proper operation of the application.

### Configuration files:

* #### Main:
    * **package.json**<br>
        Main configuration file for the application based on the npm dependency.<br>
        We store all information about the project and dependencies in it.
        > In addition to the file dependency, the file also provides the configuration of the available and required modules. <br>
        **Only used by CLI.**<br><br>
        `_requiredModules` - specifies required modules, no module in the application returns error, <br>
        `_availableModules` - all available modules, local and from the npm server,
    * **nuxt.config.js** <br>
        Main [nuxt configuration][nuxt-conf] file.
        > In here, in addition to the typical configuration, we will set up the [VueMS library configurations][vuems-conf].
    * **modules.config.js**<br>
        File created from the CLI level, set configuration for VueMS library - more [here][doc-mod-structure].
        > CLI command `npm run modules` and  `npm run modules:all` created this file.<br>
        **File property:**<br>
        `local` - contains names of local modules,<br>
        `npm` - contains names of modules hosted on [npm server][npm],
    * **router.js** <br>
        [Vue router][vue-router] configuration file.
        > The default file is extended with additional configurations from the [VueMS library][vuems]
    * **router.local.js** <br>
        Local routing file if needed.
        > Better idea is use modules and there set routing or extend existing routing.
    * **.env.dist** <br>
        Example file with environmental variables - need to copy and create your own `.env` file.
    * **babel.config.js** <br>
        [Babel][babel] configuration file.
* #### Quality:
    * **cypress.json** <br>
        Main [Cypress][doc-tests] configuration file.
    * **jest.config.js** <br>
        Main [JestJS][doc-tests] configuration file.
    * **.eslintrc.js** <br>
        Main [ESLint][doc-coding] configuration file.
    * **.stylelintrc.js** <br>
        Main [Stylelint][doc-coding] configuration file.
* #### Development:
    * **.editorconfig** <br>
        Main [EditorConfig][doc-other] configuration file.
    * **.huskyrc.dist** <br>
        Example file with main [Husky][doc-other] configuration - need to copy and create your own `.huskyrc` file.
    * **lerna.json** <br>
        Main [Lerna][doc-other] configuration file.


### Directories:

* **./config** <br>
    Directory with developer configurations. There is information about the file header for linters.
* **./cypress** <br>
    Directory where we keep all e2e tests.
* **./layout** <br>
    Directory with main layouts.
* **./lib** <br>
    Directory with CLI scripts.
* **./middleware** <br>
    Directory with the main middleware controlling the others. Related with [VueMS][vuems] middleware mechanism.
    > `modulesMiddlewareLoader.js` is required.
* **./modules** <br>
    Main application directory. All local modules are stored here, which build the entire application structure.
    > Adding a new module means adding it to this directory. More information [here][doc-mod-structure].
* **./static** <br>
    Directory with static files.
* **./store** <br>
    Directory with Vuex main index file._
    > Method `nuxtServerInit` in `index.js` file is required.
* **./stories** <br>
    Directory with [storybook][doc-docs] documentations.


## Modules
---

> If you want to see how to build modules - go [here][doc-mod].

### Scope

**Scope** is a concept borrowed from [npm scope][npm-scope] - keeping order in the design. <br>
**Scope** is nothing more than a catalog grouping modules in one place.<br>
The possibilities of creating the **scope** are free and if someone wants to use a more nested structure, there is no problem.<br>

As a **Ergonode Core Team** we keep all our modules in the `@ergonode` **scope** to maintain transparency.<br>
Developers working in **Ergonode** can create their own **scope** catalog with their modules. <br>

> The use of the prefix `@` is conventional and used only for greater consistency with npm packages - **we recommend this approach**.<br>

**Scope** and the name of the module will later be followed by its path in the project.<br>
The module loading mechanism works similarly to loading modules from the [npm server][npm].<br>
The specific name of the module is later used to determine the modules to be loaded for [VueMS configuration][vuems-conf].<br>

> The above description concerns the modules placed in the project locally - more [here][doc-types]

**Modules structure example:**

```
modules
    |-- @ergonode
        |-- attributes
        |-- category
        ...
    |-- @test
        |-- foo
        |-- bar
            |-- baz
```
**Use modules on `modules.config.js` file:**

```javascript
export default {
	local: [
	    '@ergonode/attributes',
	    '@ergonode/category',
	    '@test/foo',
	    '@test/bar/baz',
    ],
};
```

### Types

Modules can be divided into two types. The type determines the place from which the module is loaded.<br>

* **local**:<br>
Modules placed locally in the project in the default modules directory (`./modules`).<br>
These modules are only available in the project and are fully modifiable.<br>

* **npm**:<br>
Modules hosted on external servers ([npm][npm]). Module is available when we install the package in the project (`npm i @demo/module-name`).<br>
These modules are unmodifiable and they are updated only by upgrading the npm package version.


> In the [development project][git-dev] all **core modules** are used locally,
but in [skeleton project][git-skelet] modules are loaded from [npm server][npm-ergo].


**Use modules on `modules.config.js` file:**

```javascript
export default {
	local: [
	    '@ergonode/attributes',
	    '@ergonode/category',
	    '@test/foo',
	    '@test/bar/baz',
    ],
    npm: [
        '@demo/module-name',
    ]
};
```

### Required modules

**Ergonode** gives full control over the loading of modules. <br>
Each can only install the modules that it needs, but this can cause problems<br>

Between the modules there are those without which the application will not work properly.<br>
To avoid problems, it is possible to determine which modules are **required** for the application to work properly.


In the `nuxt.config.js` file in the [VueMS configuration][vuems-conf] we can specify the modules that are **required** for the application.

```javascript
vuems: {
    required: [
        '@ergonode/core',
        '@ergonode/authentication',
        '@ergonode/users',
    ],
    modules: {
        '@ergonode/core',
        '@ergonode/authentication',
        '@ergonode/users',
        '@ergonode/attributes',
        ...
    },
}
```


[git-dev]: https://github.com/ergonode/frontend
[git-skelet]: https://github.com/ergonode/skeleton-frontend
[vuems]: https://www.npmjs.com/package/@ergonode/vuems
[vuems-conf]: https://www.npmjs.com/package/@ergonode/vuems#setup
[nuxt]: https://nuxtjs.org/
[nuxt-modules]: https://nuxtjs.org/guide/modules/
[nuxt-dirs]: https://nuxtjs.org/guides/get-started/directory-structure
[nuxt-conf]: https://nuxtjs.org/guide/configuration
[vue]: https://vuejs.org/
[vue-router]: https://router.vuejs.org/guide/#html
[babel]: https://babeljs.io/
[npm]: https://www.npmjs.com/
[npm-scope]: https://docs.npmjs.com/about-scopes
[npm-ergo]: https://www.npmjs.com/search?q=keywords:ergonode-module
[doc-tests]: frontend/technologies?id=tests
[doc-coding]: frontend/technologies?id=coding-standards
[doc-other]: frontend/technologies?id=other
[doc-docs]: frontend/technologies?id=documentation
[doc-mod-structure]: frontend/architecture/app-structure?id=modules
[doc-mod]: frontend/architecture/module-structure
[doc-types]: frontend/architecture/app-structure?id=types