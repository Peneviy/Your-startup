<template>
    <cases-mainLogo title='ЛОГОТИП ДЛЯ РЫБНОЙ ФЕРМЫ' background ="/_nuxt/assets/img/fish.jpg"/>
    <cases-text year="2023" subtitle='Компания АО "ЯРОСЛАВСКИЙ БРОЙЛЕР" анонсировала открытие рыбной фермы «Рыба дивная». Предприятие построило индустриальный комплекс по выращиванию клариевого сома в Рыбинском районе Ярославской области. Общий объем инвестиций в проект составляет 1,7 млрд рублей. Производственная мощность предприятия в рамках второго этапа развития составит до 7000 тонн рыбы в год.'/>
    <!-- <cases-sait first="/_nuxt/assets/img/fishLogo11.png"/> -->
    <cases-text year="Задача" subtitle="Задача создать минималистичный логотип с отсутствием мелких деталей, но при этом нужно было создать логотип при взгляде на который было бы сразу понятно, что он из себя представляет, так же нужно было чтобы он выглядел премиально." />
    <cases-saitRew first="/_nuxt/assets/img/fishLogo6.jpg" second="/_nuxt/assets/img/fishLogo5.jpg" third="/_nuxt/assets/img/fishLogo4.jpg"/>
    <cases-wrapperLine :imgs="imgs" :color="'#373737'"/>
    <home-quiz />
</template>

<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;

const imgs = ref([
    '/_nuxt/assets/img/fishLogo7.jpg',
    '/_nuxt/assets/img/fishLogo8.jpg',
    '/_nuxt/assets/img/fishLogo9.jpg',
    '/_nuxt/assets/img/fishLogo10.jpg',
    '/_nuxt/assets/img/fishLogo11.jpg',
    '/_nuxt/assets/img/fishLogo12.jpg'
])
</script>

<style>

</style>