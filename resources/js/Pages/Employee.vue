<script setup>
import Navbar from "@/Components/Navigation/Navbar.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Footer from "@/Components/Navigation/Footer.vue";

defineProps(['guard']);
</script>

<template>
	<Head title="Simpl'Achat - Vos achats ont du pouvoir"><title>Simpl'Achat - Vos achats ont du pouvoir</title></Head>
	<Navbar />
	Vous êtes sur la page employé
	<br>
	{{ $page.props.auth }}
	<Footer />
</template>
