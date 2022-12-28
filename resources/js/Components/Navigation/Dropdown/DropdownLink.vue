<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Link class="flex w-full px-3 py-1.5 text-left items-center font-medium text-gray-700 focus:outline-none hover:text-darkorange">
        <slot />
    </Link>
</template>
