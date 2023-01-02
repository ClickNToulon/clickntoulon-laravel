<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import HeroSection from "@/Components/Section/Hero.vue";
import Navbar from "@/Components/Navigation/Navbar.vue";
import Footer from "@/Components/Navigation/Footer.vue";
import ProductCard from "@/Components/Product/ProductCard.vue";
import Pagination from "@/Components/Navigation/Pagination.vue";

defineProps({
    products: Object,
    order: Object
})
</script>

<template>
    <Head title="Simpl'Achat - Vos achats ont du pouvoir"><title>Simpl'Achat - Vos achats ont du pouvoir</title></Head>
    <Navbar />
    <HeroSection />
    <section class="mx-auto pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 flex flex-col">
        <div class="grid grid-cols-1 md:grid-cols-2 2.5xl:grid-cols-4 gap-x-6 gap-y-8 w-full mx-auto h-full">
            <div class="col-span-1 relative" v-for="product in products.data" v-if="products.total !== 0">
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
    </section>
    <Footer />
</template>
