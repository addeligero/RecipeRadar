<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Search for best match',
        href: '/dashboard',
    },
];

const meals = ref([]);
const error = ref<string | null>(null);
const searchQuery = ref('');
const isLoading = ref(false);

// Fetch data from the API
const fetchMeals = async () => {
    if (!searchQuery.value.trim()) {
        error.value = 'Please enter a search term.';
        meals.value = [];
        return;
    }

    try {
        isLoading.value = true;
        error.value = null;
        const response = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${searchQuery.value}`);
        const data = await response.json();
        meals.value = data.meals || [];
    } catch (err) {
        console.error('Error fetching meals:', err); // Log error for debugging
        error.value = 'Failed to fetch meals. Please try again later.';
    } finally {
        isLoading.value = false;
    }
};

// Helper function to extract YouTube video ID
const getYouTubeVideoId = (url: string): string => {
    const regExp = /(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([^&]+)|youtu\.be\/([^&]+)/;
    const match = url.match(regExp);
    return match ? match[1] || match[2] : '';
};
</script>
<template>
    <Head title="Search Results" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <h1 class="mb-4 text-2xl font-bold">Search for Meals</h1>

            <!-- Search Input -->
            <div class="mb-4 flex items-center gap-2">
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Enter a meal name..."
                    class="w-full rounded-lg border px-4 py-2 text-sm text-black focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
                <button
                    @click="fetchMeals"
                    class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300"
                >
                    Search
                </button>
            </div>

            <div v-if="error" class="text-red-500">
                {{ error }}
            </div>

            <div v-else-if="isLoading">
                <p>Loading meals...</p>
            </div>

            <!-- meals -->

            <div v-else-if="meals.length > 0" class="flex flex-col items-center gap-4">
                <div v-for="meal in meals" :key="meal.idMeal" class="w-full max-w-4xl rounded-lg border p-4 shadow-md">
                    <div class="flex flex-col gap-4 md:flex-row">
                        <!-- Meal Image and Video -->
                        <div class="flex flex-col md:w-1/3">
                            <!-- Meal Image -->
                            <img :src="meal.strMealThumb" :alt="meal.strMeal" class="h-48 w-full rounded-lg object-cover" />
                            <br />
                            <hr class="bg-white" />
                            <!-- Embed YouTube Video -->
                            <div v-if="meal.strYoutube" class="mt-4">
                                <h3 class="mb-2 text-lg font-semibold">Watch tutorial:</h3>
                                <iframe
                                    :src="`https://www.youtube.com/embed/${getYouTubeVideoId(meal.strYoutube)}`"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    class="h-64 w-full rounded-lg"
                                ></iframe>
                            </div>
                        </div>

                        <!-- Meal Details -->
                        <div class="flex flex-col justify-center md:w-2/3">
                            <h2 class="mb-2 text-2xl font-semibold">{{ meal.strMeal }}</h2>
                            <p class="mb-1 text-sm text-gray-600"><strong>Category:</strong> {{ meal.strCategory }}</p>
                            <p class="mb-1 text-sm text-gray-600"><strong>Area:</strong> {{ meal.strArea }}</p>
                            <p class="mb-2 text-sm text-gray-600"><strong>Instructions:</strong> {{ meal.strInstructions }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- No results message -->
            <div v-else>
                <p>No meals found. Try search for something.</p>
            </div>
        </div>
    </AppLayout>
</template>
