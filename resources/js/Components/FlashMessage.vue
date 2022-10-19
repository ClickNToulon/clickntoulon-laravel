<script setup>
import { ref, onMounted } from 'vue';
import { TransitionRoot, TransitionChild } from '@headlessui/vue';
import { Inertia } from "@inertiajs/inertia";

const showNotif = ref(true);

onMounted(() => {
    showNotif.value = true;
    setTimeout(() => {
        showNotif.value = false;
        console.log(Inertia)
    }, 10000);
    showNotif.value = true;
});
</script>

<template>
    <div>
        <TransitionRoot
            class="fixed z-50 top-[4.5rem] right-3 px-5 py-2"
            as="template"
            appear
            :show="showNotif"
            v-if="$page.props.flash.error && showNotif"
        >
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="flex items-center justify-center px-4 mb-4">
                    <div role="alert" id="alert" class="transition duration-150 ease-in-out w-[500px] h-full mx-auto bg-white shadow-lg rounded-xl flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                        <div class="flex flex-col items-center md:flex-row h-full">
                            <div class="mr-3 p-4 bg-danger rounded-xl md:rounded-tr-none md:rounded-br-none text-white h-auto">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                            </div>
                            <p class="text-sm lg:text-base text-gray-700 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">{{ $page.props.flash.error }}</p>
                        </div>
                        <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                            <a class="cursor-pointer" @click="showNotif = ! showNotif">
                                <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </TransitionChild>
        </TransitionRoot>
        <TransitionRoot
            class="fixed top-[4.5rem] right-3 px-5 py-2"
            as="template"
            appear
            :show="showNotif"
            v-if="$page.props.flash.success && showNotif"
        >
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="flex items-center justify-center px-4 mb-4">
                    <div role="alert" id="alert" class="transition duration-150 ease-in-out w-[500px] h-full mx-auto bg-white shadow-lg rounded-xl flex flex-col py-4 md:py-0 items-center md:flex-row justify-between">
                        <div class="flex flex-col items-center md:flex-row h-full">
                            <div class="mr-3 p-4 bg-success rounded-xl md:rounded-tr-none md:rounded-br-none text-white h-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="text-sm lg:text-base text-gray-700 lg:pt-1 xl:pt-0 sm:mb-0 mb-2 text-center sm:text-left">{{ $page.props.flash.success }}</p>
                        </div>
                        <div class="flex xl:items-center lg:items-center sm:justify-end justify-center pr-4">
                            <a class="cursor-pointer" @click="showNotif = ! showNotif">
                                <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </TransitionChild>
        </TransitionRoot>
    </div>
</template>
