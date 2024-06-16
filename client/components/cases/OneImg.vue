<template>
    <section id="photo">
        <div class="container">
            <div v-if="data?.back_img"  class="first-block" :style="{ 'background-image': data?.back_img }">
                <img :src="data?.img" alt="">
            </div>
            <div v-else class="first-block" :style="{ 'background-color': data?.back_color }">
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

.first-block{
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.first-block img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

@media screen and (max-width: 1200px) {
    .first-block {
        margin-bottom: 10px;
        margin-top: 10px;
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