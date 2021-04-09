# Core

A module that distributes information about core mechanisms.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/core`   |
| Order         | `10`                     |
| Aliases       | `@Core`: `/`       |
| Relations     | [`@UI`][module-ui] <br> [`@Authentication`][module-authentication] |
| Required       | true     |

## Extending

### Methods

**Contained in `Tabs/LanguagesSettingsTab` component:**

> URL path: `/settings/languages-inheritance`

* `@Core/components/Tabs/LanguagesSettingsTab/verticalTabs` - add new vertical tab on grid page.<br>
    <img src="images/extends/extend-settings-languages-tab.png" alt="Extend vertical tab on settings" />
    <br>
    Example of use:

    ```javascript
    extendMethods: {
        '@Core/components/Tabs/LanguagesSettingsTab/verticalTabs': ({
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


[module-ui]: frontend/modules/ui
[module-authentication]: frontend/modules/authentication
