<script>
export default {
props: {
  type: {
        type: String,
        default: 'submit'
    }
  }}
</script>

<template>
    <button :type="type" class="justify-center px-4 py-2 bg-gray-800 rounded text--white">
        <slot />
    </button>
</template>
