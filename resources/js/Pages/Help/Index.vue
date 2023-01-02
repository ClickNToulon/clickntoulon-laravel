<script setup>
import Navbar from '@/Components/Navigation/Navbar.vue';
import { Head } from "@inertiajs/inertia-vue3";
import Footer from "@/Components/Navigation/Footer.vue";
import Pill from "@/Components/Navigation/Pill.vue";
</script>

<template>
    <Head title="Aide - Simpl'Achat"><title>Aide - Simpl'Achat</title></Head>
    <Navbar />
    <div class="relative mx-auto flex justify-center pl-3 px-4 sm:px-8 md:px-16 lg:px-32 1.5xl:px-42 pt-12">
        <div class="hidden lg:relative lg:block lg:flex-none">
            <div class="sticky">
                <nav class="pr-8 w-full xl:pr-16">
                    <ul>
                        <li>
                            <ul class="space-y-6 lg:space-y-3 border-l-2 border-slate-100 dark:border-slate-800">
                                <li>
                                    <a class="block border-l-[2px] pl-4 -ml-[2px] font-medium tracking-wide border-transparent hover:border-slate-400 dark:hover:border-slate-500 text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white" href="">
                                        &Agrave; propos
                                    </a>
                                </li>
                                <li>
                                    <a class="block border-l-[2px] pl-4 -ml-[2px] font-medium tracking-wide border-transparent hover:border-slate-400 dark:hover:border-slate-500 text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white" href="">
                                        Conditions Générales d'Utilisation
                                    </a>
                                </li>
                                <li>
                                    <a class="block border-l-[2px] pl-4 -ml-[2px] font-medium tracking-wide border-transparent hover:border-slate-400 dark:hover:border-slate-500 text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white" href="">
                                        Politique de confidentialité
                                    </a>
                                </li>
                                <li>
                                    <a class="block border-l-[2px] pl-4 -ml-[2px] font-medium tracking-wide border-transparent hover:border-slate-400 dark:hover:border-slate-500 text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white" href="">
                                        Signaler un contenu
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="min-w-0 max-w-2xl lg:w-full flex-auto px-4 lg:max-w-5xl lg:px-0">
            <article>
                <header class="mb-9">
                    <h1 class="text-3xl tracking-wide font-bold text-slate-900 uppercase">&Agrave; propos</h1>
                </header>
                <div class="prose prose-slate max-w-none prose-headings:scroll-mt-28 lg:prose-headings:scroll-mt-[8.5rem] prose-lead:text-slate-500 prose-a:font-semibold prose-a:underline prose-a:text-sky-500">
                    <p>
                        ClickNToulon est une plateforme créée par <a href="">Corentin THIBAUD</a> et <a href="">Quentin BOITEL</a>,
                        tous deux étudiants à l'ISEN Yncréa Méditerranée, ayant pour but de mettre en relation des clients
                        et les commerçants toulonnais.
                    </p>
                    <hr>
                    <h2 id="1">1. Pourquoi cette plateforme ?</h2>
                    <p>
                        <a href="">ClickNToulon</a> est une plateforme associative qui fonctionne 24h/24 7j/7,
                        réalisé par des étudiants de l’ISEN de Toulon.
                    </p>
                    <p>
                        Notre force principale est le local. Nous connaissons très bien le marché de Toulon et ses avantages.
                        Pour cette raison, un commerçant membre de la plateforme <b>peut proposer des évolutions à la plateforme</b>.
                        De plus, l’argent généré par la plateforme restera dans un circuit court le plus longtemps possible,
                        profitant aux clients et aux commerçants.
                    </p>
                    <p>
                        Conformément aux plateformes traditionnelles, l’inscription est <b>gratuite</b> pour l'Utilisateur.
                    </p>
                    <p>
                        Un commerçant pourra s’inscrire sur la plateforme gratuitement, mais devra s'acquitter d'une somme de 5&euro; HT par an pour effectuer des ventes.
                    </p>
                    <p>
                        <a href="">ClickNToulon</a> propose un contrôle total
                        pour les commerçants sur leurs boutiques en ligne : vous choisissez vos produits, votre prix pratiqué
                        et vous la personnalisez comme vous le souhaitez.
                        Vous ne savez pas comment faire ? Notre équipe pourra venir vous aider à configurer vos produits
                        et à attirer les clients qui feront la différence à la fin du mois.
                    </p>
                    <hr>
                    <h2 id="2">2. Qui peut rejoindre ClickNToulon ?</h2>
                    <p>
                        Tous les commerces de la ville de Toulon de petite taille (Entreprise unipersonnelle, TPE, PME, SARL)
                        et n’étant affilié à aucune marque de distribution peuvent rejoindre <a href="{{ path('home') }}">ClickNToulon</a>.
                        Dans un futur proche, la plateforme sera ouverte à tous les commerces de l’agglomération toulonnaise.
                    </p>
                    <hr>
                    <h2 id="3">3. Comment rejoindre ClickNToulon ?</h2>
                    <p>
                        Vous pouvez rejoindre <a href="{{ path('home') }}">ClickNToulon</a> en contactant un membre de l’équipe à l’adresse mail suivante :
                        <a href="mailto:contact@clickntoulon.fr">contact@clickntoulon.fr</a> et notre équipe vous répondra
                        dans les plus brefs délais<sup>*</sup>.
                    </p>
                    <p>
                        Afin de gagner un maximum de temps, merci de nous envoyer :
                    </p>
                    <ul class="mt-2 space-y-3 text-slate-500 dark:text-slate-400">
                        <li>Nom de votre boutique</li>
                        <li>Adresse de votre boutique</li>
                        <li>Adresse mail du magasin (si différente de l'adresse mail utilisée pour nous contacter)</li>
                        <li>Horaires du magasin</li>
                        <li>Téléphone du magasin</li>
                    </ul>
                    <p>
                        Vous pouvez remplir le formulaire disponible sur notre site pour vous inscrire.
                        Notre équipe vous recontactera dès réception de votre demande<sup>*</sup>.
                    </p>
                    <p class="text-sm">
                        * Nous faisons notre maximum, nous vous répondrons dans les 24 heures à la suite de votre demande au maximum.
                    </p>
                    <p>
                        &Agrave; ce moment-là, nous échangerons sur les besoins de votre boutique pour sa disponibilité en ligne.
                    </p>
                    <hr>
                    <h2 id="4">4. Quels sont les produits que je peux mettre en ligne ?</h2>
                    <p>
                        Vous pouvez mettre en ligne tous les produits que possède votre boutique et du moment que ce produit est autorisé à être vendu en ligne,
                        c'est-à-dire tous les produits que vous souhaitez et qui sont autorisés à la vente dans votre boutique sauf ceux contenant du tabac.
                    </p>
                    <hr>
                    <h2 id="5">5. Puis-je mettre en ligne des produits ayant des restrictions de vente ?</h2>
                    <p>
                        Si ce produit est autorisé par la loi à être vendu en ligne oui.
                        En revanche, il sera demandé au commerçant de procéder à toutes les vérifications nécessaires
                        avant de remettre le produit au client.
                        <a href="">ClickNToulon</a> ne pourra être tenu responsable
                        en cas de vente illégale d’un certain produit.
                    </p>
                    <hr>
                    <h2 id="6">6. Quelles sont les conditions appliquées sur la plateforme ?</h2>
                    <p>
                        Vous retrouverez toutes nos conditions de ventes et d’utilisation sur notre site Internet.
                        Si, une des conditions de vente de votre boutique rentre en collision avec une des nôtres
                        (hormis pour la liste de produits vendus, sur les restrictions de ventes et la présentation de votre boutique en ligne),
                        les conditions de votre boutique s’appliquent.
                    </p>
                    <hr>
                    <h2 id="7">7. Quelles sont les images que je peux mettre en ligne ?</h2>
                    <p>
                        Vous pouvez mettre en ligne des images de vos produits et de votre boutique uniquement.
                        Toutes les images doivent être visibles par tout le monde et n’incitant à aucune consommation dangereuse ou excessive d’un produit, et ceux avec des licences commerciales.
                        Toute image contraire à cette règle se verra retirée par notre équipe.
                    </p>
                </div>
            </article>
        </div>
        <div class="hidden xl:sticky xl:top-[4.5rem] xl:block xl:flex-none xl:overflow-y-auto xl:pl-6">
            <nav aria-labelledby="on-this-page-title" class="w-full">
                <h2 id="on-this-page-title" class="text-lg font-medium text-slate-900 dark:text-white">Sur cette page</h2>
                <ul class="mt-4 space-y-3 text-sm">
                    <li>
                        <ul class="mt-2 space-y-3 font-medium">
                            <li>
                                <Pill href="#1">
                                    1. Pourquoi cette plateforme ?
                                </Pill>
                            </li>
                            <li>
                                <Pill href="#2">
                                    2. Qui peut rejoindre Simpl'Achat ?
                                </Pill>
                            </li>
                            <li>
                                <Pill href="#3">
                                    3. Comment nous rejoindre ?
                                </Pill>
                            </li>
                            <li>
                                <Pill href="#4">
                                    4. Quels produits sont autorisés ?
                                </Pill>
                            </li>
                            <li>
                                <Pill href="#5">
                                    5. Le cas des produits avec restrictions de ventes
                                </Pill>
                            </li>
                            <li>
                                <Pill href="#6">
                                    6. Quelles sont les conditions appliquées ?
                                </Pill>
                            </li>
                            <li>
                                <Pill href="#7">
                                    7. Les images que je peux mettre en ligne
                                </Pill>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <Footer/>
</template>
