<script setup>
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <!-- Hero -->
    <div class="isolate">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
            <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                <defs>
                    <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9089FC"></stop>
                        <stop offset="1" stop-color="#FF80B5"></stop>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <section class="mx-auto h-[400px] lg:h-[700px] px-4 sm:px-16 lg:px-40 h-full">
            <div class="flex flex-col justify-center items-center h-full w-full mx-auto space-y-10 max-w-7xl">
                <div class="relative group overflow-hidden rounded-xl py-1.5 px-4 text-sm ring-1 ring-gray-900/20 hover:ring-gray-900/30">
                    <span class="text-gray-700 group-hover:text-slate-900 font-semibold flex">
                        Grande ouverture le 1er Janvier 2023.
                        <a href="" class="ml-1 font-bold text-sky-500 flex items-center space-x-1">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            En savoir plus
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </span>
                </div>
                <h1 class="text-7xl font-bold text-center text-sky-500 tracking-tight">
                    Made for Toulon in Toulon
                </h1>
                <h3 class="text-2xl tracking-tight text-slate-900">
                    Une plateforme de Click&Collect sur Toulon, réalisé par des étudiants, à Toulon.
                </h3>
                <div class="flex justify-start space-x-4">
                    <Link :href="route('produits.index')" class="bg-slate-900 text-white flex items-center text-lg font-semibold py-2 px-4 rounded-2xl hover:shadow-none transition duration-700 ease-in-out">
                        Parcourir les produits
                    </Link>
                    <Link :href="route('register')" class="flex text-slate-900 items-center text-lg font-semibold py-2 px-6 rounded-xl hover:shadow-none hover:bg-black hover:bg-opacity-5 transition duration-700 ease-in-out">
                        <span class="hover-underline-animation relative">
                            S'inscrire
                        </span>
                        <!-- Heroicon name: solid/arrow-right -->
                        <svg class="w-6 h-6 ml-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                    </Link>
                </div>
            </div>
        </section>
    </div>
    <!-- End Hero -->
</template>
