<template>
    <cases-main title='Лендинг Expert Standart' link="https://expertstandart.com/" background ="/_nuxt/assets/img/expert.jpg"/>
    <cases-text year="2021" subtitle="Цель сертификации ISO для бизнеса заключается в том, чтобы установить и подтвердить соответствие организации международным стандартам качества и безопасности."/>
    <cases-saitColor first="/_nuxt/assets/img/expert1.png" second="/_nuxt/assets/img/expert2.png" third="/_nuxt/assets/img/expert3.png" color="rgba(243, 240, 240, 1)" color2="rgba(55, 55, 55, 1)"  />
    <cases-text year="Задача" subtitle="Реализовать простой, удобный сайт для заказа сертификации, что позволит бизнесу быстро и легко ознакомиться с процедурами сертификации, выбрать подходящий стандарт и получить необходимую информацию о требованиях и процессе аудита." />
    <!-- <cases-project first="/_nuxt/assets/img/expertstandart.jpg" second="/_nuxt/assets/img/expertstandart1.jpg" color="rgba(243, 240, 240, 1)"/> -->
    <cases-projectMobileFree first="/_nuxt/assets/img/expert13.png" second="/_nuxt/assets/img/expert14.png" third="/_nuxt/assets/img/expert15.png" color="rgba(55, 55, 55, 1)"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>

<style>

</style>