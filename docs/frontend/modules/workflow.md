# Statuses

A module that distributes information about workflow.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/workflow`   |
| Order         | `90`                     |
| Aliases       | `@Workflow`: `/`       |
| Relations     | [`@Core`][module-core] <br> [`@Conditions`][module-conditions]  |
| Required       | false     |

## Extending

### Pages

#### workflow/index.vue

Workflow page is under

> URL path: `/workflow/designer`

It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@Workflow/pages/workflow/mainAction`

    <img width="600" src="images/extends/workflow/extend-workflow-main-action.png" alt="Workflow designer toolbar main action extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@@Workflow/pages/workflow/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

    ---


#### workflow/_status

Workflow status edit page is under

> URL path: `/workflow/status/{UUID}`

It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@Workflow/pages/workflow/_status/mainAction`

    <img width="600" src="images/extends/workflow/extend-workflow-status-edit-main-action.png" alt="Workflow status edit toolbar main action extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Workflow/pages/workflow/_status/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

    ---

#### workflow/_transition

Workflow transition edit page is under

> URL path: `/workflow/transition/{UUID}`

It might be extended in following places:

- Extending Toolbar header by:
    - **key:** `@Workflow/pages/workflow/_transition/mainAction`

    <img width="600" src="images/extends/workflow/extend-workflow-transition-edit-main-action.png" alt="Workflow transition edit toolbar main action extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Workflow/pages/workflow/_transition/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    }
    ```

    ---

### Components

#### WorkflowDesignerLayoutArrow

- Workflow designer transition from to, might be extended with additional action placed at arrow:
    - **key:** `@Workflow/components/Designer/WorkflowDesignerLayoutArrow/arrowActions`

    <img width="300" src="images/extends/workflow/extend-workflow-transition-arrow-action.png" alt="Workflow designer arrow action append slot extend">

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

#### WorkflowStatusForm

- Form might be extended with any additional field by:
    - **key:** `@Workflow/components/Forms/WorkflowStatusForm`

    <img width="400" src="images/extends/workflow/extend-workflow-status-form.png" alt="Workflow status form extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Workflow/components/Forms/WorkflowStatusForm': {
            __ALL: [
                {
                    component: yourFormFieldComponent,
                },
            ],
        },
    }, 
    ```
---

#### WorkflowStatusTranslationForm

- Form might be extended with any additional field by:
    - **key:** `@Workflow/components/Forms/WorkflowStatusTranslationForm`

    <img width="400" src="images/extends/workflow/extend-workflow-status-translation-form.png" alt="Workflow status translation form extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@@Workflow/components/Forms/WorkflowStatusTranslationForm': {
            __ALL: [
                {
                    component: yourFormFieldComponent,
                },
            ],
        },
    }, 
    ```
---

#### WorkflowTransitionForm

- Form might be extended with any additional field by:
    - **key:** `@Workflow/components/Forms/WorkflowTransitionForm`

    <img width="400" src="images/extends/workflow/extend-workflow-status-form.png" alt="Workflow transition form extend">

    Example of use:

    ```javascript
    extendComponents: {
        '@Workflow/components/Forms/WorkflowTransitionForm': {
            __ALL: [
                {
                    component: yourFormFieldComponent,
                },
            ],
        },
    }, 
    ```
---

#### WorkflowTransitionConditionDesignerTab

- Form might be extended with any additional field by:
    - **key:** `@Workflow/components/Tabs/WorkflowTransitionConditionDesignerTab/verticalTabs`
    - **data:**
    ```javascript
    {
        $this: this // component context,
        props: {
            disabled: !this.isAllowedToUpdate, // The props that we would like to pass to the vertical tabbar
        },
    }
    ```

    <img width="300" src="images/extends/workflow/extend-workflow-transition-conditions-sidebar.png" alt="Workflow transition condition sidebar extend">

    Example of use:

    ```javascript
    extendMethods: {
        '@Workflow/components/Tabs/WorkflowTransitionConditionDesignerTab/verticalTabs': ({
            $this,
            props,
        }) => [
            {
                title: $this.$t('@Conditions.transitionExtend.methods.verticalTabTitle'),
                component: Components.ConditionsVerticalTab,
                icon: Icons.IconCategory,
                props: {
                    group: 'workflow',
                    ...props,
                },
            },
        ],
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
    '@Workflow/store/workflow/action/METHOD/__HOOK': ({
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

##### createStatus

- before `POST` request is send
    - **key**: `@Workflow/store/workflow/action/createStatus/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - status data to post

- after `POST` request has succeeded
    - **key**: `@Workflow/store/workflow/action/createStatus/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - status data to post and with created status `id`

---

##### getStatus

- before `GET` request is send
    - **key**: `@Workflow/store/workflow/action/getStatus/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - status data
        ```javascript
        {
           id: 'STATUS_ID'
        }
        ```

- after `GET` request has succeeded
    - **key**: `@Workflow/store/workflow/action/getStatus/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - status data

---

##### updateStatus

- before `PUT` request is send
    - **key**: `@Workflow/store/workflow/action/updateStatus/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - status data to put

- after `PUT` request has succeeded
    - **key**: `@Workflow/store/workflow/action/updateStatus/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - status data to put

---

##### removeStatus

- before `DELETE` request is send
    - **key**: `@Workflow/store/workflow/action/removeStatus/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - status data
        ```javascript
        {
           id: 'STATUS_ID'
        }
        ```

- after `DELETE` request has succeeded
    - **key**: `@Workflow/store/workflow/action/removeStatus/__after`
    - **arguments:**
        - `$this` - app context

---

##### getTransition

- before `GET` request is send
    - **key**: `@Workflow/store/workflow/action/getTransition/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - transition data
        ```javascript
        {
           id: 'TRANSITION_ID'
        }
        ```

- after `GET` request has succeeded
    - **key**: `@Workflow/store/workflow/action/getTransition/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - transition data

---

##### updateTransition

- before `PUT` request is send
    - **key**: `@Workflow/store/workflow/action/updateTransition/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - transition data to put

- after `PUT` request has succeeded
    - **key**: `@Workflow/store/workflow/action/updateTransition/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - transition data to put

---

##### updateTransitions

- before `PUT` request is send
    - **key**: `@Workflow/store/workflow/action/updateTransitions/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - transitions data to put

- after `PUT` request has succeeded
    - **key**: `@Workflow/store/workflow/action/updateTransitions/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - transitions data to put

---

##### removeTransition

- before `DELETE` request is send
    - **key**: `@Workflow/store/workflow/action/removeTransition/__before`
    - **arguments:**
        - `$this` - app context
        - `data` - status data
        ```javascript
        {
            source,
            destination,
        }
        ```

- after `DELETE` request has succeeded
    - **key**: `@Workflow/store/workflow/action/removeTransition/__after`
    - **arguments:**
        - `$this` - app context

---

[module-core]: frontend/modules/core
[module-conditions]: frontend/modules/conditions
