<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router, usePage } from '@inertiajs/vue3';
import { computed, onMounted } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Favorites',
        href: '/favorites',
    },
];

const favorites = computed(() => usePage().props.favorites ?? []);

function deleteFavorite(id: number) {
    if (confirm('Are you sure you want to remove this favorite?')) {
        router.delete(`/favorites/${id}`, {
            onSuccess: () => {
                console.log(`Deleted favorite with ID: ${id}`);
            },
        });
    }
}

onMounted(() => {
    console.log(favorites.value);
    console.log('Page props:', usePage().props);
});
</script>

<template>
    <Head title="My Favorites" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="px-6 py-4">
            <h1 class="mb-6 text-3xl font-bold">My Favorites</h1>

            <!-- Check if there are any favorites -->
            <div v-if="favorites.length > 0" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div v-for="favorite in favorites" :key="favorite.id" class="rounded-2xl bg-white p-5 shadow transition hover:shadow-md">
                    <h2 class="mb-2 text-xl font-semibold text-gray-800">{{ favorite.meal_name }}</h2>
                    <img :src="favorite.meal_thumb" alt="Meal Image" class="mb-4 w-full rounded-lg" />
                    <button class="rounded-xl bg-blue-500 px-4 py-2 text-sm text-white transition hover:bg-blue-600">View More</button>
                    <button
                        @click="deleteFavorite(favorite.id)"
                        class="rounded-xl bg-red-500 px-4 py-2 text-sm text-white transition hover:bg-red-600"
                    >
                        Delete
                    </button>
                </div>
            </div>

            <!-- if walay favorites -->
            <div v-else class="py-12 text-center text-gray-500">
                <p class="text-xl">You don't have any favorites yet.</p>
                <p class="mt-2 text-sm">Start adding some content to your favorites!</p>
            </div>
        </div>
    </AppLayout>
</template>
