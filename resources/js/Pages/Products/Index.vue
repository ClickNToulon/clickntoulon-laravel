<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navigation/Navbar.vue';
import Pagination from '@/Components/Pagination.vue';
import Footer from '@/Components/Footer.vue';
import Checkbox from "@/Components/Checkbox.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    products: Object,
    types: Object,
});


</script>

<template>
    <Head title="Produits"><title>Produits</title></Head>
    <Navbar />
    <section class="wrap mx-auto px-6 py-8 lg:px-40 lg:py-10 lg:pt-24">
        <!-- Sidebar with filters -->
        <h2 class="text-3xl md:text-5xl mb-4 lg:mb-8 font-bold text-sky-500 md:text-center tracking-tight">Produits</h2>
        <div class="flex flex-col lg:flex-row justify-between gap-x-4">
            <div class="w-full max-w-xs">
                <div class="bg-white rounded-2xl ring-1 ring-slate-900/20 p-4">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">
                        Catégories
                    </h3>
                    <form action="" class="space-y-4" method="get">
                        <div class="flex items-center">
                            <input type="text" name="search" class="w-full rounded-xl focus:outline-none ring-gray-900/20 ring-1 focus:ring-2 focus:ring-slate-900 border-none placeholder:text-slate-500 font-medium" placeholder="Rechercher" value="">
                        </div>
                        <div class="flex flex-col h-[200px] overflow-y-auto w-full">
                            <div class="flex items-center space-x-2 w-full" v-for="type in types">
                                <label class="flex items-center">
                                    <Checkbox name="types[]" :value="type.id" class="border-2 focus:ring-0" />
                                    <span class="ml-2 text-slate-700 font-medium truncate w-full">{{ type.name }}</span>
                                </label>
                            </div>
                        </div>
                        <div class="flex items-center flex-col w-full space-y-2">
                            <input type="number" name="min_price" class="w-full rounded-xl focus:outline-none ring-gray-900/20 ring-1 focus:ring-2 focus:ring-slate-900 border-none placeholder:text-slate-500 font-medium" placeholder="Min" value="">
                            <input type="number" name="max_price" class="w-full rounded-xl focus:outline-none ring-gray-900/20 ring-1 focus:ring-2 focus:ring-slate-900 border-none placeholder:text-slate-500 font-medium" placeholder="Max" value="">
                        </div>
                        <!-- filter if product is on sales -->
                        <div class="flex items center space-x-2">
                            <label class="flex items-center">
                                <Checkbox name="on_sale" class="border-2 focus:ring-0" />
                                <span class="ml-2 text-slate-700 font-medium truncate w-full">En solde</span>
                            </label>
                        </div>
                        <PrimaryButton class="w-full" type="submit">Filtrer</PrimaryButton>
                    </form>
                </div>
            </div>
            <div class="w-full">
                <div class="w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 w-full mx-auto">
                        <div class="col-span-1 relative" v-for="product in products.data" v-if="products.total !== 0">
                            <div v-for="price in product.price">
                                <div v-if="price.unitPriceDiscount && !price.endDate" class="absolute top-2 left-2 bg-danger text-white tracking-wider text-lg font-bold px-2.5 py-1 rounded-xl">
                                    -{{ price.unitPriceDiscount * 100 }}%
                                </div>
                                <Link href="#" class="absolute inset-0 hover:bg-black/5 rounded-2xl"/>
                                <img :src="product.image" class="rounded-2xl" alt="product image">
                                <div class="p-4 space-y-2">
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-xl font-bold text-slate-900">
                                            {{ product.name }}
                                        </h3>
                                        <div class="space-x-4 flex items-center" v-if="price.unitPriceDiscount && !price.endDate">
                                            <p class="text-[22px] font-bold tracking-wide text-danger">
                                                {{ price.unitPrice * ( 1 - price.unitPriceDiscount) }}€
                                            </p>
                                            <p class="text-sm font-medium text-slate-500 line-through">
                                                {{ price.unitPrice }}€
                                            </p>
                                        </div>
                                        <div v-else>
                                            <p class="font-bold text-slate-900">
                                                {{ price.unitPrice }}€
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-slate-900 font-medium truncate">
                                        {{ product.description }}
                                    </p>
                                </div>
                            </div>
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
        </div>
    </section>
    <Footer />
</template>
