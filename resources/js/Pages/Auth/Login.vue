<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
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
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <div class="w-full sm:max-w-[550px] mt-6 px-6 py-4 overflow-hidden bg-white rounded-xl shadow-lg">
            <Head title="Se connecter"><title>Se connecter</title></Head>

            <div v-if="status" class="mb-4 font-medium text-sm text-success">
                {{ status }}
            </div>
            <form @submit.prevent="submit" class="p-6 space-y-4">
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
                    <Link v-if="canResetPassword" :href="route('password.request')" class="relative text-sm text-gray-700 font-medium hover:text-gray-900">
                        Mot de passe oublié ?
                    </Link>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Se connecter
                    </PrimaryButton>
                </div>
            </form>
            <div class="flex items-center justify-center">
                <Link :href="route('register')" class="relative pb-1 text-sm text-gray-700 font-medium hover:text-gray-900">
                    Pas encore de compte ? S'inscrire
                </Link>
            </div>
        </div>
    </GuestLayout>
</template>
