<template>
    <div class="about-page">
        <about-main :data="page?.main"/>
        <about-trust :data="page?.trust"/>
        <about-video :data="page?.video"/>
        <home-sectionOrder/>
    </div>
</template>
<script setup>
const { data: page } = useNuxtData('page/about');
const is_cases = useState('is_cases');
is_cases.value = true;
</script>
<style>
    
</style>