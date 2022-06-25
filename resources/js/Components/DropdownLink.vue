<script>
import { Link } from '@inertiajs/inertia-vue';
import '@inertiajs/inertia-vue';
export default {
components: {
    Link
}}

</script>

<template>
    <Link class="px-4 py-2 text-left">
        <slot />
    </Link>
</template>
