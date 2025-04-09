<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps({
    hreflink: {
        type: String,
        required: true,
    },
    buttonName: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div
        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 shadow-lg transition-all hover:shadow-xl dark:border-sidebar-border"
    >
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-25"></div>

        <div class="relative z-10 flex flex-col items-center justify-center p-5 text-center">
            <!-- Title -->
            <h2 class="mb-4 text-2xl font-bold text-white">Explore Your Favorites</h2>

            <!-- Description -->
            <p class="mb-6 text-sm text-gray-200">
                Discover the items you love the most. Easily manage your favorites and stay up-to-date on the latest content!
            </p>

            <!-- Dynamic Link/Button -->
            <Link
                :href="hreflink"
                class="relative z-10 mb-4 inline-flex items-center transform rounded-lg bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-500 px-6 py-3 text-base font-medium text-white transition duration-300 ease-in-out hover:scale-105 hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-700"
                :aria-label="'Go to ' + buttonName"  <!-- Accessibility improvement -->
            >
                <!-- Icon -->
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mr-3 h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    aria-hidden="true"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                {{ buttonName }}
            </Link>
        </div>
    </div>
</template>

<style scoped>
.relative {
    position: relative;
}

.aspect-video {
    aspect-ratio: 16/9;
}

.border-sidebar-border {
    border-color: #e2e8f0;
}

.dark .border-sidebar-border {
    border-color: #2d3748;
}

.shadow-lg {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.transition-all {
    transition: all 0.3s ease-in-out;
}

.hover\:shadow-xl:hover {
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
}

.bg-gradient-to-r {
    background-image: linear-gradient(to right, #6366f1, #a855f7, #ec4899);
}

.hover\:scale-105:hover {
    transform: scale(1.05);
}

.bg-gray-800 {
    background-color: #2d3748;
}
</style>
