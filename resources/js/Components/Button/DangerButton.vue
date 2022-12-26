<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded-xl font-semibold text-white focus:outline-none">
        <slot />
    </button>
</template>
