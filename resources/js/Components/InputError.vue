<script>
export default {
 props:  ['message']
 }
</script>

<template>
    <div v-show="message">
        <p class="text-sm text--red">
            {{ message }}
        </p>
    </div>
</template>
