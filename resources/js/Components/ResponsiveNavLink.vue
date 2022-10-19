<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'flex pl-3 pr-4 py-2 border-l-[3px] border-azure-800 text-base font-semibold text-azure-800 focus:outline-none focus:text-azure-700 focus:bg-azure-100 focus:border-azure-700 transition duration-150 ease-in-out'
    : 'flex pl-3 pr-4 py-2 border-l-[3px] border-transparent text-base font-semibold text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
