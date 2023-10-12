<script setup>
import { router } from "@inertiajs/vue3";

defineProps({
    id: String,
    blog: Object,
});

const deleteConfirm = (id) => {
    router.delete(`/inertia/${id}`, {
        onBefore: () => confirm("本当に削除しますか"),
    });
};
</script>

<template>
    {{ blog.id }} <br />
    {{ blog.title }}<br />
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>
