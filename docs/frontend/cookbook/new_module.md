# Create New Module

#### Adding a new module often involves adding some new business space or adding a mechanism to modify existing modules.

---

The process of adding new modules can take place in the development version and in the implementation version:
- The **development** process is related to the contribution to the [frontend repository][git-dev].
- The **implementation** process is related to the installation of [skeleton-frontend repository][git-skelet].

Adding a new module in these two approaches is very similar and the differences will be described.<br>

> The example will be built based on the **implementation process**. <br>
For example, in the module we will create a new **basic page** with **routing** and a side **menu entry**.

1. In the project we create a directory of `modules`, of course if it no longer exists.
2. We create the following directory structure `@cookbook/example`- more information about module naming [here][doc-scope]. <br>
The `@cookbook` directory is our workspace and the `example` directory is our module where we will add its content.
3. The next step is to create a file `package.json`, in which we specify the name and version of the module. <br>
It is also important to specify the property `main` that defines the start file of the package.<br>
You can add more information to the file to publish the package on npm server.
```json
// package.json
{
  "name": "@cookbook/example",
  "version": "0.1.0",
  "author": "Cookbook",
  "description": "Ergonode example module",
  "license": "OSL-3.0",
  "main": "src/index.js",
  "files": [
    "src/*"
  ]
}
```
4. If you want you can add support files: `README.ms`, `LICENSE`, `CHANGELOG.md`.
5. Now we are creating a directory `src`, which will be our workspace for the module.<br>
All subsequent steps will take place in the `src` catalog.
6. Creates a boot file `index.js`, which has a boot function - more [here][doc-structure].
```javascript
// index.js
export default async function () {}
```
7. Then we create the `config` directory where you add the `index.js` file.<br>
    - we specify the `name` of our module,
    - we define the `order` in which it is to load in the system (`210` means that it will be loaded after all modules),
    - we specify the `alias` after which we will refer to this module,
```javascript
// config/index.js
    export default {
        name: '@cookbook/example',
        order: 210,
        aliases: {
            '@Example': '/',
        },
    };
```
8. To add a page you need to create a directory of `pages` and in it add the appropriate structure of `example/index.vue`.

    ```vue
    <template>
        <div class="example">
            My example page!
        </div>
    </template>

    <script>
    export default {
        name: 'ExamplePage',
        head() {
            return {
                title: 'Example - Ergonode',
            };
        },
    };
    </script>

    <style lang="scss" scoped>
        .example {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }
    </style>
```
9. After creating a page component we create a routing. In the `config` directory we create a routes.js file where we create a routing related to the added page.
    - `name` - the period of the routing name,
    - `path` - routing path period,
    - `component` - period for a component with page content,
    - `meta` - additional information related to the menu,
```javascript
    export default [
        {
            name: 'example-page',
            path: '/example-page',
            component: () => import('@Example/pages/example/index').then(m => m.default || m),
            meta: {
                access: true,
                title: 'Example page',
                icon: () => import('@Core/components/Icons/Menu/IconSettings'),
                isMenu: true,
                menuPosition: -500,
            },
        },
    ];
```
> When creating your modules, you can use all the elements belonging to the Main Ergonode modules. <br>
This can be done because **aliases** are global and work the same way throughout the application, <br>
no matter if the module is located or hosted on the npm server. <br>
Then we see a reference to the icon in the `@Core` module: ` import('@Core/components/Icons/Menu/IconSettings')`

10. Module structure: <br>
<img src="images/cookbook/new_module_structure.png"
    alt="New module structure"
    />

11. After you have created the modules, you now need to add it to the module configuration in the `modules.config.js` file. <br>
Our module is local so we add it in the `local` section.
> Add an entry to an existing configuration. Running the `npm run modules` command will overwrite your changes to the configuration.
```javascript
// modules.config.js
export default {
		...
		local: [
			'@cookbook/example',
        ],
};
```
12. Now all you have to do is run the node server (`npm run dev`) and we will see our new page and new position on the side menu.
<img src="images/cookbook/new_module_finish.png"
    alt="New module with page"
    />

[git-dev]: https://github.com/ergonode/frontend
[git-skelet]: https://github.com/ergonode/skeleton-frontend
[doc-scope]: /frontend/architecture/app-structure?id=scope
[doc-structure]: /frontend/architecture/module-structure?id=structure
