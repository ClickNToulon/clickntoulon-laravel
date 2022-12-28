<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-3 py-1.5 border-red-600 border rounded-xl font-semibold text-red-600 focus:outline-none">
        <slot />
    </button>
</template>
