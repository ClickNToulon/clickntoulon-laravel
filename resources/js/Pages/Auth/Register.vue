<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from "@/Components/Form/TextInput.vue";
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const form = useForm({
    name: '',
    surname: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <div class="w-full sm:max-w-xl px-6 py-6 mt-6 overflow-hidden bg-white rounded-2xl">
            <Head title="Inscription - Simpl'Achat"/>

            <form @submit.prevent="submit">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <InputLabel for="name" value="Nom" />
                        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="surname" value="Prénom" />
                        <TextInput id="surname" type="text" class="mt-1 block w-full" v-model="form.surname" required autocomplete="surname" />
                        <InputError class="mt-2" :message="form.errors.surname" />
                    </div>
                </div>
                <div class="mt-4">
                    <InputLabel for="email" value="Adresse mail" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Mot de passe" />
                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password_confirmation" value="Confirmez le mot de passe" />
                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="w-full tracking-wide" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        S'inscrire
                    </PrimaryButton>
                </div>
                <div class="flex items-center justify-center mt-4">
                    <Link :href="route('login')" class="relative text-gray-700 !underline underline-offset-2 decoration-[2px] font-medium hover:text-darkorange">
                        Vous avez déjà un compte ? Connectez-vous
                    </Link>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
