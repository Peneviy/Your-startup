<template>
    <div class="home-page">
        <home-main :data = page?.main />
        <home-about :data = page?.about />
        <div class="about-video-conyainer">
            <about-video :data="page?.video_main"/>
        </div>
        <home-services :data = page?.services_section />
        <home-development :data = page?.development />
        <home-team :data="page?.team" />
        <home-showcase :data="page?.projects"/>
        <home-quiz />
        <home-companies :data="page?.companies"/>
        <HomeSectionOrder />
    </div>
</template>

<script setup>
const { data: page } = useNuxtData('page/home');
const is_cases = useState('is_cases');
is_cases.value = false;
</script>
<style scoped>
    .home-page .about-video-conyainer {
        max-width: 75vw;
        width: auto;
        margin: 0px auto;
        height: auto
    }

    @media screen and (max-width: 1200px) {
        .home-page .about-video-conyainer {
            max-width: 100%;
        }
    }
</style>

<style src="~/assets/css/home.css"></style>