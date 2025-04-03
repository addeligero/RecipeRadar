<script setup lang="ts">
import MyFavorite from '@/components/Dashboard/FavoriteNavigation.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const greeting = ref('');
const username = ref('User');
const isLoading = ref(true);

onMounted(() => {
    // Simulate loading time
    setTimeout(() => {
        isLoading.value = false;
    }, 500);

    // Set greeting based on time of day
    const hour = new Date().getHours();
    if (hour < 12) greeting.value = 'Good morning';
    else if (hour < 18) greeting.value = 'Good afternoon';
    else greeting.value = 'Good evening';

    // Here you would fetch the user name from your auth system
    // For now using a placeholder
    username.value = 'Chef';
});
</script>

<template>
    <Head title="Recipe Radar Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-6 p-4 md:p-6">
            <!-- Hero Banner -->
            <div
                class="relative flex min-h-[180px] w-full flex-col justify-end overflow-hidden rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 p-6 text-white shadow-lg md:min-h-[220px]"
            >
                <div class="absolute right-0 top-0 h-full w-1/2 opacity-20">
                    <img src="/images/food-pattern.svg" alt="Food Pattern" class="h-full w-full object-cover" />
                </div>

                <div class="relative z-10 max-w-2xl">
                    <h1 class="mb-1 text-2xl font-bold md:text-3xl">{{ greeting }}, {{ username }}!</h1>
                    <p class="text-sm opacity-90 md:text-base">What delicious dish are you looking to make today?</p>

                    <div class="mt-4 flex w-full max-w-lg">
                        <div class="relative flex-1">
                            <input
                                type="text"
                                placeholder="Search for recipes, ingredients, cuisine..."
                                class="w-full rounded-l-lg border-0 bg-white/90 py-3 pl-4 pr-10 text-gray-800 placeholder-gray-500 shadow-sm outline-none focus:bg-white focus:ring-2 focus:ring-orange-400"
                            />
                            <button class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-5 w-5"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                    />
                                </svg>
                            </button>
                        </div>
                        <button class="flex items-center justify-center rounded-r-lg bg-orange-700 px-4 text-white shadow-sm hover:bg-orange-800">
                            Search
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Access Section -->
            <div class="grid gap-4 md:grid-cols-4">
                <div
                    v-for="(category, index) in ['Breakfast', 'Lunch', 'Dinner', 'Desserts']"
                    :key="index"
                    class="flex cursor-pointer flex-col items-center justify-center rounded-xl bg-white p-4 shadow-sm transition-all hover:shadow-md dark:bg-gray-800"
                >
                    <div class="mb-2 flex h-12 w-12 items-center justify-center rounded-full bg-orange-100 text-orange-600 dark:bg-gray-700">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75-1.5.75a3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0 3.354 3.354 0 0 0-3 0 3.354 3.354 0 0 1-3 0L3 16.5m15-3.38a48.474 48.474 0 0 0-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 0 1 3 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 0 1 6 13.12M12.265 3.11a.375.375 0 1 1 .53 0L12.5 3.5l.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 1 1 .53 0l.265.39.265-.39a.375.375 0 0 1 .53 0l.265.39.265-.39z"
                            />
                        </svg>
                    </div>
                    <span class="font-medium">{{ category }}</span>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid gap-6 md:grid-cols-3">
                <!-- My Favorites Section -->
                <div class="flex flex-col rounded-xl bg-white p-4 shadow-sm dark:bg-gray-800 md:col-span-1">
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold">My Favorites</h2>
                        <button class="text-sm font-medium text-orange-600 hover:underline">View All</button>
                    </div>
                    <div class="flex-1">
                        <MyFavorite />
                    </div>
                </div>

                <!-- Recent Recipes Section -->
                <div class="flex flex-col rounded-xl bg-white p-4 shadow-sm dark:bg-gray-800 md:col-span-2">
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold">Recent Recipes</h2>
                        <button class="text-sm font-medium text-orange-600 hover:underline">View All</button>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div
                            v-for="i in 6"
                            :key="i"
                            class="group cursor-pointer rounded-lg bg-gray-50 p-2 transition-all hover:bg-orange-50 dark:bg-gray-700 dark:hover:bg-gray-600"
                        >
                            <div class="relative mb-2 aspect-square overflow-hidden rounded-lg bg-gray-200">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke-width="1.5"
                                        stroke="currentColor"
                                        class="h-8 w-8 text-gray-400"
                                    >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <span class="line-clamp-1 font-medium">Loading recipe...</span>
                                <span class="text-xs text-gray-500">Prep time: -- min</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Sections -->
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Trending Recipes -->
                <div class="flex flex-col rounded-xl bg-white p-4 shadow-sm dark:bg-gray-800">
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold">Trending Now</h2>
                        <button class="text-sm font-medium text-orange-600 hover:underline">View All</button>
                    </div>
                    <div class="flex flex-col gap-3">
                        <div
                            v-for="i in 4"
                            :key="i"
                            class="flex cursor-pointer items-center gap-3 rounded-lg p-2 transition-all hover:bg-gray-50 dark:hover:bg-gray-700"
                        >
                            <div class="h-12 w-12 flex-shrink-0 overflow-hidden rounded-md bg-gray-200"></div>
                            <div class="flex-1 truncate">
                                <div class="line-clamp-1 font-medium">Popular recipe #{{ i }}</div>
                                <div class="text-xs text-gray-500">15 min • Easy</div>
                            </div>
                            <div class="flex items-center gap-1 text-xs text-gray-500">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-4 w-4"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"
                                    />
                                </svg>
                                <span>4.8</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seasonal Suggestions -->
                <div class="flex flex-col rounded-xl bg-white p-4 shadow-sm dark:bg-gray-800">
                    <div class="mb-4 flex items-center justify-between">
                        <h2 class="text-lg font-semibold">Seasonal Suggestions</h2>
                        <button class="text-sm font-medium text-orange-600 hover:underline">Explore</button>
                    </div>
                    <div
                        class="relative h-full min-h-[160px] overflow-hidden rounded-lg bg-gradient-to-br from-teal-500 to-emerald-700 p-4 text-white"
                    >
                        <div class="absolute right-0 top-0 h-full w-1/2 opacity-10">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-full w-full"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"
                                />
                            </svg>
                        </div>
                        <div class="relative z-10">
                            <h3 class="mb-2 text-xl font-bold">Spring Recipes</h3>
                            <p class="mb-4 text-sm opacity-90">Fresh ingredients for the new season</p>
                            <button class="rounded-lg bg-white/20 px-4 py-2 text-sm font-medium backdrop-blur-sm transition-colors hover:bg-white/30">
                                Discover Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Add any component-specific styles here */
</style>
