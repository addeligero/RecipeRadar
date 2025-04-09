<template>
    <div class="flex items-center justify-center space-x-4">
        <!-- YouTube Embed Video -->
        <div class="relative aspect-video w-[60%] overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
            <video class="absolute left-0 top-0 h-full w-full rounded-lg" autoplay loop muted playsinline preload="auto">
                <source src="/video/1.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- Text Description Beside the Video -->
        <div class="flex flex-col justify-center space-y-4 text-center md:text-left">
            <h2 class="text-2xl font-bold text-white">Get Inspired by Cooking</h2>
            <p class="text-sm text-gray-200">
                Check out this amazing cooking tutorial to spark some creativity and get started with your next recipe! Stay tuned for more exciting
                content and recipes to inspire your next meal.
            </p>
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

/* Flex container */
.flex {
    display: flex;
}

.items-center {
    align-items: center;
}

.justify-center {
    justify-content: center;
}

.space-x-4 {
    gap: 1rem;
}

.md\:text-left {
    text-align: left;
}

.space-y-4 {
    gap: 1rem;
}
</style>
