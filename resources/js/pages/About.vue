<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Discover about us and recipe radar',
        href: '/favorites',
    },
];
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-screen space-y-16 py-8">
            <!-- Hero Section with Animation -->
            <section class="space-y-6 text-center">
                <div class="animate-fade-in-down">
                    <h1 class="bg-gradient-to-r from-orange-400 to-amber-600 bg-clip-text text-4xl font-bold text-transparent md:text-6xl">
                        About RecipeRadar
                    </h1>
                    <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-400">
                        Discover our story, values, and the passion behind helping you find the perfect recipe. Cooking made simple, fun, and
                        inspiring.
                    </p>
                </div>
            </section>

            <!-- Our Story Section with Enhanced Layout -->
            <section class="grid items-center gap-12 px-4 md:grid-cols-2">
                <div class="transform overflow-hidden rounded-3xl shadow-2xl transition duration-500 hover:shadow-orange-400/20">
                    <img src="/images/teampicture.jpg" alt="Our Story" class="h-auto w-full object-cover transition duration-700 hover:scale-105" />
                </div>
                <div class="space-y-6">
                    <h2 class="border-l-4 border-amber-500 pl-4 text-3xl font-semibold">Our Journey</h2>
                    <p class="leading-relaxed text-gray-400">
                        RecipeRadar started with a simple idea: making cooking more accessible and enjoyable for everyone. From finding new dishes to
                        saving your favorites, we aim to be your ultimate companion in the kitchen.
                    </p>
                    <p class="leading-relaxed text-gray-400">
                        Since our founding, we have grown to serve millions of cooking enthusiasts, bringing together culinary traditions from around
                        the world with modern technology to create an experience that inspires creativity in the kitchen.
                    </p>
                </div>
            </section>

            <!-- Core Values with Enhanced Cards -->
            <section class="space-y-10 px-4">
                <h2 class="text-center text-3xl font-semibold">
                    <span class="inline-block border-b-2 border-amber-500 pb-2">Our Core Values</span>
                </h2>

                <div class="grid gap-8 md:grid-cols-3">
                    <div
                        class="group rounded-3xl bg-gray-900/80 p-8 text-center shadow-xl backdrop-blur-sm transition-all duration-300 hover:translate-y-[-8px] hover:shadow-orange-500/20"
                    >
                        <div
                            class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-orange-400 to-amber-600 text-white"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"
                                />
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold transition-colors group-hover:text-amber-500">Innovation</h3>
                        <p class="text-gray-400">Always improving, always evolving — we bring you the latest and best in cooking technology.</p>
                    </div>

                    <div
                        class="group rounded-3xl bg-gray-900/80 p-8 text-center shadow-xl backdrop-blur-sm transition-all duration-300 hover:translate-y-[-8px] hover:shadow-orange-500/20"
                    >
                        <div
                            class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-orange-400 to-amber-600 text-white"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                />
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold transition-colors group-hover:text-amber-500">Community</h3>
                        <p class="text-gray-400">We believe cooking brings people together. Your feedback and recipes drive us forward.</p>
                    </div>

                    <div
                        class="group rounded-3xl bg-gray-900/80 p-8 text-center shadow-xl backdrop-blur-sm transition-all duration-300 hover:translate-y-[-8px] hover:shadow-orange-500/20"
                    >
                        <div
                            class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-orange-400 to-amber-600 text-white"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                />
                            </svg>
                        </div>
                        <h3 class="mb-4 text-2xl font-bold transition-colors group-hover:text-amber-500">Passion</h3>
                        <p class="text-gray-400">Food is our passion, and we want you to feel that love in every recipe you discover.</p>
                    </div>
                </div>
            </section>

            <!-- Team Section (New) -->
            <section class="space-y-8 px-4">
                <h2 class="text-center text-3xl font-semibold">
                    <span class="inline-block border-b-2 border-amber-500 pb-2">Meet Our Team</span>
                </h2>
                <p class="mx-auto max-w-2xl text-center text-gray-400">
                    The talented people behind RecipeRadar who work tirelessly to bring you the best cooking experience.
                </p>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="text-center">
                        <div class="relative mx-auto h-40 w-40 overflow-hidden rounded-full border-2 border-amber-500">
                            <img src="/images/marky.jpg" alt="Team Member" class="h-full w-full object-cover" />
                        </div>
                        <h3 class="mt-4 text-xl font-semibold">Mark Jamisola</h3>
                        <p class="text-amber-500">Founder & Head Chef</p>
                    </div>

                    <div class="text-center">
                        <div class="relative mx-auto h-40 w-40 overflow-hidden rounded-full border-2 border-amber-500">
                            <img src="/images/adrian.jpg" alt="Team Member" class="h-full w-full object-cover" />
                        </div>
                        <h3 class="mt-4 text-xl font-semibold">Adrian Deligero</h3>
                        <p class="text-amber-500">Lead Developer</p>
                    </div>

                    <div class="text-center">
                        <div class="relative mx-auto h-40 w-40 overflow-hidden rounded-full border-2 border-amber-500">
                            <img src="/images/james.jpg" alt="Team Member" class="h-full w-full object-cover" />
                        </div>
                        <h3 class="mt-4 text-xl font-semibold">James Espana</h3>
                        <p class="text-amber-500">Recipe Curator</p>
                    </div>

                    <div class="text-center">
                        <div class="relative mx-auto h-40 w-40 overflow-hidden rounded-full border-2 border-amber-500">
                            <img src="/images/christ.jpg" alt="Team Member" class="h-full w-full object-cover" />
                        </div>
                        <h3 class="mt-4 text-xl font-semibold">Christ Charl Gabales</h3>
                        <p class="text-amber-500">UX Designer</p>
                    </div>
                </div>
            </section>

            <!-- Stats Section (New) -->
            <section class="px-4 py-8">
                <div class="rounded-3xl bg-gradient-to-r from-gray-900 to-gray-800 p-8 shadow-2xl">
                    <div class="grid gap-8 text-center md:grid-cols-3">
                        <div>
                            <h3 class="text-4xl font-bold text-amber-500">50,000+</h3>
                            <p class="mt-2 text-gray-400">Delicious Recipes</p>
                        </div>
                        <div>
                            <h3 class="text-4xl font-bold text-amber-500">1.2M+</h3>
                            <p class="mt-2 text-gray-400">Happy Users</p>
                        </div>
                        <div>
                            <h3 class="text-4xl font-bold text-amber-500">120+</h3>
                            <p class="mt-2 text-gray-400">Cuisines Covered</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials (New) -->
            <section class="space-y-8 px-4">
                <h2 class="text-center text-3xl font-semibold">
                    <span class="inline-block border-b-2 border-amber-500 pb-2">What Users Say</span>
                </h2>

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="rounded-2xl bg-gray-900 p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-full bg-amber-500"></div>
                            <div>
                                <h4 class="font-semibold">Sarah T.</h4>
                                <div class="flex text-amber-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-400">
                            "RecipeRadar completely transformed my cooking experience. I've discovered so many amazing recipes that have become family
                            favorites!"
                        </p>
                    </div>

                    <div class="rounded-2xl bg-gray-900 p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-full bg-amber-500"></div>
                            <div>
                                <h4 class="font-semibold">Miguel R.</h4>
                                <div class="flex text-amber-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-400">
                            "As a beginner cook, RecipeRadar has been invaluable. The recipes are easy to follow and the results are always
                            delicious!"
                        </p>
                    </div>

                    <div class="rounded-2xl bg-gray-900 p-6 shadow-xl">
                        <div class="flex items-center gap-4">
                            <div class="h-12 w-12 rounded-full bg-amber-500"></div>
                            <div>
                                <h4 class="font-semibold">Ava K.</h4>
                                <div class="flex text-amber-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                                        />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-400">
                            "The 'Favorites' feature is a game-changer! I can save all my go-to recipes and access them instantly. RecipeRadar is now
                            essential in my kitchen."
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
