# Attributes

A module that distributes information about attributes.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/attributes`   |
| Order         | `50`                     |
| Aliases       | `@Attributes`: `/`       |
| Relations     | [`@Core`][module-core] <br> [`@AttributeGroups`][module-attribute-groups]  |
| Required       | false     |

## Extending

### Pages
**Contained in `attributes/index.vue` page:**

> URL path: `/attributes/grid`

* `@Attributes/pages/attributes/mainAction` - add new button next to `NEW ATTRIBUTE`<br>
    <img src="images/extends/extend-attribute-main-action.png" alt="Extend main action" />
    <br>
    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/pages/attributes/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

---

**Contained in `attributes/_attribute` page:**

> URL path: `/attributes/attribute/{UUID}`

* `@Attributes/pages/attributes/_attribute/mainAction` - add new button next to `REMOVE ATTRIBUTE`<br>
    <img src="images/extends/extend-edit-attr-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/pages/attributes/_attribute/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

---

[module-attribute-groups]: frontend/modules/attribute-groups
[module-core]: frontend/modules/core
