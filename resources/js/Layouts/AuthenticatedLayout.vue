<script setup>
import Navbar from "@/Components/Navigation/Navbar.vue";
</script>

<template>
    <div>
        <div class="min-h-screen">
            <Navbar/>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="mx-auto py-6 pl-3 pr-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
