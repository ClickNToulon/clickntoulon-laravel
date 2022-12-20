<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HeroSection from "@/Components/HeroSection.vue";
import Navbar from "@/Components/Navigation/Navbar.vue";
import Footer from "@/Components/Footer.vue";

defineProps({
    canLogin: Boolean,
    roles: Array,
    products: Array,
})
</script>

<template>
    <Head title="Welcome"><title>Welcome</title></Head>
    <Navbar :roles="roles"/>
    <HeroSection />
    <div class="wrap mx-auto px-6 py-8 lg:px-40 lg:py-10">
        <h2 class="text-3xl md:text-5xl mb-4 lg:mb-16 font-bold text-sky-500 md:text-center tracking-tight">Comment ça marche ?</h2>
        <div class="lg:flex items-stretch gap-8">
            <video class="object-cover h-48 lg:h-auto lg:w-1/2 mb-8 rounded-[30px]" src="https://player.vimeo.com/progressive_redirect/playback/748038433/rendition/1080p/file.mp4?loc=external&amp;signature=b0ea143e99aebac45309888247ba553a9e09eb4733eaecae05e6b80935f954d0" muted=""></video>
            <div class="flex flex-col items-center lg:w-1/2">
                <div class="flex gap-8 mb-12">
                    <svg viewBox="0 0 153.37 168.81" class="w-1/4 md:w-20 flex-none">
                        <path d="M141 126.81c0-12.15-22.61-22-50.5-22-26.71 0-48.55 9-50.36 20.47C17.22 127.36 0 136.21 0 146.81c0 12.15 22.61 22 50.5 22 26.71 0 48.55-9 50.36-20.47 22.92-2.08 40.14-10.93 40.14-21.53Z" class="fill-sky-100"></path>
                        <path fill="#fff" d="m55.14 53.87 5.62 65.59C62.13 129.07 74.81 131 92.15 131s30-1.94 31.38-11.55l5.63-65.59V42.63h-74Z"></path>
                        <path fill="#382f2d" d="M92.15 133.51c-16.58 0-32.15-1.66-33.86-13.7a.68.68 0 0 1 0-.14l-5.64-65.59a1.48 1.48 0 0 1 0-.21V42.63a2.5 2.5 0 0 1 2.5-2.5h74a2.5 2.5 0 0 1 2.5 2.5v11.45L126 119.67v.15c-1.75 12.03-17.31 13.69-33.85 13.69Zm-28.91-14.34c1 6.63 9.39 9.34 28.91 9.34s27.87-2.71 28.9-9.35l5.61-65.4v-8.63h-69v8.63Z"></path>
                        <path fill="#382f2d" d="M92.15 65.74c-19 0-39.51-4-39.51-12.81h5c0 2.34 11.74 7.81 34.51 7.81s34.51-5.47 34.51-7.81h5c0 8.8-20.48 12.81-39.51 12.81Z"></path>
                        <ellipse fill="#fff" cx="92.15" cy="42.63" rx="37.01" ry="10.31"></ellipse>
                        <path fill="#382f2d" d="M92.15 55.43c-19 0-39.51-4-39.51-12.8s20.48-12.81 39.51-12.81 39.51 4 39.51 12.81-20.48 12.8-39.51 12.8Zm0-20.61c-22.77 0-34.51 5.47-34.51 7.81s11.74 7.8 34.51 7.8 34.51-5.47 34.51-7.8-11.74-7.81-34.51-7.81Z"></path>
                        <path fill="#382f2d" d="m59.13 49.3-2.75-4.17c6.29-4.14 19.88-6.71 35.48-6.71 15.22 0 28.67 2.48 35.1 6.47l-2.64 4.25c-5.51-3.42-18.56-5.72-32.46-5.72-16.44 0-28.28 2.96-32.73 5.88Z"></path>
                        <path fill="#382f2d" d="M92.15 52.93a113.56 113.56 0 0 0 21.12-1.84 9 9 0 0 0-15.64-3.17 9 9 0 0 0-14.44.58A9 9 0 0 0 70 50.88a111.44 111.44 0 0 0 22.15 2.05Z"></path>
                        <path fill="#fff" d="m14.14 72.87 5.62 65.59C21.13 148.07 33.81 150 51.15 150s30-1.94 31.38-11.55l5.63-65.59V61.63h-74Z"></path>
                        <path fill="#382f2d" d="M51.15 152.51c-16.58 0-32.15-1.66-33.86-13.7a.68.68 0 0 1 0-.14l-5.64-65.59a1.48 1.48 0 0 1 0-.21V61.63a2.5 2.5 0 0 1 2.5-2.5h74a2.5 2.5 0 0 1 2.5 2.5v11.45L85 138.67v.15c-1.75 12.03-17.31 13.69-33.85 13.69Zm-28.91-14.34c1 6.63 9.39 9.34 28.91 9.34s27.87-2.71 28.9-9.35l5.61-65.4v-8.63h-69v8.63Z"></path>
                        <path class="fill-sky-500" d="M67 63.06a126.86 126.86 0 0 0-30.83 0H14.53v9.37c0 5.69 16.57 10.3 37 10.3s37-4.61 37-10.3v-9.37Z"></path>
                        <path fill="#382f2d" d="M51.54 85.23c-19 0-39.51-4-39.51-12.8v-9.37a2.5 2.5 0 0 1 2.5-2.5H36a125.14 125.14 0 0 1 15.57-.94 125.14 125.14 0 0 1 15.57.94h21.41a2.5 2.5 0 0 1 2.5 2.5v9.37c0 8.8-20.48 12.8-39.51 12.8ZM17 65.56v6.87c0 2.33 11.74 7.8 34.51 7.8s34.51-5.47 34.51-7.8v-6.87H66.68a119.39 119.39 0 0 0-15.1-.92 119.39 119.39 0 0 0-15.1.92h-.31Z"></path>
                        <ellipse class="fill-sky-500" cx="51.15" cy="61.63" rx="37.01" ry="10.31"></ellipse>
                        <path fill="#382f2d" d="M51.15 74.43c-19 0-39.51-4-39.51-12.8s20.48-12.81 39.51-12.81 39.51 4 39.51 12.81-20.48 12.8-39.51 12.8Zm0-20.61c-22.77 0-34.51 5.47-34.51 7.81s11.74 7.8 34.51 7.8 34.51-5.43 34.51-7.8-11.74-7.81-34.51-7.81Z"></path>
                        <path class="fill-sky-500" d="M132.4 36.25a123.9 123.9 0 0 0-11.75-10 124.19 124.19 0 0 0-12.88-8.53l-17.25-13-5.64 7.48c-3.42 4.55 7 18.2 23.37 30.49s32.34 18.58 35.76 14l5.64-7.48Z"></path>
                        <path fill="#382f2d" d="M140 60.69c-8.2 0-21.76-7.33-33.27-16-8.07-6.08-15-12.69-19.57-18.63-5.3-6.93-6.75-12.1-4.28-15.36l5.63-7.49A2.5 2.5 0 0 1 92 2.72l17.13 12.89a127 127 0 0 1 13 8.62A124.66 124.66 0 0 1 134 34.35l17.12 12.89a2.51 2.51 0 0 1 .5 3.5L146 58.23c-1.28 1.7-3.36 2.46-6 2.46ZM91 8.22l-4.12 5.48c-.37.49-.38 3.26 4.26 9.32 4.28 5.59 10.86 11.86 18.61 17.68 18.19 13.69 30.86 16.38 32.25 14.52l4.13-5.49-15.24-11.48-.24-.21a118.69 118.69 0 0 0-11.51-9.82 118.66 118.66 0 0 0-12.61-8.34l-.26-.18Z"></path>
                        <ellipse class="fill-sky-500" cx="120.65" cy="26.23" rx="10.31" ry="37.01" transform="rotate(-53.02 120.647 26.23)"></ellipse>
                        <path fill="#382f2d" d="M146.25 52.48a28.7 28.7 0 0 1-10-2.36c-7-2.73-15.24-7.58-23.32-13.66-15.2-11.45-29.15-27-23.85-34S113.15 4.55 128.35 16c8.07 6.08 15 12.69 19.57 18.63 5.31 6.92 6.75 12.09 4.29 15.36q-1.87 2.49-5.96 2.49ZM94.92 4.94c-1 0-1.59.19-1.84.53-1.4 1.86 4.68 13.3 22.87 27 7.72 5.82 15.58 10.43 22.13 13 7.11 2.79 9.76 2 10.13 1.53.37-.5.39-3.26-4.26-9.32-4.28-5.59-10.89-11.86-18.61-17.68C110.45 8.78 99.26 4.94 94.92 4.94Z"></path>
                        <ellipse fill="#fff" cx="38.07" cy="102.55" rx="1" ry="2.18"></ellipse>
                        <path fill="#382f2d" d="M38.07 107.23c-2.06 0-3.5-1.92-3.5-4.68s1.44-4.68 3.5-4.68 3.5 1.92 3.5 4.68-1.44 4.68-3.5 4.68Zm11.87 15.1a8 8 0 0 1-7.86-6.78 2.5 2.5 0 0 1 4.94-.77 3 3 0 0 0 5.88-.24 2.5 2.5 0 1 1 5 .39 8 8 0 0 1-7.62 7.39Z"></path>
                        <ellipse fill="#fff" cx="62.07" cy="102.55" rx="1" ry="2.18"></ellipse>
                        <path fill="#382f2d" d="M62.07 107.23c-2.06 0-3.5-1.92-3.5-4.68s1.44-4.68 3.5-4.68 3.5 1.92 3.5 4.68-1.44 4.68-3.5 4.68Z"></path>
                    </svg>
                    <div class="md:w-80">
                        <h3 class="text-xl md:text-3xl font-semibold mb-1">Refillable groceries</h3>
                        <p>Products in waste-free packaging that can be returned for reuse</p>
                    </div>
                </div>
                <div class="flex gap-8 mb-12">
                    <svg viewBox="0 0 145.27 139.74" class="w-1/4 md:w-20 flex-none">
                        <rect x="21.93" y="2.5" width="98.24" height="133.73" rx="11.77" class="fill-sky-500"></rect>
                        <path fill="#382f2d" d="M108.39 138.73H33.7a14.28 14.28 0 0 1-14.27-14.27V14.27A14.28 14.28 0 0 1 33.7 0h74.69a14.28 14.28 0 0 1 14.27 14.27v110.19a14.28 14.28 0 0 1-14.27 14.27ZM33.7 5a9.28 9.28 0 0 0-9.27 9.27v110.19a9.28 9.28 0 0 0 9.27 9.27h74.69a9.28 9.28 0 0 0 9.27-9.27V14.27A9.28 9.28 0 0 0 108.39 5Z"></path>
                        <rect fill="#fff" x="31.59" y="10.56" width="78.76" height="125.74" rx="5.77"></rect>
                        <path fill="#382f2d" d="M104.59 138.8H37.36a8.28 8.28 0 0 1-8.27-8.27V16.32a8.27 8.27 0 0 1 8.27-8.26h67.23a8.27 8.27 0 0 1 8.26 8.26v114.21a8.28 8.28 0 0 1-8.26 8.27ZM37.36 13.06a3.27 3.27 0 0 0-3.27 3.26v114.21a3.28 3.28 0 0 0 3.27 3.27h67.23a3.27 3.27 0 0 0 3.26-3.27V16.32a3.26 3.26 0 0 0-3.26-3.26Z"></path>
                        <path fill="#fff" d="M41.41 24.22h58.82v31.01H41.41z"></path>
                        <path fill="#382f2d" d="M100.22 57.73H41.41a2.5 2.5 0 0 1-2.5-2.5v-31a2.5 2.5 0 0 1 2.5-2.5h58.81a2.5 2.5 0 0 1 2.5 2.5v31a2.5 2.5 0 0 1-2.5 2.5Zm-56.31-5h53.81v-26H43.91Z"></path>
                        <path fill="#fff" d="M42.23 65.74h57.99v59.42H42.23z"></path>
                        <path fill="#382f2d" d="M100.22 127.65h-58a2.49 2.49 0 0 1-2.5-2.5V65.74a2.5 2.5 0 0 1 2.5-2.5h58a2.5 2.5 0 0 1 2.5 2.5v59.41a2.49 2.49 0 0 1-2.5 2.5Zm-55.49-5h53V68.24h-53Zm98.04 16.15H2.5a2.5 2.5 0 0 1 0-5h140.27a2.5 2.5 0 1 1 0 5Z"></path>
                        <circle class="c" cx="94.72" cy="69.71" r="5"></circle><path fill="#382f2d" d="M94.72 64.71a5 5 0 1 1-5 5 5 5 0 0 1 5-5m0-5a10 10 0 1 0 10 10 10 10 0 0 0-10-10Z"></path>
                    </svg>
                    <div class="md:w-80">
                        <h3 class="text-xl md:text-3xl font-semibold mb-1">Ding dong</h3>
                        <p>Delivered to your doorstep (no need to be home) with carbon neutral delivery </p>
                    </div>
                </div>
                <div class="flex gap-8 mb-12">
                    <svg viewBox="0 0 173.29 155" class="w-1/4 md:w-20 flex-none">
                        <path fill="#382f2d" d="M159.49 50.51A77.5 77.5 0 0 0 9.35 76.43l-5-5.59a2.5 2.5 0 1 0-3.72 3.32l8.9 10a2.48 2.48 0 0 0 1.83.84 2.5 2.5 0 0 0 1.82-.79l9.4-10A2.5 2.5 0 0 0 19 70.79l-4.61 4.9A72.5 72.5 0 0 1 154.8 52.25a2.5 2.5 0 1 0 4.69-1.74Zm13.17 30.33-8.9-10a2.47 2.47 0 0 0-1.83-.84 2.52 2.52 0 0 0-1.86.79l-9.39 10a2.5 2.5 0 0 0 3.64 3.42l5.3-5.64a72.5 72.5 0 0 1-140.46 24.18 2.5 2.5 0 1 0-4.69 1.74A77.5 77.5 0 0 0 164.6 79.3l4.32 4.86a2.49 2.49 0 0 0 1.87.84 2.54 2.54 0 0 0 1.67-.63 2.5 2.5 0 0 0 .2-3.53Z"></path>
                        <path fill="#fff" d="m50.24 53 5.62 65.58c1.37 9.62 14 11.55 31.39 11.55s30-1.93 31.38-11.55L124.26 53V41.78h-74Z"></path>
                        <ellipse cx="86.74" cy="126.06" rx="45" ry="14.5" class="fill-sky-100"></ellipse>
                        <path fill="#fff" d="M49.93 42.05v11.24l5.62 65.59c1.37 9.61 14.06 11.55 31.39 11.55s30-1.94 31.39-11.55L124 53.29V42.05"></path>
                        <path fill="#382f2d" d="M87.25 132.66c-16.58 0-32.15-1.66-33.87-13.66v-.14l-5.63-65.62a1.48 1.48 0 0 1 0-.21V41.78a2.5 2.5 0 0 1 2.5-2.5h74a2.5 2.5 0 0 1 2.5 2.5v11.43l-5.63 65.59v.15c-1.77 12.05-17.33 13.71-33.87 13.71Zm-28.91-14.33c1 6.63 9.38 9.33 28.91 9.33s27.87-2.7 28.9-9.34l5.61-65.4v-8.64h-69v8.64Z"></path>
                        <path class="fill-sky-500" d="M52.74 48.56v4c2 3 17.17 9 34.51 9s32.49-5 34.49-9v-4l2.52-6.78h-74Z"></path>
                        <path fill="#382f2d" d="M87.25 64.9c-19 0-39.51-4-39.51-12.81h5c0 2.33 11.74 7.81 34.51 7.81s34.51-5.48 34.51-7.81h5c0 8.8-20.48 12.81-39.51 12.81Z"></path>
                        <ellipse class="fill-sky-500" cx="87.25" cy="41.78" rx="37.01" ry="10.31"></ellipse>
                        <path fill="#382f2d" d="M87.25 54.59c-19 0-39.51-4-39.51-12.81S68.22 29 87.25 29s39.51 4 39.51 12.8-20.48 12.79-39.51 12.79Zm0-20.61c-22.77 0-34.51 5.47-34.51 7.8s11.74 7.81 34.51 7.81 34.51-5.47 34.51-7.81S110 34 87.25 34Z"></path>
                        <ellipse fill="#fff" cx="74.4" cy="79.29" rx="1" ry="2.18"></ellipse>
                        <path fill="#382f2d" d="M74.4 84c-2.06 0-3.5-1.93-3.5-4.68s1.44-4.68 3.5-4.68 3.5 1.92 3.5 4.68S76.46 84 74.4 84Zm11.88 15.06a8 8 0 0 1-7.86-6.77 2.49 2.49 0 0 1 4.93-.77 3 3 0 0 0 5.89-.24 2.5 2.5 0 1 1 5 .39 8 8 0 0 1-7.62 7.39Z"></path>
                        <ellipse fill="#fff" cx="98.4" cy="79.29" rx="1" ry="2.18"></ellipse>
                        <path fill="#382f2d" d="M98.4 84c-2.06 0-3.5-1.93-3.5-4.68s1.44-4.68 3.5-4.68 3.5 1.92 3.5 4.68S100.46 84 98.4 84Z"></path>
                    </svg>
                    <div class="md:w-80">
                        <h3 class="text-xl md:text-3xl font-semibold mb-1">Faff-free returns</h3>
                        <p>We’ll collect your pots, wash them and fill them again &amp; again &amp; again…</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="wrap mx-auto px-6 py-8 lg:px-40 lg:py-10">
        <div class="flex flex-col items-center">
            <h2 class="text-3xl md:text-5xl mb-4 lg:mb-16 font-bold text-sky-500 md:text-center tracking-tight">
                Nouveaux produits
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-10 gap-y-6 w-full mx-auto">
                <div class="col-span-1 relative" v-for="product in products.data">
                    <div v-for="price in product.price">
                        <div v-if="price.unitPriceDiscount && !price.endDate" class="absolute top-2 left-2 bg-danger text-white tracking-wider text-lg font-bold px-2.5 py-1 rounded-xl">
                            -{{ price.unitPriceDiscount * 100 }}%
                        </div>
                        <Link href="#" class="absolute inset-0 hover:bg-black/5 rounded-2xl"/>
                        <img :src="product.image" class="rounded-2xl" alt="product image">
                        <div class="p-4 space-y-2">
                            <div class="flex justify-between items-center">
                                <h3 class="text-xl font-bold text-slate-900">
                                    {{ product.name }}
                                </h3>
                                <div class="space-x-4 flex items-center" v-if="price.unitPriceDiscount && !price.endDate">
                                    <p class="text-[22px] font-bold tracking-wide text-danger">
                                        {{ price.unitPrice * ( 1 - price.unitPriceDiscount) }}€
                                    </p>
                                    <p class="text-sm font-medium text-slate-500 line-through">
                                        {{ price.unitPrice }}€
                                    </p>
                                </div>
                                <div v-else>
                                    <p class="font-bold text-slate-900">
                                        {{ price.unitPrice }}€
                                    </p>
                                </div>
                            </div>
                            <p class="text-slate-900 font-medium truncate">
                                {{ product.description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <Footer />
</template>
