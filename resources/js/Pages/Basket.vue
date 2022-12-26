<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Navbar from '@/Components/Navigation/Navbar.vue';
import Footer from "@/Components/Navigation/Footer.vue";
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import SecondaryDangerButton from "@/Components/Button/SecondaryDangerButton.vue";
import SelectInput from "@/Components/Form/SelectInput.vue";
import {Inertia} from '@inertiajs/inertia';
import {ref} from "vue";

function isInTheFuture(date) {
	if (date === null) {
		return true;
	}
	return new Date(date) > new Date();
}

function updateProduct(id) {
	Inertia.post(route('basket.updateProduct'), {
		id: id,
		quantity: document.getElementById('selector-'+id).value,
	});
}

function removeProduct(id) {
	Inertia.delete(route('basket.removeProduct'), {
		data: {
			productId: id,
		}
	});
}

function checkout() {
	Inertia.post(route('basket.checkout'));
}

defineProps(['basket']);

const alert = ref(true);
</script>

<template>
    <Head title="Panier - Simpl'Achat"><title>Panier - Simpl'Achat</title></Head>
    <Navbar />
	<div class="relative">
		<div class="absolute top-2.5 right-[128px] w-full max-w-[538.969px]" v-if="$page.props.flash.success && alert">
			<div class="flex p-4 items-center bg-white rounded-xl shadow-md animate-display">
				<div class="w-full flex items-center">
					<!-- icon -->
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
					</svg>
					<!-- text -->
					<span class="ml-2 text-green-500 font-medium">{{ $page.props.flash.success }}</span>
				</div>
				<!-- close button -->
				<button class="ml-4 focus:outline-none" @click="alert = !alert">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 hover:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
				</button>
			</div>
		</div>
	</div>
    <div class="wrap mx-auto pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 pt-6 space-y-6">
        <div class="flex flex-row items-end justify-between w-2/3 space-y-2" v-if="basket !== null && basket.products.length !== 0">
            <h1 class="text-5xl font-semibold text-slate-900">Panier</h1>
            <!-- Number of results -->
            <span class="text-xl mr-6 font-medium text-slate-900">{{ basket.products.length }}
				<span v-if="basket.products.length === 1">produit</span>
				<span v-else>produits</span>
			</span>
        </div>
        <div class="flex flew-wrap gap-8">
            <div class="w-2/3 flex flex-col">
                <div class="flex flex-col items-start space-y-6">
                    <div class="bg-white rounded-2xl p-4 w-full shadow-md" v-if="basket !== null && basket.products.length !== 0">
                        <!-- List of ordered products -->
                        <div class="flex flex-col space-y-4">
							<div v-for="(product, index) in basket.products" :key="product.id">
								<div class="flex flex-row items-start justify-between gap-4 mb-3 last:mb-0">
									<div class="flex flex-row items-center space-x-4 w-4/5">
										<img :src="product.image" class="w-32 h-32 rounded-xl" alt="Product image">
										<div class="flex flex-col space-y-2">
											<Link class="text-2xl font-semibold text-darkorange w-fit" :href="route('produits.show', product.id)">
												{{ product.name }}
											</Link>
											{{ product.shop.name}}
											<p class="text-slate-600 font-medium line-clamp-1 w-fit">
												{{ product.description }}
											</p>
											<div v-for="price in product.prices" class="max-w-sm">
												<div v-if="price.discount !== null && isInTheFuture(price.discountedUntil)" class="space-x-3 flex items-center max-w-fit">
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
												<div v-else>
													<p class="font-semibold text-2xl text-slate-900">
														{{ price.unitPrice }}€
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="flex flex-col items-start space-y-2 p-2 w-1/5 w-full">
										<span class="text-lg font-medium text-slate-900">Quantité</span>
										<form @change="updateProduct(product.id)" class="w-full">
											<!-- Quantity selector -->
											<SelectInput :id="'selector-'+ product.id">
												<option v-for="optionIndex in 101" :value="optionIndex-1" :key="optionIndex-1"
														:selected="(optionIndex-1) === product.pivot.quantityOrdered">
													{{ optionIndex - 1 }}
												</option>
											</SelectInput>
										</form>
										<SecondaryDangerButton @click="removeProduct(product.id)" class="w-full justify-center text-sm px-2 py-1">
											Supprimer
										</SecondaryDangerButton>
									</div>
								</div>
								<!-- horizontal line -->
								<div class="h-px w-full bg-slate-900/10" v-if="index !== Object.keys(basket.products).length - 1"></div>
							</div>
                        </div>
                    </div>
					<div class="h-hero" v-else>
						<p class="text-5xl font-semibold text-slate-900 pt-24">Votre panier est vide...</p>
					</div>
                </div>
            </div>
            <div class="w-1/3 rounded-2xl bg-white shadow-md p-6 max-h-fit h-full" v-if="basket !== null && basket.products.length !== 0">
                <div class="flex flex-col items-center space-y-6 max-h-fit">
                    <div class="flex items-center w-full">
                        <h1 class="text-4xl font-semibold text-slate-900">Total</h1>
                    </div>
                    <div class="flex flex-col items-center w-full space-y-4 px-6">
                        <div class="w-full flex items-start justify-between">
                            <span class="font-medium text-lg text-slate-900">Total (HT.)</span>
                            <span class="text-slate-900 font-semibold text-xl">{{ (basket.total * 0.8).toFixed(2) }}€</span>
                        </div>
                        <div class="w-full flex items-center justify-between">
                            <span class="font-medium text-lg text-slate-900">TVA</span>
                            <span class="text-slate-900 font-semibold text-xl">{{ (basket.total * 0.2).toFixed(2) }}€</span>
                        </div>
                        <!-- Horizontal -->
                        <div class="w-full h-0.5 bg-slate-900/10"></div>
                        <!-- Total -->
                        <div class="w-full flex items-center justify-between">
                            <span class="font-medium text-lg text-slate-900">Total (TTC.)</span>
                            <span class="text-slate-900 font-semibold text-xl">{{ (basket.total).toFixed(2) }}€</span>
                        </div>
                        <PrimaryButton @click="checkout" class="w-full">
                            Procéder à la commande
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer />
</template>
