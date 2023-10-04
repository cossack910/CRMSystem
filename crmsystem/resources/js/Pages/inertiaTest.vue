<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    testets<br />
    <a href="/">a tag</a> <br />
    <Link href="/">Link経由です</Link> <br />
    <Link :href="route('inertia.index')">name付きです</Link> <br />
    <Link :href="route('inertia.show', { id: 1 })">ルートパラメータ</Link>
    <br />
</template>
