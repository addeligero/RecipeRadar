<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Top lists',
        href: '/favorites',
    },
];

const favorites = computed(() => usePage().props.favorites ?? []);
const mealDetails = ref<any>(null);
const error = ref<string | null>(null);

const fetchMealDetails = async (mealName: string) => {
    try {
        const response = await fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${mealName}`);
        const data = await response.json();

        if (data.meals && data.meals.length > 0) {
            mealDetails.value = data.meals[0]; // Set the fetched meal details
        } else {
            error.value = 'No details found for this meal.';
        }
    } catch (err) {
        console.error('Error fetching meal details:', err);
        error.value = 'Failed to fetch meal details. Please try again later.';
    }
};

const viewmore = (mealName: string) => {
    fetchMealDetails(mealName);
};

function deleteFavorite(id: number) {
    if (confirm('Are you sure you want to remove this favorite?')) {
        router.delete(`/favorites/${id}`, {
            onSuccess: () => {
                console.log(`Deleted favorite with ID: ${id}`);
            },
        });
    }
}
</script>

<template>
    <Head title="My Favorites" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="px-6 py-4">
            <h1 class="mb-6 text-3xl font-bold">My Favorites</h1>

            <div v-if="favorites.length > 0" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div v-for="favorite in favorites" :key="favorite.id" class="rounded-2xl bg-white p-5 shadow transition hover:shadow-md">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800">{{ favorite.meal_name }}</h2>
                    <img :src="favorite.meal_thumb" alt="Meal Image" class="mb-4 w-full rounded-lg" />
                    <div class="flex items-center justify-between">
                        <button
                            @click="viewmore(favorite.meal_name)"
                            class="from-brown-700 via-brown-600 to-brown-500 focus:ring-brown-300 dark:focus:ring-brown-700 relative z-10 inline-flex transform items-center rounded-lg bg-gradient-to-r px-4 py-1 text-base font-medium text-white transition duration-300 ease-in-out hover:scale-105 hover:bg-opacity-90 focus:outline-none focus:ring-4"
                        >
                            View more
                        </button>
                        <button
                            @click="deleteFavorite(favorite.id)"
                            class="rounded-xl bg-red-500 px-4 py-2 text-sm text-white transition hover:bg-red-600"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- if no favorites -->
            <div v-else class="py-12 text-center text-gray-500">
                <p class="text-xl">You don't have any favorites yet.</p>
                <p class="mt-2 text-sm">Start adding some content to your favorites!</p>
            </div>

            <div v-if="mealDetails" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="flex w-full max-w-4xl rounded-lg bg-white p-6 shadow-lg">
                    <div class="w-1/3 flex-shrink-0">
                        <img :src="mealDetails.strMealThumb" alt="Meal Image" class="w-full rounded-lg" />
                    </div>

                    <div class="ml-6 flex-1 text-black">
                        <h2 class="mb-4 text-2xl font-bold">{{ mealDetails.strMeal }}</h2>
                        <p class="text-lg"><strong>Category:</strong> {{ mealDetails.strCategory }}</p>
                        <p class="text-lg"><strong>Area:</strong> {{ mealDetails.strArea }}</p>
                        <p class="text-lg"><strong>Instructions:</strong> {{ mealDetails.strInstructions }}</p>

                        <div v-if="mealDetails.strYoutube" class="mt-4">
                            <a :href="mealDetails.strYoutube" target="_blank" class="text-blue-500 hover:underline"> Watch tutorial on YouTube </a>
                        </div>

                        <button @click="mealDetails = null" class="mt-4 rounded-lg bg-red-500 px-6 py-2 text-white">Close</button>
                    </div>
                </div>
            </div>

            <div v-if="error" class="mt-4 text-red-500">
                {{ error }}
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.bg-gradient-to-r {
    background-image: linear-gradient(to right, #6b4226, #8e6e53, #b57b47); /* Wood-like gradient */
}

.hover\:scale-105:hover {
    transform: scale(1.05);
}

.focus\:ring-brown-300 {
    ring-color: #a27456;
}

.focus\:ring-brown-700 {
    ring-color: #5f3f1f;
}

.transition-all {
    transition: all 0.3s ease-in-out;
}
</style>
