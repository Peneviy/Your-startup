<template>
    <section id="photo">
        <div class="container">
            <div class="first-block" :style="{ 'background-color': data?.fon_color_first }">
                <img :src="data?.img_first" alt="">
            </div>
            <div class="second-block">
                <div class="second-block-photo" :style="{ 'background-color': data?.fon_color_second }">
                    <img :src="data?.img_second" alt="">
                </div>
                <div class="second-block-photo" :style="{ 'background-color': data?.fon_color_third }">
                    <img :src="data?.img_third" alt="">
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    data: null,
});

</script>

<style>

.first-block{
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.first-block img{
    width: 100%;
    /* max-height: 1125px; */
    height: 100%;
    object-fit: cover;
}

.first-block,
.second-block-photo {
    padding: 40px;
}

.second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 150px;
}

.second-block-photo {
    display: flex;
    justify-content: center;
}

.second-block-photo img{
    max-width: 100%;
    max-height: 675px;
}

@media screen and (max-width: 1200px) {
    .first-block {
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .first-block,
    .second-block-photo {
        padding: 15px;
    }
    
    .second-block {
        margin-bottom: 80px;
        gap: 10px;
    }
    .first-block img {
        width: 100%;
    }
}

</style>