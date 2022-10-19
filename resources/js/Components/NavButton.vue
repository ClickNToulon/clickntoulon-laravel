<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Link class="inline-flex items-center justify-center whitespace-nowrap">
        <div class="m-auto bg-azure-800 px-4 py-2 rounded-lg text-sm font-semibold text-white flex">
            <slot />
        </div>
    </Link>
</template>
