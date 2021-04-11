# Authentication

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/authentication`   |
| Order         | `20`                     |
| Aliases       | `@Authentication`: `/`       |
| Required       | true     |

### Description

A module that distributes information about user authentication.


### Extending placeholders

#### Extend Components
**Contained in `Layout/Login.vue` component:**

> URL path: `/`

* `@Authentication/components/Layout/Login/footerInfo` - add new footer information.<br>
    <img src="images/extends/extend-login-footer-info.png" alt="Extend login footer info" />
    <br>
    Example of use:

    ```javascript
        extendComponents: {
             '@Authentication/components/Layout/Login/footerInfo': [
                {
                    component: () => import('yourLinkComponent'),
                },
            ],
        }
    ```
    ---

#### Extend Method
**Contained in `login/index.vue` page:**

> URL path: `/`

* `@Authentication/pages/login/loginState` - add new login state with form and infographic background.<br>
    <img src="images/extends/extend-login-page-state.png" alt="Extend login page state" />
    <br>
    Example of use:

    ```javascript
        extendMethods: {
            '@Authentication/pages/login/loginState': () => ({
                TEST: {
                    formComponent: Components.LoginCredentialsForm2,
                    bgUrl: require('@Authentication/assets/images/infographics/calling-man.svg'),
                },
            }),
        }
    ```
    ---
