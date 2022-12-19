@extends('app')

@section('body')
<div class="py-10">
    <div class="flex flex-col max-w-6xl mx-auto space-y-4">
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-2xl font-bold text-black dark:text-white inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="ml-3">Vos horaires</span>
                </h3>
            </div>
        </div>
        <div class="md:col-span-2 w-full md:w-auto">
            <form action="" method="post">
                @csrf
                <div class="overflow-hidden">
                    <div class="space-y-2">
                        <div class="flex flex-wrap items-center justify-center p-1 rounded-lg bg-slate-300 dark:bg-slate-800 w-fit mx-auto">
                            <a class="tab w-full sm:w-auto cursor-pointer tab-active" id="lundiTab" onclick="changeTab('lundi', 'lundiTab')">Lundi</a>
                            <a class="tab w-full sm:w-auto cursor-pointer" id="mardiTab" onclick="changeTab('mardi', 'mardiTab')">Mardi</a>
                            <a class="tab w-full sm:w-auto cursor-pointer" id="mercrediTab" onclick="changeTab('mercredi', 'mercrediTab')">Mercredi</a>
                            <a class="tab w-full sm:w-auto cursor-pointer" id="jeudiTab" onclick="changeTab('jeudi', 'jeudiTab')">Jeudi</a>
                            <a class="tab w-full sm:w-auto cursor-pointer" id="vendrediTab" onclick="changeTab('vendredi', 'vendrediTab')">Vendredi</a>
                            <a class="tab w-full sm:w-auto cursor-pointer" id="samediTab" onclick="changeTab('samedi', 'samediTab')">Samedi</a>
                            <a class="tab w-full sm:w-auto cursor-pointer" id="dimancheTab" onclick="changeTab('dimanche', 'dimancheTab')">Dimanche</a>
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 block" id="lundi">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Lundi
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 1])
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 hidden" id="mardi">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Mardi
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 2])
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 hidden" id="mercredi">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Mercredi
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 3])
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 hidden" id="jeudi">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Jeudi
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 4])
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 hidden" id="vendredi">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Vendredi
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 5])
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 hidden" id="samedi">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Samedi
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 6])
                        </div>
                        <div class="grid grid-cols-2 gap-y-1 tablet:gap-6 hidden" id="dimanche">
                            <div class="col-span-2 flex -mb-4">
                                <label class="block text-lg font-medium text-black dark:text-white">
                                    Dimanche
                                </label>
                            </div>
                            @include('inputGroup', ['openingHours' => $openingHours, 'day' => 7])
                        </div>
                        <input type="hidden" value="1" name="day">
                        <div class="text-center">
                            <button
                                type="submit"
                                class="group inline-flex items-center justify-center rounded-lg py-2 px-4 font-bold focus:outline-none
                                                    focus-visible:outline-2 focus-visible:outline-offset-2 bg-slate-900 dark:bg-sky-600 text-white hover:bg-slate-700

                                                    dark:hover:bg-sky-500 hover:text-slate-100 focus-visible:outline-slate-900 transition-all duration-500"
                            >
                                Sauvegarder les horaires
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
