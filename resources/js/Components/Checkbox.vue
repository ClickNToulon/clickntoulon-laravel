<script setup>
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    },
});

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    throughout
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="rounded-md border-gray-300 text-sky-500 shadow-sm h-5 w-5 focus:border-sky-200 focus:ring focus:ring-sky-200 focus:ring-opacity-50">
</template>
