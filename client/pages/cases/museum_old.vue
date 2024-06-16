<template>
    <cases-main title='САЙТ МУЗЕЯ ИСТОРИИ' link="https://vyksa-usadba.ru/" background="/_nuxt/assets/img/museum.jpg"/>
    <cases-text year="2022" subtitle="Музей истории АО «Выксунского металлургического завода» – точка культурного притяжения города Выкса и юга Нижегородской области."/>
    <!-- <cases-sait class="museum" first="/_nuxt/assets/img/museum18.png" second="/_nuxt/assets/img/musei11.png" third="/_nuxt/assets/img/met11.png" color="#373737"/> -->
    <cases-text  year="Задача" subtitle="Из основных задач было реализовать сайт согласно ГОСТ Р 52872. Этот стандарт определяет требования к веб-сайтам и их компонентам, которые обеспечивают доступность, удобство использования и безопасность для пользователей." />
    <cases-twoColumns first_img="/_nuxt/assets/img/museum4.jpg" second_img="/_nuxt/assets/img/museum5.jpg" :color="'#373737'"/>
    <cases-wrapperLine :imgs="imgs" :color="'#373737'"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
const imgs = ref([
    '/_nuxt/assets/img/museum11.jpg',
    '/_nuxt/assets/img/museum12.jpg',
    '/_nuxt/assets/img/museum13.jpg',
    '/_nuxt/assets/img/museum14.jpg',
    '/_nuxt/assets/img/museum15.jpg'
])
</script>

<style>
    .museum .second-block-photo {
        padding: 40px
    }

    @media screen and (max-width: 1200px) {
        .museum .second-block-photo {
            padding: 10px
        }
    }
</style>