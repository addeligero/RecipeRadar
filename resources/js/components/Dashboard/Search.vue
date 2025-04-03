<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

const searchQuery = ref('');
const isExpanded = ref(false);
const searchContainer = ref(null);
const dropdown = ref(null);

const expandSearch = () => {
    isExpanded.value = true;
};

const closeSearch = (event) => {
    if (searchContainer.value && dropdown.value && !searchContainer.value.contains(event.target) && !dropdown.value.contains(event.target)) {
        isExpanded.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', closeSearch);
});

onUnmounted(() => {
    document.removeEventListener('click', closeSearch);
});

const searchHistory = ref(['Pasta carbonara', 'Chicken curry', 'Vegetable soup']);
const recentSearches = ref([
    { query: 'Chocolate cake', timestamp: '2 days ago' },
    { query: 'Quick dinner ideas', timestamp: '3 days ago' },
    { query: 'Gluten-free bread', timestamp: '1 week ago' },
]);

const clearHistory = () => {
    searchHistory.value = [];
};
</script>

<template>
    <div ref="searchContainer" class="relative mx-auto w-full max-w-lg">
        <!-- Search Box -->
        <div class="relative flex w-full items-center transition-all duration-300 ease-in-out">
            <input
                v-model="searchQuery"
                type="text"
                placeholder="Find recipes, ingredients..."
                class="w-full rounded-full border border-gray-300 bg-white px-5 py-3 text-sm text-gray-900 outline-none transition-all duration-300 ease-in-out focus:border-orange-500 focus:ring-2 focus:ring-orange-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                @focus="expandSearch"
            />
            <button class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 hover:text-orange-500 dark:text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                    />
                </svg>
            </button>
        </div>

        <!-- Floating Dropdown Results (Now Fully Visible) -->
        <transition name="fade">
            <div
                v-if="isExpanded"
                ref="dropdown"
                class="fixed left-1/2 top-20 z-50 w-full max-w-lg -translate-x-1/2 rounded-lg bg-white p-4 shadow-2xl dark:bg-gray-800"
            >
                <div v-if="searchHistory.length > 0" class="mb-4">
                    <div class="mb-2 flex items-center justify-between">
                        <h3 class="text-sm font-medium text-gray-600 dark:text-gray-300">Popular Searches</h3>
                        <button @click="clearHistory" class="text-xs text-orange-600 hover:underline dark:text-orange-400">Clear</button>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <span
                            v-for="(term, index) in searchHistory"
                            :key="index"
                            class="cursor-pointer rounded-full bg-gray-200 px-3 py-1 text-xs text-gray-700 transition-all hover:bg-orange-200 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600"
                        >
                            {{ term }}
                        </span>
                    </div>
                </div>

                <div v-if="recentSearches.length > 0">
                    <h3 class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-300">Recent Searches</h3>
                    <div class="space-y-2">
                        <div
                            v-for="(search, index) in recentSearches"
                            :key="index"
                            class="flex cursor-pointer items-center justify-between rounded-lg p-2 hover:bg-gray-100 dark:hover:bg-gray-700"
                        >
                            <div class="flex items-center gap-2 text-gray-700 dark:text-gray-300">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="h-4 w-4"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="text-sm">{{ search.query }}</span>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ search.timestamp }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
/* Fade transition for dropdown */
.fade-enter-active,
.fade-leave-active {
    transition:
        opacity 0.2s ease-in-out,
        transform 0.2s ease-in-out;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}
</style>
