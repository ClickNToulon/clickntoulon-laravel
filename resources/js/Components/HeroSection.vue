<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <!-- Hero -->
    <section class="mx-auto lg:container h-[400px] lg:h-[700px] px-4 sm:px-6 lg:px-8 h-full mb-16 lg:pb-0">
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
    <section class="lg:container mx-auto px-4 sm:px-6 lg:px-8 pb-32">
        <div class="flex flex-col items-center space-y-10">
            <h2 class="text-4xl font-semibold text-center text-slate-900">
                Les boutiques partenaires
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 w-full mx-auto cols">
                <div class="col-span-1 relative">
                    <Link href="" class="absolute inset-0 hover:bg-black/5 rounded-xl"/>
                    <img src="https://images.unsplash.com/photo-1472851294608-062f824d29cc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" class="rounded-xl" alt="shop image">
                    <div class="p-4 space-y-2">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold tracking-wider text-slate-900">
                                Boulangerie du coin
                            </h3>
                            <div class="space-x-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <span class="text-sm font-medium text-slate-900">
                                    2 Avenue de la République 83000 Toulon
                                </span>
                            </div>
                        </div>
                        <p class="text-slate-900 truncate">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                        </p>
                    </div>
                </div>
                <div class="col-span-1 relative">
                    <Link href="#" class="absolute inset-0 hover:bg-black/5 rounded-xl"/>
                    <img src="https://images.unsplash.com/photo-1472851294608-062f824d29cc?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" class="rounded-xl" alt="shop image">
                    <div class="p-4 space-y-2">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold tracking-wider text-slate-900">
                                Boulangerie du coin
                            </h3>
                            <div class="space-x-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <span class="text-sm font-medium text-slate-900">
                                    2 Avenue de la République 83000 Toulon
                                </span>
                            </div>
                        </div>
                        <p class="text-slate-900 truncate">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod. lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
