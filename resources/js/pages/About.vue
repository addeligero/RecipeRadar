<script setup lang="ts"></script>

<template>
    <div
        class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 shadow-lg transition-all hover:shadow-xl dark:border-sidebar-border"
    >
        <div class="absolute inset-0 bg-black opacity-25"></div>

        <div class="relative z-10 flex flex-col items-center justify-center p-6 text-center text-white">
            <h2 class="mb-4 text-3xl font-bold text-white">About Us</h2>

            <p class="mx-auto mb-6 max-w-3xl text-lg text-gray-200">
                We are a passionate team dedicated to bringing innovative solutions that make your life easier. Our mission is to empower individuals
                and businesses by providing high-quality products and services. With a customer-first approach, we focus on delivering the best
                experience to our clients and partners.
            </p>

            <div class="flex flex-wrap justify-center gap-8">
                <div class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member 1" class="mb-4 h-32 w-32 rounded-full object-cover" />
                    <h3 class="text-xl font-semibold">John Doe</h3>
                    <p class="text-sm text-gray-300">CEO & Founder</p>
                </div>

                <div class="flex flex-col items-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member 2" class="mb-4 h-32 w-32 rounded-full object-cover" />
                    <h3 class="text-xl font-semibold">Jane Smith</h3>
                    <p class="text-sm text-gray-300">Lead Developer</p>
                </div>
            </div>

            <div class="mt-8">
                <a
                    href="/contact"
                    class="inline-flex items-center rounded-lg bg-gradient-to-r from-indigo-600 via-purple-500 to-pink-500 px-6 py-3 text-base font-medium text-white transition duration-300 ease-in-out hover:scale-105 hover:bg-opacity-90 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-700"
                >
                    Get in Touch
                </a>
            </div>
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

.text-white {
    color: #fff;
}

.text-gray-200 {
    color: rgba(255, 255, 255, 0.7);
}

.text-gray-300 {
    color: rgba(255, 255, 255, 0.8);
}
</style>
