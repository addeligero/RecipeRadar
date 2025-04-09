<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <div
        class="from-brown-700 via-brown-600 to-brown-500 mb-8 rounded-2xl bg-gradient-to-r p-6 shadow-xl transition-all duration-300 hover:scale-[1.01]"
    >
        <div class="flex items-center space-x-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white/20 text-3xl">👋</div>
            <div>
                <h2 class="text-xl font-semibold text-white sm:text-2xl">
                    Welcome back, <span class="font-bold">{{ user.name }}</span
                    >!
                </h2>
                <p class="text-sm text-indigo-100">Hope you're having a great day 🌟</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
.bg-gradient-to-r {
    background-image: linear-gradient(to right, #6b4226, #8e6e53, #b57b47); /* Wood-inspired gradient */
}

.bg-white-opacity-20 {
    background-color: rgba(255, 255, 255, 0.2);
}

.text-indigo-100 {
    color: #f1f5f9;
}

.text-white {
    color: #ffffff;
}

.shadow-xl {
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.hover\:scale-\[1.01\]:hover {
    transform: scale(1.01);
}

.transition-all {
    transition: all 0.3s ease-in-out;
}

.rounded-2xl {
    border-radius: 1rem;
}
</style>
