<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const emitTest = (e) => console.log(e);
</script>

<template>
    <GuestLayout>
        <InputLabel value="件名">ラベル</InputLabel>
        <TextInput
            moduleValue="初期値が入ります"
            @update:model-value="emitTest"
        ></TextInput>
    </GuestLayout>
</template>
