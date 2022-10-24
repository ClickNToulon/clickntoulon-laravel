<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navigation/Navbar.vue';
import HeroSection from '@/Components/HeroSection.vue';

defineProps({
    canLogin: Boolean,
    roles: Array,
    shops: Array,
    products: Array,
})
</script>

<template>
    <Head title="Welcome"><title>Welcome</title></Head>
    <Navbar :roles="roles"/>
    <!-- Hero Section -->
    <HeroSection />
    <!-- End Hero Section -->
    <section class="lg:container mx-auto px-4 sm:px-6 lg:px-8 pb-32">
        <div class="flex flex-col items-center space-y-10">
            <h2 class="text-4xl font-semibold text-center text-slate-900">
                Les boutiques partenaires
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6 w-full mx-auto">
                <div class="col-span-1 relative" v-for="shop in shops">
                    <Link href="" class="absolute inset-0 hover:bg-black/5 rounded-xl"/>
                    <img :src="shop.image" class="rounded-xl" alt="shop image">
                    <div class="p-4 space-y-2">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold tracking-wider text-slate-900">
                                {{ shop.name }}
                            </h3>
                            <div class="space-x-1 inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                </svg>
                                <span class="text-sm font-medium text-slate-900">
                                    {{ shop.address }} {{ shop.postalCode }} {{ shop.city }}
                                </span>
                            </div>
                        </div>
                        <p class="text-slate-900 truncate">
                            {{ shop.description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lg:container mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="flex flex-col items-center space-y-10">
            <h2 class="text-4xl font-semibold text-center text-slate-900">
                Les derniers produits ajoutés
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-6 w-full mx-auto">
                <div class="col-span-1 relative" v-for="product in products">
                    <div v-for="price in product.price">
                        <div v-if="price.unitPriceDiscount && !price.endDate" class="absolute top-0 left-0 bg-danger text-white text-lg px-4 py-2 rounded-tl-xl rounded-br-xl">
                            -{{ price.unitPriceDiscount * 100 }}%
                        </div>
                        <Link href="#" class="absolute inset-0 hover:bg-black/5 rounded-xl"/>
                        <img :src="product.image" class="rounded-xl" alt="product image">
                        <div class="p-4 space-y-2">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-bold tracking-wider text-slate-900">
                                    {{ product.name }}
                                </h3>
                                <div class="space-x-4 flex items-center" v-if="price.unitPriceDiscount && !price.endDate">
                                    <p class="text-[22px] font-bold tracking-wider text-danger">
                                        {{ price.unitPrice * ( 1 - price.unitPriceDiscount) }}€
                                    </p>
                                    <p class="text-sm font-semibold text-slate-500 line-through">
                                        {{ price.unitPrice }}€
                                    </p>
                                </div>
                                <div v-else>
                                    <p class="font-semibold text-slate-900">
                                        {{ price.unitPrice }}€
                                    </p>
                                </div>
                            </div>
                            <p class="text-slate-900 truncate">
                                {{ product.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
