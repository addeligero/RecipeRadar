<script setup lang="ts">
import { ref } from 'vue';

const searchQuery = ref('');
const searchHistory = ref(['Pasta carbonara', 'Chicken curry', 'Vegetable soup']);

const recentSearches = ref([
    { query: 'Chocolate cake', timestamp: '2 days ago' },
    { query: 'Quick dinner ideas', timestamp: '3 days ago' },
    { query: 'Gluten-free bread', timestamp: '1 week ago' },
]);

const submitSearch = () => {
    if (searchQuery.value.trim()) {
        // Here you would typically handle the search
        console.log('Searching for:', searchQuery.value);
        searchQuery.value = '';
    }
};

const clearHistory = () => {
    searchHistory.value = [];
};
</script>

<template>
    <div class="flex h-full flex-col">
        <div class="mb-4 p-4">
            <h2 class="mb-2 text-xl font-semibold">Search Recipes</h2>
            <div class="relative">
                <input
                    v-model="searchQuery"
                    type="text"
                    placeholder="Find recipes, ingredients..."
                    class="w-full rounded-lg border border-gray-300 py-2 pl-4 pr-10 outline-none focus:border-orange-500 focus:ring focus:ring-orange-200 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                    @keyup.enter="submitSearch"
                />
                <button
                    @click="submitSearch"
                    class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-orange-500 dark:text-gray-400"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto p-4 pt-0">
            <div v-if="searchHistory.length > 0">
                <div class="mb-2 flex items-center justify-between">
                    <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Popular Searches</h3>
                    <button @click="clearHistory" class="text-xs text-orange-600 hover:underline dark:text-orange-400">Clear</button>
                </div>
                <div class="mb-4 flex flex-wrap gap-2">
                    <span
                        v-for="(term, index) in searchHistory"
                        :key="index"
                        class="rounded-full bg-gray-100 px-3 py-1 text-xs hover:bg-orange-100 dark:bg-gray-700 dark:hover:bg-gray-600"
                    >
                        {{ term }}
                    </span>
                </div>
            </div>

            <div v-if="recentSearches.length > 0">
                <h3 class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-300">Recent Searches</h3>
                <div class="flex flex-col gap-2">
                    <div
                        v-for="(search, index) in recentSearches"
                        :key="index"
                        class="flex cursor-pointer items-center justify-between rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                    >
                        <div class="flex items-center gap-2">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-4 w-4 text-gray-500"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <span class="text-sm">{{ search.query }}</span>
                        </div>
                        <span class="text-xs text-gray-500">{{ search.timestamp }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
