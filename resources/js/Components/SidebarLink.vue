<script setup>
import { computed } from "vue";

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? 'group flex items-center lg:text-sm lg:leading-6 font-semibold text-azure-800 cursor-pointer'
    : 'group flex items-center lg:text-sm lg:leading-6 font-semibold text-slate-700 hover:text-azure-800 cursor-pointer'
);
</script>

<template>
    <a :href="href" :class="classes">
        <slot />
    </a>
</template>
