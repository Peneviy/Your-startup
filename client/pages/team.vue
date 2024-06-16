<template>
    <div class="team-page">
        <team-main title='команда' background ="/_nuxt/assets/img/team55.jpg"/>
        <team-list/>
    </div>
</template>
<script setup>
const is_cases = useState('is_cases');
is_cases.value = true;
</script>
<style>
    
</style>