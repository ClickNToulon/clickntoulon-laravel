<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-xl font-medium text-gray-900 shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
