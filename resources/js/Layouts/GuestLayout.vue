<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
import Pill from '@/Components/Navigation/Pill.vue';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-auto h-8 fill-current" />
            </Link>
        </div>
        <slot />
        <!-- Horizontal Rule -->
        <ul class="flex space-x-4 pt-6">
            <li>
                <Pill href="">Aide</Pill>
            </li>
            <li class="flex items-center justify-center">
                <!-- circle -->
                <svg class="w-2 h-2 fill-current text-slate-300" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
            </li>
            <li>
                <Pill href="">Conditions Générales d'Utilisation</Pill>
            </li>
            <li class="flex items-center justify-center">
                <!-- circle -->
                <svg class="w-2 h-2 fill-current text-slate-300" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
            </li>
            <li>
                <Pill href="">Politique de confidentialité</Pill>
            </li>
            <li class="flex items-center justify-center">
                <!-- circle -->
                <svg class="w-2 h-2 fill-current text-slate-300" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
            </li>
            <li>
                <Pill href="">&Agrave; propos</Pill>
            </li>
        </ul>
    </div>
</template>
