<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <div
        class="mb-8 rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 p-6 shadow-xl transition-all duration-300 hover:scale-[1.01]"
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
