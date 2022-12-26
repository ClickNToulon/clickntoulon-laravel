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
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="rounded border-gray-300 text-darkorange shadow-sm h-5 w-5 focus:ring-0 focus:ring-offset-0">
</template>
