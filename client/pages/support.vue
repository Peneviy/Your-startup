<template>
    <div class="support-page">
        <support-main title='Поддержка сайтов' background ="/_nuxt/assets/img/support_bg.jpg"/>
        <SupportAdvantages title='Преимущества'/>
        <SupportTechnologies title='Технологии'/>
        <SupportPackages title='Пакеты подписок'/>
        <HomeSectionOrder/>
    </div>
</template>
<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>
<style>
    
</style>