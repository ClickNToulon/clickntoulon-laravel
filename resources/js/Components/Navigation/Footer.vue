<template>
    <!-- footer -->
    <footer class="wrap mx-auto pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 pt-8 mt-8 border-t border-slate-900/20">
        <div class="w-full">
            <div class="flex flex-col items-start justify-between lg:flex-row space-y-6 md:space-y-0 w-full border-b border-slate-300 pb-6">
                <div class="flex flex-col space-y-4 w-full md:max-w-xs items-center md:items-start justify-start">
                    <ApplicationLogo class="h-5 fill-sky-500"/>
                    <p class="text-slate-900 font-medium">
                        Vos achats ont du pouvoir
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-12 w-full max-w-7xl">
                    <div class="space-y-3 mx-auto">
                        <h2 class="font-medium text-slate-700 uppercase">Acheter</h2>
                        <ul class="space-y-1">
                            <li>
                                <Pill :href="route('produits.index')">
                                    Produits
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Boutiques
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Panier
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Rechercher
                                </Pill>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-3 mx-auto">
                        <h2 class="font-medium text-slate-700 uppercase">Commerçants</h2>
                        <ul class="space-y-1">
                            <li>
                                <Pill :href="route('home')">
                                    Notre solution
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Nos prix
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Guides
                                </Pill>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-3 mx-auto">
                        <h2 class="font-medium text-slate-700 uppercase">À propos</h2>
                        <ul class="space-y-1">
                            <li>
                                <Pill :href="route('home')">
                                    Comment ça marche ?
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Qui sommes-nous ?
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    FAQ
                                </Pill>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-3 mx-auto">
                        <h2 class="font-medium text-slate-700 uppercase">Légal</h2>
                        <ul class="space-y-1">
                            <li>
                                <Pill :href="route('home')">
                                    Signaler un problème
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Mentions légales
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Conditions Générales d'Utilisation
                                </Pill>
                            </li>
                            <li>
                                <Pill :href="route('home')">
                                    Politique de confidentialité
                                </Pill>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 justify-between mx-auto py-6">
                    <p class="font-medium">
                        © {{ dayjs(Date.now()).year() }} Simpl'Achat. Tous droits réservés.
                    </p>
                    <ul class="flex space-x-4">
                        <Link href="https://www.twitter.com/clickntoulon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-8 w-8">
                                <linearGradient id="_osn9zIN2f6RhTsY8WhY4a" x1="10.341" x2="40.798" y1="8.312" y2="38.769" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#2aa4f4"/>
                                    <stop offset="1" stop-color="#007ad9"/>
                                </linearGradient>
                                <path fill="url(#_osn9zIN2f6RhTsY8WhY4a)" d="M46.105,11.02c-1.551,0.687-3.219,1.145-4.979,1.362c1.789-1.062,3.166-2.756,3.812-4.758 c-1.674,0.981-3.529,1.702-5.502,2.082C37.86,8.036,35.612,7,33.122,7c-4.783,0-8.661,3.843-8.661,8.582 c0,0.671,0.079,1.324,0.226,1.958c-7.196-0.361-13.579-3.782-17.849-8.974c-0.75,1.269-1.172,2.754-1.172,4.322 c0,2.979,1.525,5.602,3.851,7.147c-1.42-0.043-2.756-0.438-3.926-1.072c0,0.026,0,0.064,0,0.101c0,4.163,2.986,7.63,6.944,8.419 c-0.723,0.198-1.488,0.308-2.276,0.308c-0.559,0-1.104-0.063-1.632-0.158c1.102,3.402,4.299,5.889,8.087,5.963 c-2.964,2.298-6.697,3.674-10.756,3.674c-0.701,0-1.387-0.04-2.065-0.122C7.73,39.577,12.283,41,17.171,41 c15.927,0,24.641-13.079,24.641-24.426c0-0.372-0.012-0.742-0.029-1.108C43.483,14.265,44.948,12.751,46.105,11.02"/>
                            </svg>
                        </Link>
                        <Link href="https://facebook.com/clickntoulon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-8 w-8">
                                <path fill="#039be5" d="M24 5A19 19 0 1 0 24 43A19 19 0 1 0 24 5Z"/>
                                <path fill="#fff" d="M26.572,29.036h4.917l0.772-4.995h-5.69v-2.73c0-2.075,0.678-3.915,2.619-3.915h3.119v-4.359c-0.548-0.074-1.707-0.236-3.897-0.236c-4.573,0-7.254,2.415-7.254,7.917v3.323h-4.701v4.995h4.701v13.729C22.089,42.905,23.032,43,24,43c0.875,0,1.729-0.08,2.572-0.194V29.036z"/>
                            </svg>
                        </Link>
                        <Link href="https://www.instagram.com/clickntoulon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-8 w-8">
                                <radialGradient id="yOrnnhliCrdS2gy~4tD8ma" cx="19.38" cy="42.035" r="44.899" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-color="#fd5"/>
                                    <stop offset=".328" stop-color="#ff543f"/>
                                    <stop offset=".348" stop-color="#fc5245"/>
                                    <stop offset=".504" stop-color="#e64771"/>
                                    <stop offset=".643" stop-color="#d53e91"/>
                                    <stop offset=".761" stop-color="#cc39a4"/>
                                    <stop offset=".841" stop-color="#c837ab"/>
                                </radialGradient>
                                <path fill="url(#yOrnnhliCrdS2gy~4tD8ma)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20 c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20 C42.014,38.383,38.417,41.986,34.017,41.99z"/><radialGradient id="yOrnnhliCrdS2gy~4tD8mb" cx="11.786" cy="5.54" r="29.813" gradientTransform="matrix(1 0 0 .6663 0 1.849)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#4168c9"/><stop offset=".999" stop-color="#4168c9" stop-opacity="0"/></radialGradient><path fill="url(#yOrnnhliCrdS2gy~4tD8mb)" d="M34.017,41.99l-20,0.019c-4.4,0.004-8.003-3.592-8.008-7.992l-0.019-20 c-0.004-4.4,3.592-8.003,7.992-8.008l20-0.019c4.4-0.004,8.003,3.592,8.008,7.992l0.019,20 C42.014,38.383,38.417,41.986,34.017,41.99z"/><path fill="#fff" d="M24,31c-3.859,0-7-3.14-7-7s3.141-7,7-7s7,3.14,7,7S27.859,31,24,31z M24,19c-2.757,0-5,2.243-5,5 s2.243,5,5,5s5-2.243,5-5S26.757,19,24,19z"/><circle cx="31.5" cy="16.5" r="1.5" fill="#fff"/><path fill="#fff" d="M30,37H18c-3.859,0-7-3.14-7-7V18c0-3.86,3.141-7,7-7h12c3.859,0,7,3.14,7,7v12 C37,33.86,33.859,37,30,37z M18,13c-2.757,0-5,2.243-5,5v12c0,2.757,2.243,5,5,5h12c2.757,0,5-2.243,5-5V18c0-2.757-2.243-5-5-5H18z"/>
                            </svg>
                        </Link>
                        <Link href="https://www.linkedin.com/clickntoulon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="h-8 w-8">
                                <path fill="#0288D1" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5V37z"/>
                                <path fill="#FFF" d="M12 19H17V36H12zM14.485 17h-.028C12.965 17 12 15.888 12 14.499 12 13.08 12.995 12 14.514 12c1.521 0 2.458 1.08 2.486 2.499C17 15.887 16.035 17 14.485 17zM36 36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698-1.501 0-2.313 1.012-2.707 1.99C24.957 25.543 25 26.511 25 27v9h-5V19h5v2.616C25.721 20.5 26.85 19 29.738 19c3.578 0 6.261 2.25 6.261 7.274L36 36 36 36z"/>
                            </svg>
                        </Link>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";
import Pill from "@/Components/Navigation/Pill.vue";

dayjs.extend(relativeTime);
</script>
