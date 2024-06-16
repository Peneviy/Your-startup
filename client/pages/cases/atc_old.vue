<template>
    <cases-main title='сайт АВТОТРАНС-СИБИРЬ' link="https://atsib.ru/" background ="/_nuxt/assets/img/atc.jpg"/>
    <cases-text year="2022" subtitle="Ветроэнергетика. Крупногабаритные и тяжеловесные перевозки. Монтаж, перебазировка, демонтаж буровых установок."/>
    <!-- <cases-component class="ats" first="/_nuxt/assets/img/ats11.png" color="rgba(243, 240, 240, 1)"/> -->
    <cases-text year="Задача" subtitle="Задача стояла в реализации удобной админ панели и добавления дополнительных функций для редактирования контента." />
    <cases-saitOver2 first="/_nuxt/assets/img/atc4.jpg" second="/_nuxt/assets/img/atc3.png" third="/_nuxt/assets/img/atc2.png" fifth="/_nuxt/assets/img/atc5.jpg" color="rgba(243, 240, 240, 1)"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>
<style>
.ats .com-first-block img {
    display: block;
    width: auto;
    height: auto;
    margin: 0px auto;  
}

@media screen and (max-width: 1540px) {
    .ats .com-first-block img {
        width: 100%;
        height: auto; 
    }
}
</style>