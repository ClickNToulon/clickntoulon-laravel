<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {computed} from "vue";

const props = defineProps(['active']);

const classes = computed(() => props.active
    ? 'outline-none max-w-fit flex items-center space-x-2 rounded-full px-3 py-1.5 bg-lightorange text-textblack font-semibold transition duration-200 ease-in-out'
    : 'outline-none max-w-fit flex items-center space-x-2 rounded-full px-3 py-1.5 hover:bg-lightorange hover:text-textblack font-semibold transition duration-200 ease-in-out'
);
</script>

<template>
    <Link :class="classes">
        <slot />
    </Link>
</template>
