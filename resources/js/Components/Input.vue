<script>
// import { onMounted, ref } from 'vue';
export default {
 data: () => ({
    input:null
  }),

emits:['update:modelValue'],

props:  ['modelValue'],

mounted(){
  if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
}
}
</script>

<template>
    <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>
