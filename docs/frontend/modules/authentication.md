# Authentication

A module that distributes information about user authentication.

## Configuration

<br>

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/authentication`   |
| Order         | `20`                     |
| Aliases       | `@Authentication`: `/`       |
| Relations     | [`@Core`][module-core]  |
| Required       | true     |

## Extending

### Pages

#### Layout/Login.vue

> URL path: `/`

It might be extended in following places:
- **Footer**
    - **key:** `@Authentication/components/Layout/Login/footerInfo`

    <img src="images/extends/authentication/extend-authentication-login-footer-info.png" alt="Extend login footer info" />

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

- **Form**
    - **key:** `@Authentication/pages/login/loginState`
    
    Example of use:

    ```javascript
    extendMethods: {
        '@Authentication/pages/login/loginState': () => ({
            LOGIN_FORM_KEY: {
                formComponent: Components.CustomLoginForm,
                bgUrl: require('@Authentication/assets/images/infographics/calling-man.svg'),
            },
        }),
    }
    ```
  
    The **`LOGIN_FORM_KEY`** might be:
        - PASSWORD_RECOVERY
  
            <img height="400" src="images/extends/authentication/extend-authentication-recovery-password-form.png" alt="Extend authentication recovery password form" />
  
        - CHECK_EMAIL
  
            <img height="400" src="images/extends/authentication/extend-authentication-check-email-form.png" alt="Extend authentication check email form" />
  
        - NEW_PASSWORD

            <img height="400" src="images/extends/authentication/extend-authentication-new-password-form.png" alt="Extend authentication new password form" />

        - HELP

            <img height="400" src="images/extends/authentication/extend-authentication-help-form.png" alt="Extend authentication help form" />

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
    '@Authentication/store/authentication/action/METHOD/__HOOK': ({
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

##### getUser

- before `GET` request is send
    - **key**: `@Authentication/store/authentication/action/getUser/__before`
    - **arguments:**
        - `$this` - app context

- after `GET` request has succeeded
    - **key**: `@Authentication/store/authentication/action/getUser/__after`
    - **arguments:**
        - `$this` - app context
        - `data` - user data

---

[module-core]: frontend/modules/core
