<script setup>
import FlashMessage from "@/Components/FlashMessage.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import { onMounted } from "vue";

const props = defineProps({
    customers: Object,
});

onMounted(() => {
    console.log(props.customers);
    console.log(props.customers.last_page);
});
</script>

<template></template>
