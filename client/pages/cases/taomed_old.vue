<template>
    <cases-main title='Редизайн страницы «тао» ' link="https://www.taomed.ru/" background ="/_nuxt/assets/img/taomed.jpg"/>
    <cases-text year="2022" subtitle="Клиники «ТАО» - дружная команда высококлассных специалистов и особая атмосфера доверия и внимания. Они заботятся о вашем здоровье с 2007 года."/>
    <cases-saitT class="taomed" first="/_nuxt/assets/img/tao16.png" second="/_nuxt/assets/img/tao13.png" third="/_nuxt/assets/img/tao14.png"color="rgba(55, 55, 55, 1)"/>
    <cases-text year="Задача" subtitle="Понять поведение целевой аудитории, проработать прототип, разработать дизайн, сверстать и интегрировать с CMS 1С-Битрикс." />
    <cases-saitOver3 first="/_nuxt/assets/img/taomed5.jpg" second="/_nuxt/assets/img/tao11.png" third="/_nuxt/assets/img/tao12.png" color="rgba(55, 55, 55, 1)"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>

<style>
    .taomed .tao-first-block,
    .taomed .tao-second-block .tao-second-block-photo  {
        padding: 40px;
    }

    @media screen and (max-width: 1200px) {
        .taomed .tao-first-block,
        .taomed .tao-second-block .tao-second-block-photo  {
            padding: 10px;
        }
    }
</style>