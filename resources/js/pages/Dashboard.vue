<script setup lang="ts">
import Inspiration from '@/components/Dashboard/Inspiration.vue';
import MainView from '@/components/Dashboard/MainView.vue';
import Navigation from '@/components/Dashboard/Navigation.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div>
                <MainView />
                <Inspiration />
            </div>
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <Navigation
                        hreflink="/search"
                        buttonName="Start Searching"
                        description="Looking for something? Start searching here! Find exactly what you're looking for and explore your favorites."
                        :icon="`<svg xmlns='http://www.w3.org/2000/svg' class='mr-3 h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' stroke-width='2' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M11 4a7 7 0 1 1 0 14 7 7 0 0 1 0-14zm0 0l6 6m-6-6l-6 6'></path></svg>`"
                        title="Search"
                    />
                </div>

                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <Navigation
                        title="Saved Recipes"
                        hreflink="/favorites"
                        buttonName="Favorites"
                        description="Discover the items you love the most. Easily manage your favorites and stay up-to-date on the latest content!"
                        :icon="`<svg xmlns='http://www.w3.org/2000/svg' class='mr-3 h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' stroke-width='2' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M5 12l5 5L20 7'></path></svg>`"
                    />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <Navigation
                        title="About Us"
                        hreflink="/about"
                        buttonName="Discover"
                        description="Want to know more about us?"
                        :icon="`<svg xmlns='http://www.w3.org/2000/svg' class='mr-3 h-5 w-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' stroke-width='2' aria-hidden='true'><path stroke-linecap='round' stroke-linejoin='round' d='M5 12l5 5L20 7'></path></svg>`"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
