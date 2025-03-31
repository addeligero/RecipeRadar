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
        meals.value = data.meals || []; // Assign the meals data or an empty array if no results
    } catch (err) {
        error.value = 'Failed to fetch meals. Please try again later.';
    } finally {
        isLoading.value = false;
    }
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
                    class="w-full rounded-lg border px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
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
            <div v-else-if="meals.length > 0" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div v-for="meal in meals" :key="meal.idMeal" class="rounded-lg border p-4 shadow-md">
                    <img :src="meal.strMealThumb" :alt="meal.strMeal" class="mb-2 h-48 w-full rounded-lg object-cover" />
                    <h2 class="text-lg font-semibold">{{ meal.strMeal }}</h2>
                    <p class="text-sm text-gray-600">{{ meal.strCategory }}</p>
                    <p class="text-sm text-gray-600">{{ meal.strArea }}</p>
                </div>
            </div>

            <!-- No results message -->
            <div v-else>
                <p>No meals found. Try searching for something else.</p>
            </div>
        </div>
    </AppLayout>
</template>
