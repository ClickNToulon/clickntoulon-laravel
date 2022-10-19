<script setup>
import Sidebar from '@/Components/Sidebar.vue';
import Navbar from "@/Components/Navbar.vue";

</script>

<template>
    <div class="flex flex-col min-h-screen text-base font-sans h-full w-full">
        <Navbar />
        <div class="flex-1 mx-auto w-full max-w-[1740px] h-full bg-white pt-[64px] my-12">
            <div class="flex h-full">
                <Sidebar/>
                <div class="w-full max-w-[1590px] sm:max-w-[1542px] lg:max-w-[1526px] relative px-4 lg:px-8 lg:ml-[250px] overflow-y-hidden overflow-x-auto">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
