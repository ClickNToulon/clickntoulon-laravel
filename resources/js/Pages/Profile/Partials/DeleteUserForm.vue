<script setup>
import DangerButton from '@/Components/Button/DangerButton.vue';
import InputError from '@/Components/Form/InputError.vue';
import InputLabel from '@/Components/Form/InputLabel.vue';
import Modal from '@/Components/Form/Modal.vue';
import SecondaryButton from '@/Components/Button/SecondaryButton.vue';
import TextInput from "@/Components/Form/TextInput.vue";
import { useForm } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';

const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;
    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('profile.destroy'), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;
    form.reset();
};
</script>

<template>
    <section class="space-y-6 w-full">
        <header class="w-full">
            <h2 class="text-xl font-medium text-textblack">Supprimer votre compte</h2>
            <p class="mt-1 text-gray-700">Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger les données ou informations que vous souhaitez conserver.</p>
        </header>

        <DangerButton @click="confirmUserDeletion">Supprimer votre compte</DangerButton>

        <Modal :show="confirmingUserDeletion" @close="closeModal" class="max-w-2xl">
            <div class="p-6">
                <h2 class="text-xl font-medium text-gray-900">Voulez-vous vraiment supprimer votre compte ?</h2>
                <p class="mt-1 text-gray-700">
                    Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.
                </p>

                <div class="mt-6">
                    <InputLabel for="password" value="Password" class="sr-only" />
                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        placeholder="Mot de passe"
                        @keyup.enter="deleteUser"
                    />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModal">
                        Revenir en arrière
                    </SecondaryButton>

                    <DangerButton
                        class="ml-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="deleteUser"
                    >
                        Supprimer votre compte
                    </DangerButton>
                </div>
            </div>
        </Modal>
    </section>
</template>
