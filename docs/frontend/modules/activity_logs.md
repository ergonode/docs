# Activity Logs

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/activity-logs`|
| Order         | `110`                    |
| Relations     | [`@Users`][module-user]  |
| Aliases       | `@ActivityLogs`: `/`     |

### Description

A module that distributes information about user activities.

### Extending placeholders

#### Extend Components
**Contained in `activity-logs/index.vue` page:**

> URL path: `activity-logs/grid`

* `@ActivityLogs/pages/activity-logs/mainAction` - add new button to `TitleBar` element<br>
    <img src="images/extends/extend-empty-title-bar.png" alt="Extend main action" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
            '@ActivityLogs/pages/activity-logs/mainAction': [
                {
                    component: () => import('yourButtonComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

* `@ActivityLogs/pages/activity-logs/injectModal` - inject new modal on activity log grid page.<br>
    Example of use:

    ```javascript
        extendComponents: {
            '@ActivityLogs/pages/activity-logs/injectModal': [
                {
                    component: () => import('yourModalComponent'),
                    props: {}, // your props
                },
            ],
        }
    ```
    ---

[module-user]: frontend/modules/users