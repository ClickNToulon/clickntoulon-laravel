<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="inline-flex items-center justify-center px-4 py-2 bg-sky-500 rounded-xl font-bold text-white hover:bg-sky-600 active:bg-sky-700 focus:outline-none focus:shadow-outline-gray transition ease-in-out duration-150">
        <slot />
    </button>
</template>
