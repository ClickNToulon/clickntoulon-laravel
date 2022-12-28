<script setup>
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import PrimaryButton from '@/Components/Button/PrimaryButton.vue';
import TextInput from "@/Components/Form/TextInput.vue";
import { Link, useForm, usePage } from '@inertiajs/inertia-vue3';

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.value.auth.user;

const form = useForm({
    name: user.name,
    surname: user.surname,
    email: user.email,
    phone: user.phone,
});
</script>

<template>
    <section class="w-full">
        <header>
            <h2 class="text-xl font-medium text-textblack">Mes informations</h2>
            <p class="mt-1 text-gray-700">Mettez à jour vos informations concernant votre compte.</p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6 w-full">
            <div class="grid grid-cols-2 gap-6">
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
            <div>
                <InputLabel for="email" value="Adresse mail" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autocomplete="email" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="phone" value="Téléphone" />
                <TextInput id="phone" type="text" class="mt-1 block w-full" v-model="form.phone" autocomplete="phone" />
                <InputError class="mt-2" :message="form.errors.phone" />
            </div>

            <div v-if="props.mustVerifyEmail && user.email_verified_at === null">
                <p class="text-sm mt-2 text-gray-900 font-medium">
                    Votre adresse mail n'est pas vérifiée.
                    <Link
                        :href="route('verification.send')"
                        method="post"
                        as="button"
                        class="text-sm text-darkorange hover:underline font-semibold focus:outline-none"
                    >
                        Cliquer ici pour recevoir un nouveau lien de vérification.
                    </Link>
                </p>
                <div v-show="props.status === 'verification-link-sent'" class="mt-2 font-medium text-sm text-green-600">
                    Un nouveau lien de vérification a été envoyé à l'adresse mail fournie.
                </div>
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Sauvegarder les informations</PrimaryButton>
                <Transition enter-from-class="opacity-75" leave-to-class="opacity-0" class="transition duration-[5000ms] ease-out">
                    <p v-if="form.recentlySuccessful"
                          class="outline-none max-w-fit flex items-center space-x-2 rounded-full px-3 py-1.5 bg-green-200 text-green-900 font-bold">
                        Sauvegardé
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
