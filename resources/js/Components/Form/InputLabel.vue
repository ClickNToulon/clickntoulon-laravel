<script setup>
defineProps(['value']);
</script>

<template>
    <label class="block font-semibold text-sm text-gray-700 uppercase tracking-wide">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
