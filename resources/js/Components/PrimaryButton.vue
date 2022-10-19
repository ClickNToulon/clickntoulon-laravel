<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-4 py-2 bg-azure-800 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-wide hover:bg-azure-600 active:bg-azure-900 focus:outline-none focus:border-azure-900 focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>
