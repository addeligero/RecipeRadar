<!-- components/Dashboard/RecentRecipes.vue -->
<script setup lang="ts">
import { ref } from 'vue';

const recipes = ref([
    {
        id: 1,
        title: 'Pasta Primavera',
        prepTime: '25 min',
        difficulty: 'Easy',
        image: '/images/recipes/pasta.jpg',
        rating: 4.7,
    },
    {
        id: 2,
        title: 'Chicken Teriyaki',
        prepTime: '35 min',
        difficulty: 'Medium',
        image: '/images/recipes/chicken.jpg',
        rating: 4.8,
    },
    {
        id: 3,
        title: 'Veggie Burger',
        prepTime: '20 min',
        difficulty: 'Easy',
        image: '/images/recipes/burger.jpg',
        rating: 4.5,
    },
    {
        id: 4,
        title: 'Beef Stroganoff',
        prepTime: '45 min',
        difficulty: 'Medium',
        image: '/images/recipes/beef.jpg',
        rating: 4.6,
    },
]);

const isLoading = ref(false);

const viewRecipe = (id: number) => {
    console.log('View recipe:', id);
};
</script>

<template>
    <div class="flex h-full flex-col">
        <div class="mb-4 flex items-center justify-between p-4">
            <h2 class="text-xl font-semibold">Recent Recipes</h2>
            <button class="text-sm font-medium text-orange-600 hover:underline dark:text-orange-400">View All</button>
        </div>

        <div class="flex-1 overflow-y-auto p-4 pt-0">
            <div v-if="isLoading" class="flex h-full items-center justify-center">
                <svg class="h-8 w-8 animate-spin text-orange-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                    ></path>
                </svg>
            </div>

            <div v-else class="grid gap-4 md:grid-cols-2">
                <div
                    v-for="recipe in recipes"
                    :key="recipe.id"
                    class="cursor-pointer overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition-all hover:shadow-md dark:border-gray-700 dark:bg-gray-800"
                    @click="viewRecipe(recipe.id)"
                >
                    <div class="relative aspect-video bg-gray-200 dark:bg-gray-700">
                        <!-- Image placeholder, in real app would be :src="recipe.image" -->
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-8 w-8"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="p-3">
                        <div class="mb-1 flex items-center justify-between">
                            <h3 class="font-medium">{{ recipe.title }}</h3>
                            <div class="flex items-center text-xs text-gray-600 dark:text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="mr-1 h-3 w-3 text-yellow-500">
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                                {{ recipe.rating }}
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>{{ recipe.prepTime }}</span>
                            <span>{{ recipe.difficulty }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
