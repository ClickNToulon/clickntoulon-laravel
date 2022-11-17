<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 relative">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-20 h-20 fill-current text-sky-500" />
            </Link>
        </div>
        <slot />
        <ul class="flex space-x-3 pt-12">
            <li>
                <Link href="https://laravel.com/docs" class="text-sm text-gray-700 font-medium hover:text-gray-900 underline">Aide</Link>
            </li>
            <li class="flex items-center justify-center">
                <!-- circle -->
                <svg class="w-2 h-2 fill-current text-gray-700" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
            </li>
            <li>
                <Link href="https://laracasts.com" class="text-sm text-gray-700 font-medium hover:text-gray-900 underline">Conditions Générales d'Utilisation</Link>
            </li>
            <li class="flex items-center justify-center">
                <!-- circle -->
                <svg class="w-2 h-2 fill-current text-gray-700" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
            </li>
            <li>
                <Link href="https://laravel-news.com" class="text-sm text-gray-700 font-medium hover:text-gray-900 underline">Politique de confidentialité</Link>
            </li>
            <li class="flex items-center justify-center">
                <!-- circle -->
                <svg class="w-2 h-2 fill-current text-gray-700" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3" />
                </svg>
            </li>
            <li>
                <Link href="https://blog.laravel.com" class="text-sm text-gray-700 font-medium hover:text-gray-900 underline">&Agrave; propos</Link>
            </li>
        </ul>
    </div>
</template>
