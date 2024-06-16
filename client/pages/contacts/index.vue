<template>
    <div class="contacts-page">
        <contacts-contact/>
    </div>
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = false;
</script>

<style src="~/assets/css/home.css"></style>