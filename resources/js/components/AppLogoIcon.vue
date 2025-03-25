<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" :class="className" v-bind="$attrs" fill="currentColor">
        <path
            d="M7 2c.55 0 1 .45 1 1v6.31c0 1.47-1.08 2.88-2.27 3.77L7 21.5c.06.3-.17.5-.46.5h-2.1c-.29 0-.52-.2-.46-.5l1.27-8.42C3.08 11.2 2 9.78 2 8.31V3c0-.55.45-1 1-1s1 .45 1 1v5h1V3c0-.55.45-1 1-1s1 .45 1 1v5h1V3c0-.55.45-1 1-1zm6 0c3 0 4 3 4 5 0 2.67-1.33 4-2.5 4.5L15 21.5c.06.3-.17.5-.46.5h-2.1c-.29 0-.52-.2-.46-.5l.5-10c-1.17-.5-2.5-1.83-2.5-4.5 0-2 1-5 4-5z"
        />
    </svg>
</template>
