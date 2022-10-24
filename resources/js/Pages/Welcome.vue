<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navigation/Navbar.vue';
import HeroSection from '@/Components/HeroSection.vue';

defineProps({
    canLogin: Boolean,
    roles: Array,
})
</script>

<template>
    <Head title="Welcome"><title>Welcome</title></Head>
    <Navbar :roles="roles"/>
    <!-- Hero Section -->
    <HeroSection />
    <!-- End Hero Section -->
</template>
