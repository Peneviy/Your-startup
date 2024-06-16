<template>
    <section id="photo">
        <div class="container">
            <div class="pr-first-block" :style="{ 'background-color': color }">
                <img :src="props?.first" alt="">
            </div>
            <div class="pr-second-block">
                <div class="pr-second-block-photo" :style="{ 'background-color': color }">
                    <img :src="props?.second" alt="">
                </div>
                <div class="pr-second-block-photo" :style="{ 'background-color': color }">
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
});

</script>

<style>

.pr-first-block{
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.pr-first-block img{
    width: 100%;
    max-height: 1125px;
    height: 100%;
    object-fit: cover;
}

.pr-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
}

.pr-second-block-photo{
    display: flex;
    justify-content: center;
}

.pr-second-block-photo img{
    width: 100%;
    max-width: 342px;
    padding: 40px 0;
}

@media screen and (max-width: 1200px) {
    .pr-first-block {
        margin-bottom: 10px;
    }
    
    .pr-second-block {
        margin-bottom: 80px;
        gap: 10px;
    }

    .pr-second-block-photo img{
        max-width: 75px;
        padding: 20px 0;
    }
}

</style>