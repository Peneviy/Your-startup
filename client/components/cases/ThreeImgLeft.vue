<template>
    <section id="rew">
        <div class="container">
            <div class="rew-block">
                <div class="rew-block-photo" :style="{ 'background-color': data?.back_color_three_img_left }">
                    <img :src="data?.small_img_first" alt="">
                </div>
                <div class="rew-block-photo" :style="{ 'background-color': data?.back_color_three_img_left }">
                    <img :src="data?.small_img_second" alt="">
                </div>
            </div>
            <div class="rew-first-block" :style="{ 'background-color': data?.back_color_three_img_left }">
                <img :src="data?.big_img_left" alt="">
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
.rew-block img{
    width: 100%;
    max-height: 1125px;
    height: 100%;
    object-fit: cover;
}

.rew-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    margin-bottom: 0px;
    gap: 40px;
}

.rew-block-photo{
    display: flex;
    justify-content: center;
}

.rew-block-photo img{
    width: 100%;
    max-height: 675px;
}

.rew-first-block {
    display: flex;
    justify-content: center;
}

.rew-first-block img{
    width: 100%;
    /* max-height: 900px; */
    height: 100%;
    object-fit: cover;
}

#rew .container {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center;
    gap: 40px;
    margin-bottom: 150px;
}

#rew .rew-block {
    display: flex;
    flex-direction: column;
}

@media screen and (max-width: 1200px) {
    .rew-block{
        gap:10px;
    }
    .rew-first-block {
        margin-top: 10px;
    }

    #rew .rew-block {
        flex-direction: row;
    }

    #rew .container {
        flex-direction: column;
        gap: 0px;
        margin-bottom: 80px;
    }
}
</style>