<template>
    <cases-main :title="page?.title" :link="page?.url" :background ="page?.background"/>
    <cases-year-text :year="page?.year" :subtitle="page?.desc"/>
    <component 
    :is="'cases-' + item?.type"
    v-for="item in page.blocks" :data="item[item?.type]"
    ></component>
    <home-quiz />
</template>
<script setup>
    const route = useRoute();
    const { data: page } = useNuxtData('page/cases/'  + route.params.slug);
    console.log(page);
    const is_cases = useState('is_cases');
    setTimeout(() => {
        is_cases.value = true;
    }, 100);
</script>
<style>
    
</style>