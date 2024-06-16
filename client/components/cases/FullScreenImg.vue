<template>
    <section id="photo">
        <div class="container">
            <div class="com-first-block">
                <img :src="data?.img" alt="">
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    data: null
});

</script>

<style>

.com-first-block{
    margin-bottom: 150px;
}

.com-first-block img{
    width: 100%;
    max-height: 1125px;
    height: 100%;
    object-fit: cover;
}

@media screen and (max-width: 1200px) {
    .com-first-block {
        margin-bottom: 80px;
    }
}
</style>