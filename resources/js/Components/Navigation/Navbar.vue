<template>
    <nav class="fixed w-full z-50 transition-[background-color] duration-300" id="navbar">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto px-4 sm:px-16 lg:px-32 py-4">
            <div class="flex justify-between items-center space-x-10">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center mx-auto space-x-2">
                        <Link :href="route('home')">
                            <ApplicationLogo class="block h-9 w-auto text-slate-900 fill-current" />
                        </Link>
                        <Link :href="route('users.index')" class="px-4 py-2 font-semibold outline-none rounded-xl whitespace-nowrap transition duration-200 ease hover:bg-black hover:bg-opacity-5 text-lg">
                            Boutiques
                        </Link>
                        <Link :href="route('produits.index')" class="px-4 py-2 font-semibold outline-none rounded-xl whitespace-nowrap transition duration-200 ease hover:bg-black hover:bg-opacity-5 text-lg">
                            Produits
                        </Link>
                    </div>
                </div>

                <div class="flex items-center w-auto">
                    <!-- Search bar -->
                    <div class="relative mx-auto">
                        <form :action="route('produits.index')" method="get">
                            <input type="text" id="search-bar" name="search" class="w-[42rem] h-10 pl-10 rounded-2xl focus:outline-none ring-gray-900/20 ring-1 focus:ring-2 focus:ring-slate-900 border-none shadow-xl placeholder:text-slate-500 font-medium" placeholder="Rechercher parmi les produits">
                            <div class="absolute top-0 left-0 inline-flex items-center py-2 px-2">
                                <svg class="w-6 h-6 text-slate-900" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-2">
                    <Link :href="route('home')" class="px-4 py-2 outline-none border-2 border-transparent flex items-center space-x-1.5 rounded-xl hover:bg-black hover:bg-opacity-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        <!-- indicator of number of products inside basket -->
                        <span class="inline-flex items-center justify-center h-6 w-6 text-xs font-semibold text-white bg-slate-900 rounded-full">
                            0
                        </span>
                    </Link>
                    <div class="relative flex items-center w-auto">
                        <Dropdown align="right" width="56">
                            <template #trigger>
                                <span>
                                    <button type="button" class="inline-flex justify-center items-center px-4 py-2 font-semibold text-lg rounded-xl hover:bg-black hover:bg-opacity-5 focus:bg-opacity-5 focus:bg-black focus:outline-none transition ease duration-200">
                                        &Agrave; propos
                                        <svg class="ml-1 mt-[0.1875rem] -mr-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink>
                                    Comment ça marche ?
                                </DropdownLink>
                                <DropdownLink>
                                    Qui sommes-nous ?
                                </DropdownLink>
                                <DropdownLink>
                                    Nous contacter
                                </DropdownLink>
                                <DropdownLink>
                                    Aide
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative flex items-center" v-if="$page.props.auth.user">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <span class="inline-flex">
                                    <button type="button" class="inline-flex items-center px-4 py-2 font-semibold rounded-xl text-lg hover:bg-black hover:bg-opacity-5 focus:bg-opacity-5 focus:bg-black focus:outline-none transition ease duration-200">
                                        <div v-for="role in $page.props.auth.user.roles">
                                            <svg v-if="role.name === 'Administrateur' || role.name === 'Modérateur'" fill="none" viewBox="0 0 24 24" stroke-width="0" stroke="currentColor" class="w-7 h-7 mr-1 fill-azure stroke-white">
                                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        {{ $page.props.auth.user.name }}
                                        <svg class="ml-2 -mr-0.5 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <DropdownLink>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Profil
                                </DropdownLink>
                                <DropdownLink :href="route('logout')" method="post" as="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                    Déconnexion
                                </DropdownLink>
                            </template>
                        </Dropdown>
                    </div>
                    <div class="flex items-center" v-else>
                        <Link :href="route('login')" class="flex items-center hover:bg-black hover:bg-opacity-5 focus:bg-opacity-5 px-4 py-2 outline-none rounded-xl whitespace-nowrap transition duration-200 ease font-medium text-lg">
                            Se connecter
                        </Link>
                    </div>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <ResponsiveNavLink>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Home
                </ResponsiveNavLink>
                <ResponsiveNavLink>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12a7.5 7.5 0 0015 0m-15 0a7.5 7.5 0 1115 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077l1.41-.513m14.095-5.13l1.41-.513M5.106 17.785l1.15-.964m11.49-9.642l1.149-.964M7.501 19.795l.75-1.3m7.5-12.99l.75-1.3m-6.063 16.658l.26-1.477m2.605-14.772l.26-1.477m0 17.726l-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205L12 12m6.894 5.785l-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864l-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>
                    Settings
                </ResponsiveNavLink>
                <ResponsiveNavLink>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                    Help
                </ResponsiveNavLink>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800" v-if="$page.props.auth.user">{{ $page.props.auth.user.name }}</div>
                    <div class="font-medium text-sm text-gray-500" v-if="$page.props.auth.user">{{ $page.props.auth.user.email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <ResponsiveNavLink :href="route('admin')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Profil
                    </ResponsiveNavLink>
                    <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                        </svg>
                        Déconnexion
                    </ResponsiveNavLink>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import ApplicationLogo from './../ApplicationLogo.vue';
import ResponsiveNavLink from './../ResponsiveNavLink.vue';
import Dropdown from './../Dropdown.vue';
import DropdownLink from './../DropdownLink.vue';
import {Link} from '@inertiajs/inertia-vue3';
import {ref} from "vue";

const showingNavigationDropdown = ref(false);

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
        document.getElementById("navbar").classList.add("bg-white");
    } else {
        if (document.getElementById("navbar").classList.contains("bg-white")) {
            document.getElementById("navbar").classList.remove("bg-white");
        }
    }
}
</script>
