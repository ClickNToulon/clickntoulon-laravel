<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Navbar from '@/Components/Navigation/Navbar.vue';
import Pagination from '@/Components/Navigation/Pagination.vue';
import Footer from '@/Components/Navigation/Footer.vue';
import Checkbox from "@/Components/Form/Checkbox.vue";
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import ProductCard from "@/Components/Product/ProductCard.vue";

defineProps({
    products: Object,
    types: Object,
});

const ad = ref(true);
</script>

<template>
    <Head title="Produits - Simpl'Achat"></Head>
    <Navbar :basket="$page.props.basket" />
    <!-- Sidebar with filters -->
    <section class="mx-auto pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 flex">
        <div class="hidden xl:flex max-w-sm w-full">
            <div class="flex flex-col lg:flex-row justify-between w-full max-w-sm">
                <div class="w-full h-full max-w-md">
                    <div class="p-8 pl-0">
                        <form action="" class="space-y-6" method="get">
                            <div class="flex-col items-center justify-between">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-2">
                                        <h3 class="text-sm uppercase tracking-wide font-semibold text-slate-900">
                                            Catégories
                                        </h3>
                                        <span class="text-xs font-bold bg-lightorange text-slate-900 px-2 py-1 rounded-full">
                                            2
                                        </span>
                                    </div>
                                    <button class="text-darkorange tracking-wide text-sm font-semibold uppercase">
                                        Tout effacer
                                    </button>
                                </div>
                                <div class="flex flex-col h-[190px] overflow-y-auto w-full custom-scrollbar">
                                    <div class="flex items-center space-x-4 w-full" v-for="type in types">
                                        <label class="flex items-center mb-1">
                                            <Checkbox name="types[]" :value="type.id" class="border-2 focus:ring-0" />
                                            <span class="ml-4 text-slate-700 font-medium truncate w-full">{{ type.name }}</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-col items-center justify-between">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-2">
                                        <h3 class="text-sm uppercase tracking-wide font-semibold text-slate-900">
                                            Prix
                                        </h3>
                                        <span class="text-xs font-bold bg-lightorange text-slate-900 px-2 py-1 rounded-full">
                                            0
                                        </span>
                                    </div>
                                    <button class="text-darkorange tracking-wide text-sm font-semibold uppercase">
                                        Tout effacer
                                    </button>
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="flex items-center space-x-4 w-full">
                                        <label class="flex items-center mb-1">
                                            <Checkbox name="prices[]" class="border-2 focus:ring-0" />
                                            <span class="ml-4 text-slate-700 font-medium truncate w-full">Moins de 10€</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-4 w-full">
                                        <label class="flex items-center mb-1">
                                            <Checkbox name="prices[]" class="border-2 focus:ring-0" />
                                            <span class="ml-4 text-slate-700 font-medium truncate w-full">Entre 10 et 50€</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-4 w-full">
                                        <label class="flex items-center mb-1">
                                            <Checkbox name="prices[]" class="border-2 focus:ring-0" />
                                            <span class="ml-4 text-slate-700 font-medium truncate w-full">Entre 50 et 100€</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center space-x-4 w-full">
                                        <label class="flex items-center">
                                            <Checkbox name="prices[]" class="border-2 focus:ring-0" />
                                            <span class="ml-4 text-slate-700 font-medium truncate w-full">Plus de 100€</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 w-full">
                                <label class="flex items-center">
                                    <Checkbox name="on_sale" class="border-2 focus:ring-0" />
                                    <span class="ml-4 text-slate-700 font-medium truncate w-full">Uniquement les produits en promotion</span>
                                </label>
                            </div>
                            <PrimaryButton class="w-full !mt-4" type="submit">Appliquer les filtres</PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vetical line -->
        <div class="hidden xl:block w-1 mt-4 h-[518px] bg-slate-200"></div>
        <!-- Sidebar with filters -->
        <div class="w-full pt-8 xl:pl-8">
            <div class="w-full">
                <!-- Call to action for new products -->
                <!--<div class="rounded-2xl p-6 h-full md:h-64 relative mb-12 md:mb-8" v-show="ad">
                    <img src="/images/random.jpg" alt="" class="absolute inset-0 h-full md:h-64 w-full rounded-2xl">
                    <div class="absolute inset-0 bg-sky-500/75 rounded-2xl"></div>
                    <div class="flex justify-between items-center h-full relative">
                        <div class="flex justify-end items-start h-full flex-col space-y-8 max-w-lg">
                            <h1 class="text-2xl md:text-4xl font-semibold text-white">Unwrap the holidays straight into your living room.</h1>
                            <div class="flex flex-col md:flex-row items-start justify-start space-y-2 md:space-y-0 md:space-x-4 w-full">
                                <button class="text-slate-900 font-bold rounded-lg px-3 py-1.5 bg-white">Browse Holiday Collections</button>
                                <button class="text-white font-bold px-3 py-1.5" @click="ad = false">No thanks</button>
                            </div>
                        </div>
                        <div class="hidden md:flex h-full items-start">-->
                            <!-- Close x to dismiss cta -->
                            <!--<button class="w-8 h-8 focus:outline-none rounded-full hover:bg-sky-900 flex items-center justify-center transition duration-200 ease-in-out" @click="ad = false">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>-->
                <div class="flex flex-col items-center pb-6">
                    <div class="flex flex-col md:flex-row items-start md:items-end justify-between w-full">
                        <h1 class="text-4xl font-bold text-slate-900">Produits</h1>
                        <!-- Number of results -->
                        <span class="text-xl font-semibold text-slate-900">{{ products.total }} résultats</span>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 2.5xl:grid-cols-3 gap-x-6 gap-y-8 w-full mx-auto h-full">
                    <div class="col-span-1 relative" v-for="product in products.data" :key="product.id" v-if="products.total !== 0">
                        <ProductCard :product="product" />
                    </div>
                    <div class="col-span-3 flex flex-col items-center justify-center text-xl font-semibold" v-else>
                        <span>Aucun produit ne correspond à votre recherche ou aux filtres sélectionnés.</span>
                        <span>Veuillez réessayer en modifiant votre recherche ou les filtres aplliqués.</span>
                    </div>
                </div>
                <div class="mx-auto w-full flex justify-center">
                    <Pagination class="mt-6" :links="products.links" />
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>
