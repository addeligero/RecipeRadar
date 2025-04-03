<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

// Safely get favorites from page props with proper type checking
const favorites = computed(() => {
    try {
        const favs = usePage().props.favorites;
        if (Array.isArray(favs)) {
            return favs.slice(0, 3); // Show only first 3 favorites
        }
        return [];
    } catch (error) {
        console.error('Error accessing favorites:', error);
        return [];
    }
});

const hasMoreFavorites = computed(() => {
    try {
        const favs = usePage().props.favorites;
        return Array.isArray(favs) && favs.length > 3;
    } catch (error) {
        console.error('Error checking favorites length:', error);
        return false;
    }
});
</script>

<template>
    <div class="relative overflow-hidden rounded-xl border border-sidebar-border/70 bg-white dark:border-sidebar-border dark:bg-gray-800">
        <div class="flex h-full flex-col">
            <!-- Favorites List -->
            <div class="flex-1 overflow-y-auto p-2">
                <div v-if="!favorites.length" class="py-4 text-center text-gray-500">No favorites yet</div>

                <div
                    v-for="favorite in favorites"
                    :key="favorite.id"
                    class="group flex items-center rounded-lg p-2 transition-colors hover:bg-gray-50 dark:hover:bg-gray-700"
                >
                    <img
                        :src="favorite.data?.strMealThumb"
                        :alt="favorite.data?.strMeal || 'Meal'"
                        class="mr-3 h-10 w-10 rounded-full border border-gray-200 object-cover dark:border-gray-600"
                    />
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-medium text-gray-800 dark:text-gray-200">
                            {{ favorite.data?.strMeal || 'Untitled Meal' }}
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">
                            {{ favorite.data?.strCategory || 'Unknown Category' }}
                        </p>
                    </div>
                </div>

                <Link
                    v-if="hasMoreFavorites"
                    :href="route('favorites')"
                    class="mt-2 block p-2 text-center text-sm text-blue-600 hover:underline dark:text-blue-400"
                >
                    View all favorites
                </Link>
            </div>
        </div>
    </div>
</template>
