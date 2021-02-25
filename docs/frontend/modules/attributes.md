# Attributes

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/attributes`   |
| Order         | `50`                     |
| Aliases       | `@Attributes`: `/`       |

### Description

A module that distributes information about attributes and attribute groups.

### Extending placeholders

#### Extend Components
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

* `@Attributes/pages/attributes/injectModal` - inject new modal on attribute grid page.<br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Attributes/pages/attributes/injectModal': [
                {
                    component: () => import('yourModalComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

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

* `@Attributes/pages/attribute-groups/injectModal` - inject new modal on attribute group grid page.<br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Attributes/pages/attribute-groups/injectModal': [
                {
                    component: () => import('yourModalComponent'),
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