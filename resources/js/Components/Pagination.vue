<template>
    <div v-if="links.length > 3">
        <div class="flex">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="mr-2 px-4 py-2 text-sm leading-4 text-gray-400 border rounded-lg"
                     v-html="link.label" />
                <inertia-link v-else
                              class="mr-2 px-4 py-2 text-sm leading-4 border rounded-lg hover:border-slate-300 focus:border-azure-500 focus:text-azure-500"
                              :class="{ 'bg-azure-800 text-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>
<script setup>
import { InertiaLink } from '@inertiajs/inertia-vue3';
defineProps({links: {type: Array}});
</script>
