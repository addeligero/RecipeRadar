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
    description: {
        type: String,
        required: true,
    },
    icon: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        default: 'Welcome to Our Dashboard',
    },
});
</script>

<template>
    <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
        <!-- Background Overlay -->
        <div class="absolute inset-0 bg-black opacity-25"></div>

        <div class="relative z-10 flex flex-col items-center justify-center p-5 text-center">
            <h2 class="mb-4 text-2xl font-bold text-white">{{ title }}</h2>
            <p class="mb-6 text-sm text-gray-200">{{ description }}</p>
            <Link
                :href="hreflink"
                class="from-brown-700 via-brown-600 to-brown-500 focus:ring-brown-300 dark:focus:ring-brown-700 relative z-10 mb-4 inline-flex transform items-center rounded-lg bg-gradient-to-r px-6 py-3 text-base font-medium text-white transition duration-300 ease-in-out hover:scale-105 hover:bg-opacity-90 focus:outline-none focus:ring-4"
                :aria-label="'Go to ' + buttonName"
            >
                <!-- Icon -->
                <span v-html="icon"></span>
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
    background-image: linear-gradient(to right, #6b4226, #8e6e53, #b57b47); /* Wood-like gradient */
}

.hover\:scale-105:hover {
    transform: scale(1.05);
}

.bg-gray-800 {
    background-color: #2d3748;
}

.bg-brown-500 {
    background-color: #8e6e53;
}

.bg-brown-700 {
    background-color: #6b4226;
}

.bg-brown-600 {
    background-color: #7f5427;
}

.focus\:ring-brown-300 {
    ring-color: #a27456;
}

.focus\:ring-brown-700 {
    ring-color: #5f3f1f;
}
</style>
s
