<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navigation/Navbar.vue';

defineProps({
    canLogin: Boolean,
    roles: Array,
})
</script>

<template>
    <Head title="Welcome"><title>Welcome</title></Head>
    <Navbar :roles="roles"/>
</template>
