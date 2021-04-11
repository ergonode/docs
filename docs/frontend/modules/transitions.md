# Status transitions

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/status-transitions`   |
| Order         | `150`                     |
| Aliases       | `@Transitions`: `/`       |
| Relations     | [`@Conditions`][module-conditions] <br> [`@Statuses`][module-statuses] |

### Description

A module that distributes information about status transitions.


### Extending placeholders
#### Extend Method

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



[module-conditions]: frontend/modules/conditions
[module-statuses]: frontend/modules/statuses