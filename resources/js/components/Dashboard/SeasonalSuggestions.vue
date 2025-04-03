<script setup lang="ts">
import { onMounted, ref } from 'vue';

const getCurrentSeason = () => {
    const month = new Date().getMonth();
    if (month >= 2 && month <= 4) return 'Spring';
    if (month >= 5 && month <= 7) return 'Summer';
    if (month >= 8 && month <= 10) return 'Fall';
    return 'Winter';
};

const season = ref(getCurrentSeason());

const seasonalRecipes = ref([
    {
        id: 1,
        title: 'Spring Vegetable Pasta',
        ingredients: ['Asparagus', 'Peas', 'Lemon', 'Mint'],
        image: '/images/recipes/spring-pasta.jpg',
    },
    {
        id: 2,
        title: 'Rhubarb Crisp',
        ingredients: ['Rhubarb', 'Strawberries', 'Oats', 'Brown Sugar'],
        image: '/images/recipes/rhubarb.jpg',
    },
    {
        id: 3,
        title: 'Grilled Artichokes',
        ingredients: ['Artichokes', 'Lemon', 'Garlic', 'Olive Oil'],
        image: '/images/recipes/artichokes.jpg',
    },
]);

const seasonalIngredients = ref(['Asparagus', 'Peas', 'Rhubarb', 'Strawberries', 'Artichokes', 'Radishes', 'Spring Onions', 'New Potatoes']);

// This would typically come from a weather API or user location
const weatherCondition = ref('Sunny');

onMounted(() => {
    // Here you would fetch seasonal recipes based on current date
    // For this example we're using static data
});
</script>

<template>
    <div class="flex h-full flex-col">
        <div class="mb-4 flex items-center justify-between p-4">
            <h2 class="text-xl font-semibold">{{ season }} Recipes</h2>
            <button class="text-sm font-medium text-orange-600 hover:underline dark:text-orange-400">Explore</button>
        </div>

        <div class="flex-1 p-4 pt-0">
            <div class="mb-4 overflow-hidden rounded-lg bg-gradient-to-br from-teal-500 to-emerald-700 p-4 text-white">
                <h3 class="mb-1 text-lg font-semibold">{{ season }} is Here!</h3>
                <p class="mb-3 text-sm opacity-90">Make the most of these seasonal ingredients</p>

                <div class="mb-3 flex flex-wrap gap-2">
                    <span
                        v-for="(ingredient, index) in seasonalIngredients.slice(0, 4)"
                        :key="index"
                        class="rounded-full bg-white/20 px-3 py-1 text-xs backdrop-blur-sm"
                    >
                        {{ ingredient }}
                    </span>
                    <span v-if="seasonalIngredients.length > 4" class="rounded-full bg-white/20 px-3 py-1 text-xs backdrop-blur-sm">
                        +{{ seasonalIngredients.length - 4 }} more
                    </span>
                </div>

                <button class="rounded-lg bg-white/20 px-4 py-2 text-sm font-medium backdrop-blur-sm transition-colors hover:bg-white/30">
                    Discover {{ season }} Recipes
                </button>
            </div>

            <div v-if="weatherCondition" class="mb-4 rounded-lg bg-blue-100 p-3 dark:bg-blue-900">
                <div class="flex items-center gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="h-5 w-5 text-blue-600 dark:text-blue-300"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                        />
                    </svg>
                    <span class="text-sm font-medium text-blue-800 dark:text-blue-200">{{ weatherCondition }} today - perfect for grilling!</span>
                </div>
            </div>

            <h3 class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-300">Featured Seasonal Recipes</h3>
            <div class="flex flex-col gap-2">
                <div
                    v-for="recipe in seasonalRecipes"
                    :key="recipe.id"
                    class="cursor-pointer rounded-lg border border-gray-200 bg-white p-3 shadow-sm transition-all hover:shadow-md dark:border-gray-700 dark:bg-gray-800"
                >
                    <div class="mb-2 font-medium">{{ recipe.title }}</div>
                    <div class="flex flex-wrap gap-1 text-xs text-gray-500 dark:text-gray-400">
                        <span v-for="(ingredient, idx) in recipe.ingredients" :key="idx">
                            {{ ingredient }}{{ idx < recipe.ingredients.length - 1 ? ',' : '' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
