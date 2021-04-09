# Extend Toolbar Menu

#### You will find out here how to expand the toolbar menu with your own items from the newly created module.

##### Placeholder: `@Core/components/ToolBar/ToolBarMenu`

---

Usually a new menu item we want to add when we have a new mechanism or page

<img src="images/cookbook/tool_bar_menu.png"
    alt="Toolbar menu"
    />

<br>

1. We add a new page or functionality in a separate module (The module create process is described [here][doc-new-module]).
2. If we have a new item that we want to put in the **Toolbar Menu**, we can do it through the expansion mechanism - more [here][doc-extend].
3. In the new module in the `config` directory we create a new `extends.js` file (if it does not exist, of course).
4. In the `extends.js` file we add the `extendMethods` property.
5. The placeholder responsible for the **Toolbar Menu** extension is `@Core/components/ToolBar/ToolBarMenu`.
6. To the placeholder we add the data needed to create a new item in the **ToolBar Menu** (see example).

> If we use an existing `title` value, the `menu` array will be connected to an already existing one. <br>
If we create a new `title`, a new section will be added.

Example:
```javascript
// extends.js
extendMethods: {
'@Core/components/ToolBar/ToolBarMenu': () => [
    {
        title: 'My account',
        menu: [
            {
                title: 'My test',
                routing: '/test',
                icon: 'User',
            },
        ],
    },
    {
        title: 'My test',
        menu: [
            {
                title: 'My test 2',
                routing: '/test2',
                icon: 'User',
            },
        ],
    },
],
}
```
> `routing` property should be set to existing page. <br>
`icon` property is icon name existing in `@Core/components/Icons/Menu/` directory.

Loading the icon works this way:
```javascript
iconComponent() {
    return () => import(`@Core/components/Icons/Menu/Icon${this.item.icon}`);
},
```

<img src="images/cookbook/tool_bar_extended.png"
    alt="Extended toolbar menu"
    />


[doc-new-module]: frontend/cookbook/new_module
[doc-extend]:frontend/configurations?id=extend


