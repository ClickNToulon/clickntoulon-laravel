<script setup>
import Checkbox from '@/Components/Form/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from "@/Components/Form/TextInput.vue";
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

defineProps({
	canResetPassword: Boolean,
	status: String,
});

const form = useForm({
	email: '',
	password: '',
	remember: false
});

const submit = () => {
	form.post(route('employee.login'), {
		onFinish: () => form.reset('password'),
	});
};
</script>

<template>
	<GuestLayout>
		<div class="w-full sm:max-w-xl px-6 py-6 mt-6 bg-white rounded-2xl overflow-hidden shadow-md">
			<Head title="Connexion - Simpl'Achat"/>

			<div v-if="status" class="mb-4 font-medium text-sm text-success">
				{{ status }}
			</div>
			<form @submit.prevent="submit" class="space-y-6">
				<div>
					<InputLabel for="email" value="Adresse mail" />
					<TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus autocomplete="username" />
					<InputError class="mt-2" :message="form.errors.email" />
				</div>

				<div class="mt-4">
					<InputLabel for="password" value="Mot de passe" />
					<TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" />
					<InputError class="mt-2" :message="form.errors.password" />
				</div>

				<div class="flex justify-between items-center mt-4">
					<label class="flex items-center">
						<Checkbox name="remember" v-model:checked="form.remember" />
						<span class="ml-2 text-slate-700 font-medium">Se souvenir de moi</span>
					</label>
					<Link v-if="canResetPassword" :href="route('password.request')" class="relative text-gray-700 !underline underline-offset-2 font-medium hover:text-darkorange">
						Mot de passe oublié ?
					</Link>
				</div>

				<div class="flex items-center justify-end mt-4">
					<PrimaryButton class="w-full tracking-wide" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
						Se connecter
					</PrimaryButton>
				</div>
			</form>
			<div class="flex items-center justify-center mt-4">
				<Link :href="route('register')" class="relative text-gray-700 !underline underline-offset-2 font-medium hover:text-darkorange">
					Pas encore de compte ? S'inscrire
				</Link>
			</div>
		</div>
	</GuestLayout>
</template>
