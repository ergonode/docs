# Products

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/products`   |
| Order         | `70`                     |
| Aliases       | `@Products`: `/`       |
| Relations     | [`@Attributes`][module-attributes]<br> [`@Templates`][module-templates] <br> [`@Segments`][module-segments]  |

### Description

A module that distributes information about products.

### Extending placeholders

#### Extend Components
**Contained in `catalog/index.vue` page:**

* `@Products/pages/catalog/mainAction` - add new button next to `NEW PRODUCT`<br>
    <img src="images/extends/extend-main-action.png" alt="Extend main action" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Products/pages/catalog/mainAction': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

* `@Products/pages/catalog/injectModal` - inject new modal on product grid page.<br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Products/pages/catalog/injectModal': [
                {
                    component: () => import('yourModalComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

**Contained in `ProductCatalogTab` component:**

* `@Products/components/Tabs/ProductCatalogTab/actionHeader` - add new button next to `FILTERS`<br>
    <img src="images/extends/extend-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Products/components/Tabs/ProductCatalogTab/actionHeader': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---
* `@Products/components/Tabs/ProductCatalogTab/footer` - add new button next to `SAVE CHANGES`<br>
    <img src="images/extends/extend-footer.png" alt="Extend footer"/>
    <br>

    Example of use:

    ```javascript
        extendComponents: {
            '@Products/components/Tabs/ProductCatalogTab/footer': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

**Contained in `ProductPage` component:**

* `@Products/components/Pages/ProductPage/mainAction` - add new button next to `REMOVE PRODUCT`<br>
    <img src="images/extends/extend-edit-action-header.png" alt="Extend action header" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
            '@Products/components/Pages/ProductPage/mainAction': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

#### Extend Methods
**Contained in `ProductCatalogTab` component:**

* `@Products/components/Tabs/ProductCatalogTab/verticalTabs` - add new vertical tab<br>
    <img src="images/extends/extend-vertical-tab.png" alt="Extend vertical tab" />
    <br>

    Example of use:

    ```javascript
        extendMethods: {
                '@Products/components/Tabs/ProductCatalogTab/verticalTabs': () => [
                {
                    title: 'Test',
                    component: () => import('yourVerticalTabComponent'),
                    iconComponent: () => import('yourTabIcon'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---


[module-attributes]: frontend/modules/attributes
[module-templates]: frontend/modules/templates
[module-segments]: frontend/modules/segments
