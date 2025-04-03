<script setup lang="ts">
import { ref } from 'vue';

const trending = ref([
    {
        id: 1,
        title: 'Creamy Tuscan Chicken',
        image: '/images/recipes/tuscan.jpg',
        prepTime: '30 min',
        difficulty: 'Medium',
        rating: 4.9,
        views: 2485,
    },
    {
        id: 2,
        title: 'Vegetable Curry',
        image: '/images/recipes/curry.jpg',
        prepTime: '40 min',
        difficulty: 'Easy',
        rating: 4.7,
        views: 1842,
    },
    {
        id: 3,
        title: 'Avocado Toast',
        image: '/images/recipes/avocado.jpg',
        prepTime: '10 min',
        difficulty: 'Easy',
        rating: 4.5,
        views: 1756,
    },
    {
        id: 4,
        title: 'Beef Stir Fry',
        image: '/images/recipes/stirfry.jpg',
        prepTime: '25 min',
        difficulty: 'Medium',
        rating: 4.6,
        views: 1623,
    },
]);

const viewRecipe = (id: number) => {
    console.log('View trending recipe:', id);
};
</script>

<template>
    <div class="flex h-full flex-col">
        <div class="mb-4 flex items-center justify-between p-4">
            <h2 class="text-xl font-semibold">Trending Now</h2>
            <button class="text-sm font-medium text-orange-600 hover:underline dark:text-orange-400">View All</button>
        </div>

        <div class="flex-1 overflow-y-auto p-4 pt-0">
            <div class="flex flex-col gap-3">
                <div
                    v-for="recipe in trending"
                    :key="recipe.id"
                    class="flex cursor-pointer items-center gap-3 rounded-lg p-2 transition-all hover:bg-gray-100 dark:hover:bg-gray-700"
                    @click="viewRecipe(recipe.id)"
                >
                    <div class="relative h-16 w-16 flex-shrink-0 overflow-hidden rounded-md bg-gray-200 dark:bg-gray-700">
                        <!-- Image placeholder, in real app would be :src="recipe.image" -->
                        <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                    </div>

                    <div class="flex-1">
                        <div class="line-clamp-1 font-medium">{{ recipe.title }}</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                            <span>{{ recipe.prepTime }}</span>
                            <span>•</span>
                            <span>{{ recipe.difficulty }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-1 text-xs text-gray-500 dark:text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-3 w-3 text-yellow-500">
                            <path
                                fill-rule="evenodd"
                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                                clip-rule="evenodd"
                            />
                        </svg>
                        <span>{{ recipe.rating }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
