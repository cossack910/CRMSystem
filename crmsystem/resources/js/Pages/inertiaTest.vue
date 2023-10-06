<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const newTitle = ref("");
const newContent = ref("");
</script>

<template>
    testets<br />
    <a href="/">a tag</a> <br />
    <Link href="/">Link経由です</Link> <br />
    <Link :href="route('inertia.index')">name付きです</Link> <br />
    <Link :href="route('inertia.show', { id: 1 })">ルートパラメータ</Link>

    <div class="mb-8"></div>
    <input type="text" name="newTitle" v-model="newTitle" /> {{ newTitle
    }}<br />
    <input type="text" name="newTitle" v-model="newContent" /> {{ newContent
    }}<br />
    <Link
        as="button"
        method="post"
        :href="route('inertia.store')"
        :data="{
            title: newTitle,
            content: newContent,
        }"
        >DB保存テスト</Link
    >
</template>
