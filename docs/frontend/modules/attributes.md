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

**Contained in `AttributePage` component:**

* `@Attributes/components/Pages/AttributePage/mainAction` - add new button next to `REMOVE ATTRIBUTE`<br>
    <img src="images/extends/extend-edit-attr-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Attributes/components/Pages/AttributePage/mainAction': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

**Contained in `AttributeGroupPage` component:**

* `@Attributes/components/Pages/AttributeGroupPage/mainAction` - add new button next to `REMOVE GROUP`<br>
    <img src="images/extends/extend-edit-group-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Attributes/components/Pages/AttributeGroupPage/mainAction': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---