<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Footer from "@/Components/Navigation/Footer.vue";

defineProps({
    mustVerifyEmail: Boolean,
    status: Boolean,
});
</script>

<template>
    <Head title="Mon compte - Simpl'Achat" />

    <AuthenticatedLayout>
        <div class="pt-12">
            <div class="mx-auto pl-3 pr-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 space-y-6">
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    Mon compte
                </h2>
                <div class="flex gap-8 w-full">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                        />
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                        <UpdatePasswordForm />
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full">
                    <DeleteUserForm class="max-w-2xl" />
                </div>
            </div>
        </div>
        <Footer />
    </AuthenticatedLayout>
</template>
