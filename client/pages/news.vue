<template>
    <div class="news-page">
        <NewsMain :data="page"/>
    </div>
</template>
<script setup>
const { data: page } = useNuxtData('page/news');
const is_cases = useState('is_cases');
is_cases.value = false;
</script>
<style>
    .news-page {
        margin: 60px 0px;
    }
</style>