<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface Meal {
    idMeal: string;
    strMeal: string;
    strMealThumb: string;
    strCategory?: string;
    strArea?: string;
    strInstructions?: string;
    strYoutube?: string;
    // Add other meal properties as needed
}

interface Favorite {
    id: string;
    data: Meal;
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Search for best match',
        href: '/dashboard',
    },
];

const meals = ref<Meal[]>([]);
const error = ref<string | null>(null);
const searchQuery = ref('');
const isLoading = ref(false);

// Get current favorites from page props with type safety
const currentFavorites = computed<Favorite[]>(() => {
    const favs = usePage().props.favorites;
    return Array.isArray(favs) ? favs : [];
});

const favorites = ref<Record<string, boolean>>(
    currentFavorites.value.reduce(
        (acc, favorite) => {
            if (favorite?.id) {
                acc[favorite.id] = true;
            }
            return acc;
        },
        {} as Record<string, boolean>,
    ),
);

// Check if a meal is favorited
const isFavorited = (mealId: string) => {
    return !!favorites.value[mealId];
};

// Toggle favorite status
const toggleFavorite = async (meal: Meal) => {
    if (!meal?.idMeal) return;

    const wasFavorited = isFavorited(meal.idMeal);
    favorites.value[meal.idMeal] = !wasFavorited;

    try {
        await router.post(
            '/favorites',
            {
                meal_id: meal.idMeal, // Send only the meal_id and is_favorite
                is_favorite: !wasFavorited,
            },
            {
                preserveScroll: true,
                preserveState: true,
            },
        );
    } catch (err) {
        favorites.value[meal.idMeal] = wasFavorited; // Revert on error
        console.error('Error updating favorite:', err);
        error.value = 'Failed to update favorite. Please try again later.'; // Optionally handle the error UI
    }
};

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

        if (data.meals) {
            meals.value = data.meals;
        } else {
            error.value = 'No meals found. Try searching for something else.';
            meals.value = [];
        }
    } catch (err) {
        console.error('Error fetching meals:', err);
        error.value = 'Failed to fetch meals. Please try again later.';
    } finally {
        isLoading.value = false;
    }
};

const getYouTubeVideoId = (url: string): string => {
    if (!url) return '';
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
                            <div class="relative">
                                <img :src="meal.strMealThumb" :alt="meal.strMeal || 'Meal image'" class="h-48 w-full rounded-lg object-cover" />
                                <!-- Favorite Button -->
                                <button
                                    @click="toggleFavorite(meal)"
                                    class="absolute right-2 top-2 rounded-full bg-white/80 p-2 backdrop-blur-sm hover:bg-white"
                                    :title="isFavorited(meal.idMeal) ? 'Remove from Favorites' : 'Add to Favorites'"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6"
                                        :class="isFavorited(meal.idMeal) ? 'fill-red-500 text-red-500' : 'fill-none text-gray-600'"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                        />
                                    </svg>
                                </button>
                            </div>
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
                            <p v-if="meal.strCategory" class="mb-1 text-sm text-gray-600"><strong>Category:</strong> {{ meal.strCategory }}</p>
                            <p v-if="meal.strArea" class="mb-1 text-sm text-gray-600"><strong>Area:</strong> {{ meal.strArea }}</p>
                            <p v-if="meal.strInstructions" class="mb-2 text-sm text-gray-600">
                                <strong>Instructions:</strong> {{ meal.strInstructions }}
                            </p>
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
