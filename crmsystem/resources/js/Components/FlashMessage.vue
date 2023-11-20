<script setup></script>

<template>
    <div v-if="$page.props.flash.status" class="bg-blue-300 test-white p-4">
        {{ $page.props.flash.message }}
    </div>
</template>
