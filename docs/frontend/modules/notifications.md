# Notifications

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/notifications`   |
| Order         | `40`                     |
| Aliases       | `@Notifications`: `/`       |

### Description

A module that distributes information about notifications.

### Extending Action center

* To extend progress section in **Action center** extended method for key `@Notifications/store/notification/action/getProcessingNotifications` has to be defined. 
    * Navigate to `config` folder in your module
    * Create `extends.js` file if not exist
    * Define `extendMethods`
      Example of use:
    
        ```javascript
        extendMethods: {
            '@Notifications/store/notification/action/getProcessingNotifications': async ({
                $this,
            }) => {
                const exampleNotifications = await getExampleNotifications({
                    $axios: $this.app.$axios,
                });
      
                const processingNotifications = {
                    component: Components.NotificationListExportProcessingItem,
                    notifications: exampleNotifications.map((notification) => ({
                        ...notification,
                        createdAt: notification.started_at,
                        readAt: false,
                        message: `Importing "${notification.name}"`,
                    })),
                    section: ACTION_CENTER_SECTIONS.PROCESSING,
                };
                
                return processingNotifications;
            }
        }
        ```
    
      The model of section has to have defined:
        * `component` - the notification list item component
        * `notifications` - list of notifications
        * `section` - section to which given notifications are going to be assigned - in that case we want to extend processing section
    
      The model of `notification` might be fully customized, it does not require any data structure. In case that you would like to use components **NotificationListItemTemplate** and **NotificationListItemPrependTemplate** the following structure is required:
        * `createdAt` - determines time at which event has happened
        * `readAt` - determines if notification is read, will indicate little badge for prepend slot
        * `message` - determines structure of notification message. By providing message in given format `Importing "SAP ERP Eastwest Europe Data"` - the bolded text has to be inside double quotes:
    
    <img src="images/extends/extend-action-center-progress-section-item.png" alt="Extend action center progress section item" />
    
    * We recommend to place extended components into `extends` folder:
    
    <img src="images/extends/extend-notification-components-structure.png" alt="Extend notification components structure" width="500" />


