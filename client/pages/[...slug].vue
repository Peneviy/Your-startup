<template>
    <section class="page" >
        <div class="container">
            <h1 v-html="page.title"></h1>
            <div class="page-content" v-html="page.content"></div>
        </div>
    </section>
</template>

<script setup>
const route = useRoute();

let path = '';

if (Array.isArray(route.params.slug)) {
    path = route.params.slug.join("/").replaceAll("//", "/");

    if (path[path.length - 1] == '/') {
        path = path.slice(0, -1);
    }
} else {
    path = route.params.slug;
}

const { data : page } = useNuxtData('page/' + path);
</script>

<style>
section.page {
    padding: 100px 0;
}

section.page .container {
    max-width: 1200px;
}

section.page h1 {
    font-size: 70px;
    line-height: 80px;
    margin-bottom: 100px;
}

section.page h2 {
    font-size: 50px;
    line-height: 60px;
    margin-top: 40px;
    margin-bottom: 20px;
}

section.page h3 {
    font-size: 60px;
    line-height: 70px;
}

section.page h4 {
    font-size: 40px;
    font-weight: 500;
    line-height: 50px;
}

section.page h5 {
    font-size: 30px;
    line-height: 40px;
}

section.page p {
    margin-bottom: 10px;
    font-size: 22px;
    font-weight: 200;
    line-height: 30px;
}
</style>