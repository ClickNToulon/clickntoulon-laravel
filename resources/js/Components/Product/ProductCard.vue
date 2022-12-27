<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import {Inertia} from "@inertiajs/inertia";
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import isBetween from "dayjs/plugin/isBetween";

dayjs.extend(relativeTime);
dayjs.extend(isBetween);

defineProps(['product']);

function isInTheFuture(date, fromDate) {
	if (date === null) {
		return true;
	}
	// check if orderDate is between fromDate and date
	return dayjs(dayjs()).isBetween(fromDate, date, null, '[]');
}
function addProduct(id) {
	Inertia.post(route('basket.addProduct'), {
		preserveState: true,
		data: {
			productId: id,
			quantity: 1,
		},
	});
}
</script>

<template>
    <div class="h-full">
        <img :src="product.image" class="rounded-2xl bg-gray-100 w-full aspect-[19/20]" alt="Product Image">
        <div class="p-4 space-y-3 flex justify-start flex-col">
            <Link :href="route('produits.show', product.id)" class="text-2xl font-bold text-darkorange w-fit">
                {{ product.name }}
            </Link>
            <!-- Product description -->
            <p class="text-slate-600 font-medium line-clamp-2">{{ product.description }}</p>
            <!-- Product infos -->
            <div class="space-y-4">
                <div class="flex flex-col justify-start flex-wrap">
                    <!-- Product shop -->
                    <div class="flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                        </svg>
                        <span class="text-slate-600 uppercase font-normal tracking-wide text-sm">Boutique</span>
                    </div>
                    <Link :href="route('home')" class="w-fit">
                        <span class="font-semibold text-darkorange">{{ product.shop.name }}</span>
                    </Link>
                </div>
                <div class="grid grid-cols-2">
                    <div class="col-span-1">
                        <!-- Product shop -->
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>
                            <span class="text-slate-600 uppercase font-medium tracking-wide text-sm">Catégorie</span>
                        </div>
                        <span class="font-semibold text-slate-700">{{ product.type.name }}</span>
                    </div>
                    <div class="col-span-1" v-if="product.quantity">
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                            </svg>
                            <span class="text-slate-600 uppercase font-medium tracking-wide text-sm">Quantité</span>
                        </div>
                        <span class="font-semibold text-slate-700">{{ product.quantity }}g</span>
                    </div>
                    <div class="col-span-1" v-else-if="product.color">
                        <div class="flex items-center space-x-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                            </svg>
                            <span class="text-slate-600 uppercase font-medium tracking-wide text-sm">Couleur</span>
                        </div>
                        <span class="font-semibold text-slate-700">{{ product.color }}</span>
                    </div>
                </div>
            </div>
            <div class="border-t-2 border-slate-300 pt-2">
                <div class="flex flex-col 2.5xl:flex-row justify-between items-start 2.5xl:items-center space-y-2 2.5xl:space-y-0">
                    <div v-for="price in product.prices">
                        <div v-if="price.discount !== null && isInTheFuture(price.discountedUntil, price.discountedFrom)">
                            <div class="space-x-3 flex items-center">
                                <p class="text-2xl font-semibold tracking-wide">
                                    {{ price.discountedPrice }}€
                                </p>
                                <p class="text-2xl font-medium text-slate-400 line-through tracking-wide">
                                    {{ price.unitPrice }}€
                                </p>
                                <!-- Discount -->
                                <p class="text-xl font-semibold text-danger tracking-wide">
                                    -{{ price.discount * 100 }}%
                                </p>
                            </div>
                        </div>
                        <div v-else>
                            <p class="font-semibold text-2xl text-slate-900">
                                {{ price.unitPrice }}€
                            </p>
                        </div>
                    </div>
                    <PrimaryButton @click="addProduct(product.id)" class="w-full 2.5xl:w-auto">
                        Ajouter au panier
                    </PrimaryButton>
                </div>
            </div>
        </div>
    </div>
</template>
