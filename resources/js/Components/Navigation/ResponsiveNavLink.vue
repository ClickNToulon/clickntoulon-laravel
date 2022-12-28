<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'outline-none w-auto flex items-center space-x-2 rounded-full px-3 py-1.5 hover:bg-sky-200 hover:text-sky-900 transition duration-200 ease-in-out font-bold'
    : 'outline-none w-auto flex items-center space-x-2 rounded-full px-3 py-1.5 hover:bg-sky-200 hover:text-sky-900 transition duration-200 ease-in-out font-semibold'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
