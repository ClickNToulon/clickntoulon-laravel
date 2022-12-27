<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Navbar from "@/Components/Navigation/Navbar.vue";
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import  isBetween from 'dayjs/plugin/isBetween';
import SecondaryButton from "@/Components/Button/SecondaryButton.vue";
import SecondaryDangerButton from "@/Components/Button/SecondaryDangerButton.vue";
import Footer from "@/Components/Navigation/Footer.vue";

function isInTheFuture(date, fromDate, orderDate) {
	if (date === null) {
		return true;
	}
	// check if orderDate is between fromDate and date
	return dayjs(orderDate).isBetween(fromDate, date, null, '[]');
}

defineProps(["orders"]);
dayjs.extend(relativeTime);
dayjs.extend(isBetween);
</script>

<template>
	<Head title="Mes commandes - Simpl'Achat"/>
	<Navbar />
	<div class="relative">
		<div class="absolute top-2.5 right-[128px] w-full max-w-[538.969px]" v-if="$page.props.flash.success && alert">
			<div class="flex p-4 items-center bg-white rounded-xl shadow-md animate-display">
				<div class="w-full flex items-center">
					<!-- icon -->
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
		<div class="absolute top-2.5 right-[128px] w-full max-w-[538.969px]" v-if="$page.props.flash.error && alert">
			<div class="flex p-4 items-center bg-white rounded-xl shadow-md animate-display">
				<div class="w-full flex items-center">
					<!-- icon -->
					<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
					</svg>
					<!-- text -->
					<span class="ml-2 text-red-500 font-medium">{{ $page.props.flash.error }}</span>
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
		<div class="flex flex-col items-start space-y-2">
			<h1 class="text-5xl font-semibold text-slate-900">Mes commandes</h1>
			<p class="text-lg text-slate-600">Retrouvez ici l'historique de vos commandes</p>
		</div>
		<div class="flex flew-wrap gap-8">
			<div class="max-w-6xl flex flex-col">
				<div class="flex flex-col items-start space-y-8">
					<div class="bg-white rounded-2xl w-full shadow-md" v-for="order in orders">
						<div class="p-4 border-b border-gray-300">
							<div class="flex items-center justify-between">
								<div class="flex flex-col md:flex-row items-start md:items-center space-x-8">
									<div class="flex flex-col items-start space-y-1">
										<h1 class="text-sm font-medium text-slate-500 uppercase tracking-wide">Numéro de commande</h1>
										<p class="text-lg text-slate-900 font-semibold">{{ order.orderNumber }}</p>
									</div>
									<div class="flex flex-col items-start space-y-1">
										<h1 class="text-sm font-medium text-slate-600 uppercase tracking-wide">Date de la commande</h1>
										<p class="text-lg text-slate-900 font-semibold">{{ dayjs(order.created_at).format('DD/MM/YYYY') }}</p>
									</div>
									<div class="flex flex-col items-start space-y-1">
										<h1 class="text-sm font-medium text-slate-600 uppercase tracking-wide">Total</h1>
										<p class="text-lg text-slate-900 font-semibold">{{ (order.total).toFixed(2) }}€</p>
									</div>
									<div class="flex flex-col items-start space-y-1">
										<h1 class="text-sm font-medium text-slate-600 uppercase tracking-wide">Statut</h1>
										<div class="px-2 py-1 bg-yellow-200 text-yellow-900 rounded-full" v-if="order.status.id === 1">
											<p class="text-sm font-semibold">{{ order.status.name }}</p>
										</div>
										<div class="px-2 py-1 bg-green-200 text-green-900 rounded-full" v-if="order.status.id === 3">
											<p class="text-sm font-semibold">{{ order.status.name }}</p>
										</div>
										<div class="px-2 py-1 bg-red-200 text-red-900 rounded-full" v-if="order.status.id === 4">
											<p class="text-sm font-semibold">{{ order.status.name }}</p>
										</div>
										<div class="flex items-center space-x-1" v-if="order.status.id === 5">
											<!-- check filled svg -->
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
											</svg>
											<p class="text-sm font-semibold text-slate-900">Commande récupérée</p>
										</div>
									</div>
								</div>
								<div class="flex items-center justify-around space-x-4">
									<SecondaryButton>
										Details
									</SecondaryButton>
									<SecondaryDangerButton v-if="order.status.name !== 'Récupérée'">
										Annuler
									</SecondaryDangerButton>
								</div>
							</div>
						</div>
						<div class="p-4 border-b border-gray-300 last-of-type:border-none" v-for="product in order.products">
							<div class="flex flex-row items-start space-x-4 w-full">
								<img :src="product.image" class="w-36 h-36 rounded-xl" alt="Product image">
								<div class="flex flex-col space-y-2">
									<div class="flex items-center space-x-4">
										<Link class="text-2xl font-semibold text-darkorange w-fit" :href="route('produits.show', product.id)">
											{{ product.name }}
										</Link>
										<div class="flex items-center space-x-2">
											<p class="text-lg font-semibold text-slate-900">(x{{ product.pivot.quantityOrdered }})</p>
										</div>
									</div>
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
									<p class="text-slate-600 font-medium line-clamp-1 w-fit">
										{{ product.description }}
									</p>
									<div v-for="price in product.prices" class="max-w-sm">
										<div v-if="price.discount !== null && isInTheFuture(price.discountedUntil, price.discountedFrom, order.created_at)" class="space-x-3 flex items-center max-w-fit">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<Footer />
</template>
