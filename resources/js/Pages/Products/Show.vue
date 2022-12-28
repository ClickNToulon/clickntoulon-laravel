<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navigation/Navbar.vue';
import Footer from '@/Components/Navigation/Footer.vue';
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import {Inertia} from "@inertiajs/inertia";

defineProps({
    product: Object,
});

function isInTheFuture(date) {
	if (date === null) {
		return true;
	}
	return new Date(date) > new Date();
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
    <Head :title="`${$page.props.product.name} - Simpl'Achat`">
        <title>{{$page.props.product.name}} - Simpl'Achat</title>
    </Head>
    <Navbar />
    <section class="wrap mx-auto pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 pt-10">
        <!-- Produit detail section -->
        <div class="flex flex-col md:flex-row">
            <img :src="product.image" class="w-1/4 aspect-[19/20] rounded-2xl" alt="">
            <div class="md:pl-8 w-full space-y-6">
                <div class="space-y-4">
                    <h2 class="font-bold text-black text-2xl md:text-5xl">{{ product.name }}</h2>
                    <div class="grid grid-cols-3 max-w-5xl">
                        <div class="flex flex-col justify-start col-span-auto">
                            <!-- Product shop -->
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">Boutique</span>
                            </div>
                            <Link :href="route('home')">
                                <span class="font-bold text-darkorange">{{ product.shop.name }}</span>
                            </Link>
                        </div>
                        <div class="flex flex-col justify-start col-span-2">
                            <!-- Product shop -->
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">Adresse</span>
                            </div>
                            <span class="font-bold text-slate-900">{{ product.shop.address }} {{ product.shop.postalCode }} {{ product.shop.city }}</span>
                        </div>
                    </div>
                    <p class="text-slate-900 font-medium text-lg">{{ product.description }}</p>
                    <div class="grid grid-cols-4">
                        <div class="col-span-1">
                            <!-- Product shop -->
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">Catégorie</span>
                            </div>
                            <span class="font-bold text-slate-700">{{ product.type.name }}</span>
                        </div>
                        <div class="col-span-1" v-if="product.quantity">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75L2.25 12l4.179 2.25m0-4.5l5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0l4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0l-5.571 3-5.571-3" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">Quantité</span>
                            </div>
                            <span class="font-bold text-slate-700">{{ product.quantity }}g</span>
                        </div>
                        <div class="col-span-1" v-else-if="product.color">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.098 19.902a3.75 3.75 0 005.304 0l6.401-6.402M6.75 21A3.75 3.75 0 013 17.25V4.125C3 3.504 3.504 3 4.125 3h5.25c.621 0 1.125.504 1.125 1.125v4.072M6.75 21a3.75 3.75 0 003.75-3.75V8.197M6.75 21h13.125c.621 0 1.125-.504 1.125-1.125v-5.25c0-.621-.504-1.125-1.125-1.125h-4.072M10.5 8.197l2.88-2.88c.438-.439 1.15-.439 1.59 0l3.712 3.713c.44.44.44 1.152 0 1.59l-2.879 2.88M6.75 17.25h.008v.008H6.75v-.008z" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">Couleur</span>
                            </div>
                            <span class="font-bold text-slate-700">{{ product.color }}</span>
                        </div>
                        <div class="col-span-1" v-if="product.size">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.848 8.25l1.536.887M7.848 8.25a3 3 0 11-5.196-3 3 3 0 015.196 3zm1.536.887a2.165 2.165 0 011.083 1.839c.005.351.054.695.14 1.024M9.384 9.137l2.077 1.199M7.848 15.75l1.536-.887m-1.536.887a3 3 0 11-5.196 3 3 3 0 015.196-3zm1.536-.887a2.165 2.165 0 001.083-1.838c.005-.352.054-.695.14-1.025m-1.223 2.863l2.077-1.199m0-3.328a4.323 4.323 0 012.068-1.379l5.325-1.628a4.5 4.5 0 012.48-.044l.803.215-7.794 4.5m-2.882-1.664A4.331 4.331 0 0010.607 12m3.736 0l7.794 4.5-.802.215a4.5 4.5 0 01-2.48-.043l-5.326-1.629a4.324 4.324 0 01-2.068-1.379M14.343 12l-2.882 1.664" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">Taille</span>
                            </div>
                            <span class="font-bold text-slate-700">{{ product.size }}</span>
                        </div>
                        <div class="col-span-1">
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <span class="text-slate-600 uppercase font-medium tracking-wide">NutriScore</span>
                            </div>
                            <span class="font-bold text-slate-700">A</span>
                        </div>
                    </div>
                    <div class="flex items-start space-x-8 !mt-8">
                        <div v-for="price in product.prices">
                            <div v-if="price.discount !== null && isInTheFuture(price.discountedUntil)" class="flex flex-col space-y-2">
                                <div class="space-x-4 flex items-center">
                                    <p class="text-3xl font-bold tracking-wide">
                                        {{ price.discountedPrice }}€
                                    </p>
                                    <!-- Discount -->
                                    <p class="text-xl font-bold text-red-700 tracking-wide px-3 py-1.5 bg-red-200 rounded-full">
                                        -{{ price.discount * 100 }}%
                                    </p>
                                    <!-- TVA included -->
                                    <div class="flex items center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-slate-600">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                        </svg>
                                        <p class="text-slate-900 font-semibold">
                                            TVA incluse
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <span class="font-semibold text-slate-400">Ancien prix :</span>
                                    <p class="text-2xl font-medium text-slate-400 line-through tracking-wide">
                                        {{ price.unitPrice }}€
                                    </p>
                                </div>
                            </div>
                            <div v-else>
                                <p class="font-bold text-2xl text-slate-900">
                                    {{ price.unitPrice }}€
                                </p>
                            </div>
                        </div>
						<PrimaryButton @click="addProduct(product.id)" class="w-full max-w-sm">
							Ajouter au panier
						</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>
