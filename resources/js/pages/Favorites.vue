<template>
    <div class="favorite-content">
        <h1>Favorite Content</h1>
        <ul>
            <li v-for="item in favoriteItems" :key="item.id">
                {{ item.name }}
            </li>
        </ul>
    </div>
</template>

<script lang="ts">
export default {
    name: 'FavoriteContent',
    data() {
        return {
            favoriteItems: [
                { id: 1, name: 'Item 1' },
                { id: 2, name: 'Item 2' },
                { id: 3, name: 'Item 3' },
            ],
        };
    },
};
</script>

<style scoped>
.favorite-content {
    padding: 20px;
}

.favorite-content h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.favorite-content ul {
    list-style-type: none;
    padding: 0;
}

.favorite-content li {
    margin: 5px 0;
}
</style>
