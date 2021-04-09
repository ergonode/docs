# Activity Logs

A module that distributes information about user activities.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/activity-logs`|
| Order         | `110`                    |
| Aliases       | `@ActivityLogs`: `/`     |
| Relations     | [`@Users`][module-user] <br> [`@Core`][module-core]  |
| Required       | false     |

## Extending

### Pages

**Contained in `activity-logs/index.vue` page:**

> URL path: `activity-logs/grid`

* `@ActivityLogs/pages/activity-logs/mainAction` - add a new button to `TitleBar` element
  
    <img src="images/extends/extend-empty-title-bar.png" alt="Extend main action" />
  
    Example of use:

    ```javascript
    extendComponents: {
        '@ActivityLogs/pages/activity-logs/mainAction': [
            {
                component: () => import('yourButtonComponent'),
                props: {}, // your props
            },
        ],
    },
    ```

---

[module-user]: frontend/modules/users
[module-core]: frontend/modules/core
