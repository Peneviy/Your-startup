<template>
    <cases-main title='Интернет-магазин «УЧИМ СТИХИ ПРОСТО!»' link="https://stihi-prosto.ru/" background ="/_nuxt/assets/img/stihi.jpg"/>
    <cases-text year="2022" subtitle="Для тех, кто имеет трудности с запоминанием стихов наизусть, можно использовать метод ассоциаций. Например, можно связать каждую строчку стихотворения с определенным объектом или картинкой, которые легко запоминаются. Важно не забывать повторять стихотворение несколько раз в день, чтобы закрепить его в памяти."/>
    <cases-saitPoetry first="/_nuxt/assets/img/poetry.png" second="/_nuxt/assets/img/poetry2.png" third="/_nuxt/assets/img/poetry3.png" color="rgba(243, 240, 240, 1)"/>
    <cases-text year="Задача" subtitle="Главная задача заключалась в разработке платформы для изучения стихов с применением комбинированной мнемотехники, с упором на высокое качество и легкость использования как для администратора, так и для пользователя." />
    <cases-saitOver1 first="/_nuxt/assets/img/poetry4.jpg" second="/_nuxt/assets/img/poetry6.png" third="/_nuxt/assets/img/poetry5.png" color="rgba(243, 240, 240, 1)"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>

<style>

</style>