# AttributeGroups

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

#### attribute-groups/index.vue

Attribute groups page is under

> URL path: `/attribute-groups/grid`
  
It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@AttributeGroups/pages/attribute-groups/mainAction`

    <img width="600" src="images/extends/attributeGroups/extend-attribute-groups-main-action.png" alt="Attributes toolbar main action extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@AttributeGroups/pages/attribute-groups/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

    ---

#### attribute-groups/_group

Attribute group edit page is under

> URL path: `/attribute-groups/group/{UUID}`

It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@AttributeGroups/pages/attribute-groups/_group/mainAction`

    <img width="600" src="images/extends/attributeGroups/extend-attribute-group-edit-main-action.png" alt="Attribute toolbar main action extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@AttributeGroups/pages/attribute-groups/_group/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

    ---

### Components

#### AttributeGroupForm

- Form might be extended with any additional field by:
    - **key:** `@AttributeGroups/components/Forms/AttributeGroupForm`

    <img width="400" src="images/extends/attributeGroups/extend-attribute-group-form.png" alt="Attribute group form extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@AttributeGroups/components/Forms/AttributeGroupForm': {
            __ALL: [
                {
                    component: yourFormFieldComponent,
                    props: {},
                    order: 10,
                },
            ],
        },
    }, 
    ```

---

#### AttributeGroupTranslationForm

- Form might be extended with any additional field by:
    - **key:** `@AttributeGroups/components/Forms/AttributeGroupTranslationForm`

    <img width="400" src="images/extends/attributeGroups/extend-attribute-group-translation-form.png" alt="Attribute group translation form extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@AttributeGroups/components/Forms/AttributeGroupTranslationForm': {
            __ALL: [
                {
                    component: yourFormFieldComponent,
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
    - `__before` - before request is called
    - `__after` - after request is finished

Example of use:

```javascript
extendMethods: {
    '@AttributeGroups/store/attributeGroup/action/METHOD/__HOOK': ({
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

##### createAttributeGroup

- before `POST` request is send
    - **key**: `@AttributeGroups/store/attributeGroup/action/createAttributeGroup/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data to post

- after `POST` request has succeeded
    - **key**: `@AttributeGroups/store/attributeGroup/action/createAttributeGroup/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data to post and with created attribute group `id`

---

##### getAttributeGroup

- before `GET` request is send
    - **key**: `@AttributeGroups/store/attributeGroup/action/getAttributeGroup/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data
        ```javascript
        {
           id: 'ATTRIBUTE_GROUP_ID'
        }
        ```

- after `GET` request has succeeded
    - **key**: `@AttributeGroups/store/attributeGroup/action/getAttributeGroup/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data

---

##### updateAttributeGroup

- before `PUT` request is send
    - **key**: `@AttributeGroups/store/attributeGroup/action/updateAttributeGroup/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data to put

- after `PUT` request has succeeded
    - **key**: `@AttributeGroups/store/attributeGroup/action/updateAttributeGroup/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data to put

---

##### removeAttributeGroup

- before `DELETE` request is send
    - **key**: `@AttributeGroups/store/attributeGroup/action/removeAttributeGroup/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - attribute group data
        ```javascript
        {
           id: 'ATTRIBUTE_GROUP_ID'
        }
        ```

- after `DELETE` request has succeeded
    - **key**: `@AttributeGroups/store/attributeGroup/action/removeAttributeGroup/__after`
    - **arguments:**
        - `$this` - app context

---

[module-core]: frontend/modules/core
