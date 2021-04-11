# Channels

### Configuration

| Name          | Value                    |
|---------------|--------------------------|
| Name          | `@ergonode/channels`   |
| Order         | `190`                     |
| Aliases       | `@Channels`: `/`       |

### Description

A module that distributes information about channels.

### Extending placeholders

* extendMethods <br>
    **Contained in vuex actions:**
    * `@Channels/store/channel/action/getSchedulerConfiguration/__before` : Inject in `getSchedulerConfiguration` method, before `GET` request.
    * `@Channels/store/channel/action/getSchedulerConfiguration/__after` : Inject in `getSchedulerConfiguration` method, after `GET` request.
    * `@Channels/store/channel/action/getChannel/__before` : Inject in `getChannel` method, before `GET` request.
    * `@Channels/store/channel/action/getChannel/__after` : Inject in `getChannel` method, after `GET` request.
    * `@Channels/store/channel/action/createChannel/__before` : Inject in `createChannel` method, before `POST` request.
    * `@Channels/store/channel/action/createChannel/__after` : Inject in `createChannel` method, after `POST` request.
    * `@Channels/store/channel/action/createChannelExport/__before` : Inject in `createChannelExport` method, before `POST` request.
    * `@Channels/store/channel/action/createChannelExport/__after` : Inject in `createChannelExport` method, after `POST` request.
    * `@Channels/store/channel/action/updateChannel/__before` : Inject in `updateChannel` method, before `PUT` request.
    * `@Channels/store/channel/action/updateChannel/__after` : Inject in `updateChannel` method, after `PUT` request.
    * `@Channels/store/channel/action/updateScheduler/__before` : Inject in `updateScheduler` method, before `PUT` request.
    * `@Channels/store/channel/action/updateScheduler/__after` : Inject in `updateScheduler` method, after `PUT` request.
    * `@Channels/store/channel/action/removeChannel/__before` : Inject in `removeChannel` method, before `DELETE` request.
    * `@Channels/store/channel/action/removeChannel/__after` : Inject in `removeChannel` method, after `DELETE` request.
