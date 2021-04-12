# Extend component property

Sometimes it may happen that in main modules, prepared to use components do not meet some guidelines and we want to modify only some properties.<br>
To modify existing components you need to use built-in extension mechanism provided by **VueMS** library.

We have prepared a mechanism that allows you to easily extend any component with properties that are passed to it.<br>
To easily use this mechanism, a global `$extendedProps` method has been created.

This method is to read the transferred properties with other modules and return an object with the properties.

<div class="Alert Alert--alert">

If a property is already passed in a component then according to the **Vue 2.x** documentation it will not be replaced by <code>v-bind</code>.

More here: https://v3.vuejs.org/guide/migration/v-bind.html

</div>

The method takes 2 arguments:
- key - the key for the extension mechanism,
- name - the name of the component we want extend,

The example shows a universal mixin writing properties to the variable `extendedProps`.
```javascript
export default ({
    extendedKey = null, extendedNames = [],
}) => ({
    data() {
        return {
            extendedProps: {},
        };
    },
    async created() {
        await Promise.all(extendedNames.map(async (key) => {
            this.extendedProps[key] = await this.$extendedProps({
                key: extendedKey,
                name: key,
            });
        }));
    },
});
```

Example usage:
```vue
<template>
    <Grid
        :columns="columns"
        :rows="rows"
        ...
        v-bind="extendedProps['grid']" />
</template>
<script>
    import extendPropsMixin from '@Core/mixins/extend/extendProps';
    export default {
        name: 'UnitsGrid',
        mixins: [
            extendPropsMixin({
                extendedKey: '@Core/components/Grids/UnitsGrid/props',
                extendedNames: [
                    'grid',
                ],
            }),
        ],
        ...
    }
</script>
```

Example of an extension definition from another module. <br>
Extension can be added in file `config/extends.js` in object key `extendMethods`.

> If you want, you can specify the **priority** of the extended property. <br>
If there is more than one key, then the one with the higher priority will be selected.

```javascript
export default {
    extendMethods: {
        '@Core/components/Grids/UnitsGrid/props': () => ({
            grid: [
                {
                    key: 'is-header-visible',
                    value: true,
                    priority: 20,
                },
                {
                    key: 'is-border',
                    value: true,
                },
            ],
        }),
    }
}
```
Structure of the transferred object:
 - `key` - property name
 - `value` - property value,
 - `priority` - property priority. If this property is missing, the value `0` is set.

