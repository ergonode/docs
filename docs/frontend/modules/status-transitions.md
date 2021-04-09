# Status transitions

A module that distributes information about status transitions.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/status-transitions`   |
| Order         | `150`                     |
| Aliases       | `@Transitions`: `/`       |
| Relations     | [`@Core`][module-core] <br> [`@Conditions`][module-conditions] <br> [`@Statuses`][module-product-statuses] |

## Extending

### Methods

**Contained in `Tabs/ConditionDesignerTab` component:**

> URL path: `/status-transitions/transition/{UUID}--{UUID}/designer`

* `@Transitions/components/Tabs/ConditionDesignerTab/verticalTabs` - add new vertical tab on grid page.<br>
    <img src="images/extends/extend-vertical-tab-transition-designer.png" alt="Extend vertical tab on transition designer" />
    <br>
    Example of use:

    ```javascript
    extendMethods: {
        '@Transitions/components/Tabs/ConditionDesignerTab/verticalTabs': ({
            props,
        }) => [
            {
                title: 'Test tab',
                component: () => import('yourTabComponent'),,
                icon: () => import('yourIconComponent'),,
                props,
            },
        ],
    }
    ```
    ---



[module-core]: frontend/modules/core
[module-conditions]: frontend/modules/conditions
[module-product-statuses]: frontend/modules/product-statuses
