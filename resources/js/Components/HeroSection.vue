<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <!-- Hero -->
    <section class="mx-auto lg:container h-[400px] lg:h-[700px] px-4 sm:px-6 lg:px-8 h-full">
        <div class="flex flex-col lg:flex-row items-center h-full gap-y-10 lg:gap-y-0 lg:gap-x-20">
            <div class="w-full h-full flex items-center">
                <div class="flex flex-col space-y-10 w-full max-w-2xl z-50">
                    <h1 class="text-7xl font-extrabold tracking-wide text-azure-800">
                        Made for Toulon in Toulon
                    </h1>
                    <h3 class="text-xl font-medium tracking-wide text-slate-900">
                        Une plateforme de Click&Collect sur Toulon, réalisé par des étudiants, à Toulon.
                    </h3>
                    <div class="flex justify-start">
                        <Link :href="route('products.index')" class="bg-azure-800 text-white flex items-center text-lg font-semibold py-4 px-10 rounded-xl shadow-lg hover:shadow-none transition duration-300 ease-in-out">
                            Parcourir les produits
                            <!-- Heroicon name: solid/arrow-right -->
                            <svg class="w-6 h-6 ml-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </Link>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-4xl hidden lg:flex h-full items-center">
                <img src="/images/online-shopping.jpg" class="rounded-xl shadow-lg" alt="Test">
            </div>
        </div>
    </section>
    <!-- End Hero -->
</template>
