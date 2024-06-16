<template>
    <section id="photo">
        <div class="container">
            <div class="cl-first-block" :style="{ 'background-color': color }">
                <img :src="props?.first" alt="">
            </div>
            <div class="cl-second-block">
                <div class="cl-second-block-photo" :style="{ 'background-color': color2 }">
                    <img :src="props?.second" alt="">
                </div>
                <div class="cl-second-block-photo" :style="{ 'background-color': color2 }">
                    <img :src="props?.third" alt="">
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    first: String,
    second: String,
    third: String,
    color: String,
    color2: String,
});

</script>

<style>

.cl-first-block{
    margin-bottom: 40px;
}

.cl-first-block img{
    width: 100%;
    max-height: 1125px;
    height: 100%;
    object-fit: cover;
}

.cl-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 150px;
}

.cl-second-block-photo{
    display: flex;
    justify-content: center;
}

.cl-second-block-photo img{
    width: 100%;
    max-height: 675px;
}

@media screen and (max-width: 1200px) {
    .cl-first-block {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .cl-second-block {
        margin-bottom: 80px;
        gap: 10px;
    }
}

</style>