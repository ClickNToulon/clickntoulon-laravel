<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {computed} from "vue";

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-semibold leading-5 text-azure-800 focus:outline-none transition duration-150 ease-in-out'
    : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-semibold leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 transition duration-150 ease-in-out'
);

</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
