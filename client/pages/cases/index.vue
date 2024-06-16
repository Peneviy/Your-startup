<template>
    <div class="projects-page">
        <projects-cases :data="page"/>
        <home-section-order :data="page"/>
    </div>
</template>

<script setup>
const is_cases = useState('is_cases');
const { data: page } = useNuxtData('page/cases');
is_cases.value = false;
</script>

<style src="~/assets/css/home.css"></style>

<style>
.projects-page #order {
    margin-top: 150px;
}
@media screen and (max-width: 1200px) {
    .projects-page #order {
        margin-top: 0px;
    }
}
</style>
