<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

defineProps<{
    favorites: Array<{
        id: string;
        data: any;
    }>;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'My Favorites',
        href: '/favorites',
    },
];
</script>

<template>
    <Head title="My Favorites" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <h1 class="mb-4 text-2xl font-bold">My Favorite Meals</h1>

            <div v-if="favorites.length > 0" class="flex flex-col items-center gap-4">
                <div v-for="favorite in favorites" :key="favorite.id" class="w-full max-w-4xl rounded-lg border p-4 shadow-md">
                    <div class="flex flex-col gap-4 md:flex-row">
                        <!-- Meal Image and Video -->
                        <div class="flex flex-col md:w-1/3">
                            <!-- Meal Image -->
                            <img :src="favorite.data.strMealThumb" :alt="favorite.data.strMeal" class="h-48 w-full rounded-lg object-cover" />
                        </div>

                        <!-- Meal Details -->
                        <div class="flex flex-col justify-center md:w-2/3">
                            <h2 class="mb-2 text-2xl font-semibold">{{ favorite.data.strMeal }}</h2>
                            <p class="mb-1 text-sm text-gray-600"><strong>Category:</strong> {{ favorite.data.strCategory }}</p>
                            <p class="mb-1 text-sm text-gray-600"><strong>Area:</strong> {{ favorite.data.strArea }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <p>You haven't added any favorites yet.</p>
            </div>
        </div>
    </AppLayout>
</template>
