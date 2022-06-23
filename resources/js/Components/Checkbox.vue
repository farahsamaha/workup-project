<script>
export default {
props: {
   checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    }
  },

 computed: {
    proxyChecked:{
            get() {
        return props.checked;
    },

       set(val) {
        emit("update:checked", val);
    }}
 },
    emits:['update:checked']
}
</script>

<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="rounded">
</template>
