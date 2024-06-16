<template>
    <section id="photo">
        <div class="container">
            <div class="oft-second-block">
                <div class="oft-second-block-photo" :style="{ 'background-color': data?.back_color }">
                    <img :src="data?.first_img" alt="">
                </div>
                <div class="oft-second-block-photo" :style="{ 'background-color': data?.back_color }">
                    <img :src="data?.second_img" alt="">
                </div>
            </div>
            <div class="oft-first"  :style="{ 'background-color': data?.back_color }">
                <div class="oft-first-photo">
                    <img :src="data?.thrid_img" alt="">
                </div>
                <div class="oft-first-photo">
                    <img :src="data?.fourth_img" alt="" >
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
.oft-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 40px;
}

.oft-second-block-photo{
    display: flex;
    justify-content: center;
}

.oft-second-block-photo img{
    max-width: 100%;
    max-height: 675px;
}

.oft-first{
    background-color: rgba(243, 240, 240, 1);
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 150px;
}

.oft-first-photo img{
    width: 100%;
    max-width: 800px;
}

.oft-first-photo:last-child{
    padding-top: 710px;
}
@media screen and (max-width: 1750px) {
    .oft-first-photo img{
        max-width:600px;
    }
}
@media screen and (max-width: 1400px) {
    .oft-first-photo img{
        max-width: 500px;
    }
}


@media screen and (max-width: 1200px) {
    .oft-second-block{
        gap: 10px;
        margin-bottom: 10px;
    }
    .oft-first{
        gap: 10px;
        margin-bottom: 80px;
    }
    .oft-first-photo img{
        max-width: 100px;
    }
    .oft-first-photo:last-child{
        padding-top: 87px;
    }  
}



</style>