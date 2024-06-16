<template>
    <section id="photo">
        <div class="container">
            <div class="t-second-block">
                <div class="t-second-block-photo" :style="{ 'background-color': data?.back_color }">
                    <img :src="data?.first_small_img" alt="">
                </div>
                <div class="t-second-block-photo" :style="{ 'background-color': data?.back_color }">
                    <img :src="data?.second_small_img" alt="">
                </div>
            </div>
            <div class="t-first"  :style="{ 'background-color': data?.back_color }">
                <div class="t-first-photo">
                    <img :src="data?.trhird_big_img" alt="">
                </div>
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
.t-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 40px;
}

.t-second-block-photo{
    display: flex;
    justify-content: center;
}

.t-second-block-photo img{
    width: 100%;
    max-width: 392px;
    padding: 40px 0;
}

.t-first{
    background-color: rgba(243, 240, 240, 1);
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 150px;
}

.t-first-photo img{
    width: 100%;
    max-width: 800px;
    margin: 100px 0;
}

@media screen and (max-width: 1840px) {
    .t-first-photo img{
        max-width: 600px;
    }
}

@media screen and (max-width: 1200px) {
    .t-second-block{
        gap: 10px;
        margin-bottom: 10px;
    }
    .t-first{
        gap: 10px;
        margin-bottom: 80px;
    }
    .t-first-photo img{
        max-width: 200px;
        margin: 20px 0;
    } 
    .t-second-block-photo img{
        max-width: 53px;
        padding: 20px 0;
    }
}
</style>