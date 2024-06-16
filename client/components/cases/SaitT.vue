<template>
    <section id="photo">
        <div class="container">
            <div class="tao-first-block" :style="{ 'background-color': color }">
                <img :src="props?.first" alt="">
            </div>
            <div class="tao-second-block">
                <div class="tao-second-block-photo" :style="{ 'background-color': color }">
                    <img :src="props?.second" alt="">
                </div>
                <div class="tao-second-block-photo" :style="{ 'background-color': color }">
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
    color: String
});

</script>

<style>
.tao-first-block{
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.tao-first-block img{
    width: 100%;
    max-height: 1125px;
    height: 100%;
    object-fit: cover;
}

.tao-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
}

.tao-second-block-photo{
    display: flex;
    justify-content: center;
}

.tao-second-block-photo img{
    width: 100%;
    max-width: 900px;
}

@media screen and (max-width: 1200px) {
    .tao-first-block {
        margin-bottom: 10px;
    }
    
    .tao-second-block {
        margin-bottom: 80px;
        gap: 10px;
    }
    .tao-second-block-photo img{
        max-width: 165px;
    }
}

</style>