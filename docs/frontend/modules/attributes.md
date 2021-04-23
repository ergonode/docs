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

#### attributes/index.vue

Attributes page is under

> URL path: `/attributes/grid`

It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@Attributes/pages/attributes/mainAction`

    <img width="600" src="images/extends/attributes/extend-attributes-main-action.png" alt="Attributes toolbar main action extend">

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

#### attributes/_attribute/_id.vue

Attribute edit page is under

> URL path: `/attributes/attribute/{UUID}`

It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@Attributes/pages/attributes/_attribute/mainAction`

    <img width="600" src="images/extends/attributes/extend-attribute-edit-main-action.png" alt="Attribute toolbar main action extend">

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

### Components

#### AttributeSideBarElement

- An icon for the attribute sidebar element
    - **key:** `@Attributes/extends/components/SideBars/AttributeSideBarElement/icons`
    - **type:** an attribute type to extend e.g. `TEXT`

    <img width="300" src="images/extends/attributes/extend-attribute-side-bar-element-icon.png" alt="Attribute sidebar extend icon element">

    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/extends/components/SideBars/AttributeSideBarElement/icons': [
            {
                [TYPES.GALLERY]: [
                    {
                        component: Icons.IconGallery,
                    },
                ],
            }, 
        ],
    }, 
    ```

    ---

#### AttributeForm

- Form might be extended with any additional field by:
    - **key:** `@Attributes/components/Forms/AttributeForm`
    - **type:** an attribute type to extend e.g. `TEXT`

    <img width="400" src="images/extends/attributes/extend-attribute-form-group.png" alt="Attribute form group extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/components/Forms/AttributeForm': {
            __ALL: [
                {
                    component: Components.AttributeFormGroups,
                    props: {},
                    order: 10,
                },
            ],
        },
    }, 
    ```

---    

#### AttributesGrid

Attributes grid might have extended header actions, footer and props:
- **Header**
    - **key:** `@Attributes/components/Grids/AttributesGrid/actionHeader`

    <img width="500" src="images/extends/attributes/extend-attributes-action-header.png" alt="Attributes grid actions header extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/components/Grids/AttributesGrid/actionHeader': [
            {
                component: () => import('yourActionHeaderComponent'),
                props: {},
            },
        ],
    }, 
    ```

    ---
  
- **Footer**
    - **key:** `@Attributes/components/Grids/AttributesGrid/footer`

    <img width="700" src="images/extends/attributes/extend-attributes-grid-footer.png" alt="Attributes grid footer extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/components/Grids/AttributesGrid/footer': [
            {
                component: () => import('yourFooterComponent'),
                props: {},
            },
        ],
    }, 
    ```
    ---

- Extending props is described [**here**](frontend/modules/ui?id=overwriting-props). Taking an above example to present **AttributesGrid** header you must define

    ```javascript
    extendMethods: {
        '@Attributes/components/Grids/AttributesGrid/props': () => ({
            grid: [
                {
                    key: 'is-header-visible',
                    value: true,
                    priority: 10,
                },
            ],
        }),
    },
    ```
  
---

#### AttributeTranslationForm

- Form might be extended with any additional field by:
    - **key:** `@Attributes/components/Forms/AttributeTranslationForm`
    - **type:** an attribute type to extend e.g. `TEXT`

    <img width="400" src="images/extends/attributes/extend-attribute-translation-form-placeholder.png" alt="Attribute translation form placeholder extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Attributes/components/Forms/AttributeTranslationForm': {
            [TYPES.NUMERIC]: [
                {
                    component: Components.AttributeTranslationFormPlaceholder,
                },
            ],
        },
    }, 
    ```
---

### Vuex

Extending store may be possible by providing extend methods.

- The `METHOD` is defining name of vuex action

- The `__HOOK` might be:
    - `__before` 
    - `__after`

Example of use:

```javascript
extendMethods: {
    '@Attributes/store/attribute/action/METHOD/__HOOK': ({
        $this,
        ...rest
    }) => {
        // Might either return sth nor nothing
        
        return {};
    }
}
```

---

#### Methods
We do provide support for following method extending:

##### createAttribute

- before `POST` request is send
    - **key**: `@Attributes/store/attribute/action/createAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type
        - `data` - attribute data to post

- after `POST` request has succeed
    - **key**: `@Attributes/store/attribute/action/createAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type
        - `data` - attribute data to post and with created attribute `id`

---

##### getAttribute

- before `GET` request is send
    - **key**: `@Attributes/store/attribute/action/getAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute data
        ```javascript
        {
           id: 'ATTRIBUTE_ID'
        }
        ```

- after `GET` request has succeed
    - **key**: `@Attributes/store/attribute/action/getAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type
        - `data` - attribute data
    
---

##### updateAttribute

- before `PUT` request is send
    - **key**: `@Attributes/store/attribute/action/updateAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type
        - `data` - attribute data to put

- after `PUT` request has succeed
    - **key**: `@Attributes/store/attribute/action/updateAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type
        - `data` - attribute data to put

---

##### removeAttribute

- before `DELETE` request is send
    - **key**: `@Attributes/store/attribute/action/removeAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type

- after `DELETE` request has succeed
    - **key**: `@Attributes/store/attribute/action/removeAttribute/__before`
    - **arguments:**
        - `$this` - app context
        - `type` - attribute type

---

[module-attribute-groups]: frontend/modules/attribute-groups
[module-core]: frontend/modules/core
