# Attributes

A module that distributes information about attribute groups.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/attribute-groups`   |
| Order         | `60`                     |
| Aliases       | `@AttributeGroups`: `/`       |
| Relations     | [`@Core`][module-core]  |
| Required       | false     |

## Extending

### Pages

**Contained in `attribute-groups/index.vue` page:**

> URL path: `/attribute-groups/grid`

* `@Attributes/pages/attribute-groups/mainAction` - add new button next to `NEW ATTRIBUTE GROUP`<br>
    <img src="images/extends/extend-attribute-gr-main-action.png" alt="Extend main action" />
    <br>
    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/pages/attribute-groups/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

---

**Contained in `attribute-groups/_group` page:**

> URL path: `/attribute-groups/group/{UUID}`

* `@Attributes/pages/attribute-groups/_group/mainAction` - add new button next to `REMOVE GROUP`<br>
    <img src="images/extends/extend-edit-group-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/pages/attribute-groups/_group/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

---

[module-core]: frontend/modules/core
