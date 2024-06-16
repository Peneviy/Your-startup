<template>
    <cases-main title='сайт Off-trade' link="https://off-trade.ru/" background ="/_nuxt/assets/img/trade.jpg"/>
    <cases-text year="2021" subtitle="Главной особенностью проекта Off-trade является его главная страница и анимации на ней. Она является своего рода визитной карточной сайта и служит для привлечения внимания потенциальных клиентов."/>
    <!-- <cases-component first="/_nuxt/assets/img/trade1.png" color="rgba(55, 55, 55, 1)"/> -->
    <cases-text year="Задача" subtitle="Нашей основной задачей было показать что ребята из Off-trade предлагают не стандартные маркетинговые решения. Именно поэтому мы выбрали темное оформление сайта и основной цвет ярко зеленый." />
    <cases-saitOver first="/_nuxt/assets/img/trade4.jpg" second="/_nuxt/assets/img/trade2.png" third="/_nuxt/assets/img/trade3.png" fourth="/_nuxt/assets/img/trade5.jpg" color="rgba(55, 55, 55, 1)"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>

<style>

</style>