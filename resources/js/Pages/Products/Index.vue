<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import Navbar from '@/Components/Navigation/Navbar.vue';
import Pagination from '@/Components/Navigation/Pagination.vue';
import Footer from '@/Components/Navigation/Footer.vue';
import Checkbox from "@/Components/Form/Checkbox.vue";
import PrimaryButton from "@/Components/Button/PrimaryButton.vue";
import ProductCard from "@/Components/Product/ProductCard.vue";
import {Inertia} from "@inertiajs/inertia";

defineProps({
    products: Object,
	types: Object,
    productType: Object,
	onSale: String,
});

const ad = ref(true);

function resetForm() {
	document.getElementById('filters-form').reset();
	return Inertia.get(route('produits.index'));
}
</script>

<template>
	<Head title="Produits - Simpl'Achat"></Head>
	<Navbar />
	<!-- Sidebar with filters -->
	<section class="mx-auto pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 flex">
		<div class="hidden xl:flex max-w-sm w-full">
			<div class="flex flex-col lg:flex-row justify-between w-full max-w-sm">
				<div class="w-full h-full max-w-md">
					<div class="p-8 pl-0">
						<form class="space-y-6" method="get" id="filters-form">
							<div class="flex-col items-center justify-between">
								<div class="flex items-center justify-between mb-2">
									<div class="flex items-center">
										<h3 class="text-sm uppercase tracking-wide font-semibold text-slate-900">
											Catégories
										</h3>
									</div>
									<button @click="resetForm" type="button" class="text-darkorange tracking-wide text-sm font-semibold uppercase">
										Tout effacer
									</button>
								</div>
								<div class="flex flex-col h-[190px] overflow-y-auto w-full custom-scrollbar">
									<div class="flex items-center space-x-4 w-full" v-for="type in types">
										<label class="flex items-center mb-1" :for="'type-' + type.id">
											<Checkbox name="types[]" :value="type.id" id="type-1" :checked="productType.includes(String(type.id))" class="border-2 focus:ring-0" />
											<span class="ml-4 text-slate-700 font-medium truncate w-full">{{ type.name }}</span>
										</label>
									</div>
								</div>
							</div>
							<!--<div class="flex-col items-center justify-between">
								<div class="flex items-center justify-between mb-2">
									<div class="flex items-center">
										<h3 class="text-sm uppercase tracking-wide font-semibold text-slate-900">
											Prix
										</h3>
									</div>
								</div>
								<div class="flex flex-col w-full"></div>
							</div>-->
							<div class="flex items-center space-x-4 w-full">
								<label class="flex items-center">
									<Checkbox name="on_sale" id="on_sale" class="border-2 focus:ring-0" :checked="onSale === 'on'" />
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
				<div class="flex flex-col items-center pb-6">
					<div class="flex flex-col md:flex-row items-start md:items-end justify-between w-full">
						<h1 class="text-4xl font-bold text-slate-900">Produits</h1>
						<!-- Number of results -->
						<span class="text-xl font-semibold text-slate-900">{{ products.total }}
							<span v-if="products.total === 1">résultat</span>
							<span v-else>résultats</span>
						</span>
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
