<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

// Get favorites from the page props
const favorites = computed(() => usePage().props.favorites || []);
</script>

<template>
    <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
        <div class="relative flex flex-col items-center justify-center p-5">
            <Link
                :href="route('favorites')"
                class="relative z-10 mb-4 rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
            >
                My Favorites
            </Link>

            <!-- Favorites List -->
            <div class="max-h-60 w-full space-y-2 overflow-y-auto">
                <div v-if="favorites.length === 0" class="text-center text-gray-500">No favorites yet</div>

                <div v-for="favorite in favorites" :key="favorite.id" class="flex items-center rounded p-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                    <img :src="favorite.data.strMealThumb" :alt="favorite.data.strMeal" class="mr-3 h-10 w-10 rounded-full object-cover" />
                    <span class="truncate text-sm">{{ favorite.data.strMeal }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
