<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import { ref } from 'vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';
import { Dialog, DialogPanel, DialogTitle, TransitionRoot, TransitionChild } from '@headlessui/vue';
import { Inertia } from '@inertiajs/inertia';

defineProps(['users']);
dayjs.extend(relativeTime);

const isOpen = ref(false);
const isSuccessOpen = ref(false);
const loading = ref(false);
const disabled = ref(false);

function closeModal() {
    isOpen.value = false;
}

function closeSuccessModal() {
    isSuccessOpen.value = false;
}

function openSuccessModal() {
    isSuccessOpen.value = true;
}

function openModal(id, ban) {
    this.id = id;
    this.ban = ban;
    isOpen.value = true;
}

function banUser(id) {
    loading.value = true;
    disabled.value = true;
    setTimeout(() => {
        Inertia.delete(route('users.ban', id), {
            preserveState: true,
            preserveScroll: true,
            onSuccess: () => {
                loading.value = false;
                disabled.value = false;
                openSuccessModal();
                closeModal();
            },
        });
    }, 3000);
}
</script>

<template>
    <Head title="Users"><title>Users</title></Head>
    <DashboardLayout>
        <div class="pb-8">
            <h1 class="text-2xl font-bold">Users</h1>
            <h6>List of all users in your app.</h6>
        </div>
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-slate-900 table-fixed z-10 overflow-x-auto">
                <thead class="text-xs w-full text-gray-700 uppercase border-b border-slate-500">
                    <tr>
                        <th scope="col" class="py-3 w-[30px]">
                            ID
                        </th>
                        <th scope="col" class="py-3 w-[100px]">
                            Full name
                        </th>
                        <th scope="col" class="py-3 w-[150px]">
                            Email
                        </th>
                        <th scope="col" class="py-3 w-[100px]">
                            Last updated at
                        </th>
                        <th scope="col" class="py-3 w-[100px]">
                            Status
                        </th>
                        <th scope="col" class="py-3 w-[100px]">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" class="border-b border-gray-300 last-of-type:border-none overflow-x-auto" :key="user.id">
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ user.id }}
                        </th>
                        <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ user.name }} {{ user.surname }}
                        </th>
                        <td class="py-4">
                            {{ user.email }}
                        </td>
                        <td class="py-4">
                            {{ dayjs(user.updated_at).fromNow() }}
                        </td>
                        <td class="py-4">
                            <span v-if="user.is_banned" class="text-white font-bold px-3 py-1 rounded-xl bg-danger">Banned</span>
                            <span v-else class="text-white font-bold px-3 py-1 rounded-xl bg-success">Active</span>
                        </td>
                        <td class="py-4 space-y-2 lg:space-y-0 lg:space-x-2 flex flex-col lg:flex-row">
                            <a href="#" class="font-semibold text-white text-center px-4 py-1.5 bg-azure-800 border-2 border-azure-800 rounded-xl">Edit</a>
                            <button type="button" v-if="!user.ban" @click="openModal(user, user.is_banned)" class="font-bold text-danger px-4 py-1.5 border-2 border-transparent rounded-xl focus-visible:ring-offset-0">
                                Ban
                            </button>
                            <button type="button" v-else @click="openModal(user, user.is_banned)" class="font-bold text-success px-4 py-1.5 border-2 border-transparent rounded-xl focus-visible:ring-offset-0">
                                Unban
                            </button>
                            <TransitionRoot appear :show="isSuccessOpen" as="template" v-bind:user="user">
                                <Dialog as="div" @close="closeSuccessModal" class="relative z-10">
                                    <TransitionChild
                                        as="template"
                                        enter="duration-300 ease-out"
                                        enter-from="opacity-0"
                                        enter-to="opacity-100"
                                        leave="duration-200 ease-in"
                                        leave-from="opacity-100"
                                        leave-to="opacity-0"
                                    >
                                        <div class="fixed inset-0 z-50 bg-gray-500 bg-opacity-10 transition-opacity"></div>
                                    </TransitionChild>
                                    <div class="fixed inset-0 z-50 overflow-y-auto">
                                        <div class="flex min-h-full items-center justify-center p-4 text-center">
                                            <TransitionChild
                                                as="template"
                                                enter="duration-300 ease-out"
                                                enter-from="opacity-0 scale-95"
                                                enter-to="opacity-100 scale-100"
                                                leave="duration-200 ease-in"
                                                leave-from="opacity-100 scale-100"
                                                leave-to="opacity-0 scale-95"
                                            >
                                                <DialogPanel class="w-full max-w-sm transform overflow-hidden rounded-2xl bg-white p-2 text-left align-middle transition-all">
                                                    <div class="p-4 pb-0 w-full">
                                                        <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto checkmark">
                                                            <path class="checkmark__check" stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                                        </svg>
                                                        <DialogTitle as="h3" class="text-xl font-bold leading-6 text-gray-900 text-center mt-2" v-if="!id.is_banned">
                                                            User banned successfully
                                                        </DialogTitle>
                                                        <DialogTitle as="h3" class="text-xl font-bold leading-6 text-gray-900 text-center mt-2" v-else>
                                                            User unbanned successfully
                                                        </DialogTitle>
                                                    </div>
                                                    <div class="mt-4 flex flex-col items-center justify-end">
                                                        <button
                                                            @click="closeSuccessModal"
                                                            title="Close Modal"
                                                            class="font-bold text-white px-4 py-1.5 border-2 border-success bg-success transition duration-300 rounded-xl justify-center flex items-center w-full hover:bg-green-800 hover:border-green-800 uppercase">
                                                            Close
                                                        </button>
                                                    </div>
                                                </DialogPanel>
                                            </TransitionChild>
                                        </div>
                                    </div>
                                </Dialog>
                            </TransitionRoot>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mx-auto w-full flex justify-center">
            <Pagination class="mt-6" :links="users.links" />
        </div>
    </DashboardLayout>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 z-50 bg-gray-500 bg-opacity-50 transition-opacity"></div>
            </TransitionChild>
            <div class="fixed inset-0 z-50 overflow-y-auto">
                <div class="flex min-h-full items-center justify-center p-4 text-center">
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel class="w-full max-w-sm transform overflow-hidden rounded-2xl bg-white p-2 text-left align-middle transition-all">
                            <div class="p-4 pb-0 w-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>
                                <DialogTitle as="h3" class="text-xl font-bold leading-6 text-gray-900 text-center mt-2" v-if="!ban">
                                    Ban User
                                </DialogTitle>
                                <DialogTitle as="h3" class="text-xl font-bold leading-6 text-gray-900 text-center mt-2" v-else>
                                    Unban User
                                </DialogTitle>
                                <div class="mt-4" v-if="!ban">
                                    <p class="text-sm text-slate-700 font-medium text-center">
                                        Are you sure you want to ban this user ?
                                    </p>
                                </div>
                                <div class="mt-4" v-else>
                                    <p class="text-sm text-slate-700 font-medium text-center">
                                        Are you sure you want to unban this user ?
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4 flex flex-col items-center justify-end">
                                <button
                                    type="button" @click="closeModal"
                                    class="font-bold w-full text-slate-900 text-center px-4 py-1.5 border-2 border-transparent rounded-xl"
                                >
                                    Cancel
                                </button>
                                <button
                                    :disabled="disabled"
                                    @click="banUser(id, ban)"
                                    v-if="!ban"
                                    title="Delete"
                                    :class="disabled ? 'cursor-not-allowed bg-red-700 border-red-700' : 'bg-danger border-danger cursor-pointer'"
                                    class="font-bold text-white px-4 py-1.5 border-2 uppercase transition duration-300 rounded-xl justify-center flex items-center w-full hover:bg-red-700 hover:border-red-700">
                                    <svg v-if="loading" :class="{'text-red-700': disabled}" aria-hidden="true" class="mr-2 w-5 h-5 text-danger animate-spin fill-white" viewBox="0 0 100 101" fill="none">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    {{ loading ? 'Banning...' : 'Ban' }}
                                </button>
                                <button
                                    :disabled="disabled"
                                    @click="banUser(id, ban)"
                                    v-else
                                    title="Delete"
                                    :class="disabled ? 'cursor-not-allowed bg-green-700 border-green-700' : 'bg-success border-success cursor-pointer'"
                                    class="font-bold text-white px-4 py-1.5 border-2 uppercase transition duration-300 rounded-xl justify-center flex items-center w-full hover:bg-green-700 hover:border-green-700">
                                    <svg v-if="loading" :class="{'text-green-700': disabled}" aria-hidden="true" class="mr-2 w-5 h-5 text-danger animate-spin fill-white" viewBox="0 0 100 101" fill="none">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    {{ loading ? 'Unbanning...' : 'Unban' }}
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
