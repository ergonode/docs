# Categories

A module that distributes information about categories.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/categories`   |
| Order         | `60`                     |
| Aliases       | `@Categories`: `/`       |
| Relations     | [`@Core`][module-core]  |
| Required       | false     |

## Extending

### Pages 

**Contained in `categories/index.vue` page:**

> URL path: `/categories/grid`

* `@Categories/pages/categories/mainAction` - add new button next to `NEW CATEGORY`<br>
    <img src="images/extends/extend-category-main-action.png" alt="Extend main action" />
    <br>
    Example of use:

    ```javascript
    extendComponents: {
        '@Categories/pages/categories/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

---

**Contained in `categories/_category` page:**

> URL path: `/categories/category/{UUID}`

* `@Categories/pages/categories/_category/mainAction` - add new button next to `REMOVE CATEGORY`<br>
    <img src="images/extends/extend-edit-category-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
    extendComponents: {
        '@Categories/pages/categories/_category/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

---

### Forms

**Contained in `Forms/CategoryForm` component:**

* `@Categories/components/Forms/CategoryForm` - add new field to category form<br>
    <img src="images/extends/extend-category-form.png" alt="Extend category form" />
    <br>

    > Use the `__ALL` key if the form has no types.

    Example of use:

    ```javascript
    extendComponents: {
        '@Categories/components/Forms/CategoryForm': {
            __ALL: [
                {
                    component: () => import('yourFieldComponent'),
                    props: {}, // your props
                },
            ],
        },
    }
    ```

---

**Contained in `Forms/CategoryTranslationForm` component:**

* `@Categories/components/Forms/CategoryTranslationForm` - add new field to category translation form<br>
    <img src="images/extends/extend-category-translation-form.png" alt="Extend category translation form" />
    <br>

    > Use the `__ALL` key if the form has no types.

    Example of use:

    ```javascript
    extendComponents: {
        '@Categories/components/Forms/CategoryTranslationForm': {
            __ALL: [
                {
                    component: () => import('yourFieldComponent'),
                    props: {}, // your props
                },
            ],
        },
    }
    ```

---

[module-core]: frontend/modules/core
