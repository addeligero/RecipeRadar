<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
        <div class="relative flex h-full flex-col items-center justify-center p-5">
            <img class="absolute h-full w-full opacity-75" src="/images/foods.png" alt="" />

            <Link
                href="search"
                class="relative z-10 rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
            >
                Search now
            </Link>
        </div>
    </div>
</template>
