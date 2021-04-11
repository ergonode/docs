# Core

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/core`   |
| Order         | `10`                     |
| Aliases       | `@Core`: `/`       |
| Relations     | [`@UI`][module-ui] <br> [`@Attributes`][module-attributes] <br> [`@Media`][module-media] |
| Required       | true     |

### Description

A module that distributes information about core mechanisms.


### Extending placeholders
#### Extend Method

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
[module-attributes]: frontend/modules/attributes
[module-media]: frontend/modules/media