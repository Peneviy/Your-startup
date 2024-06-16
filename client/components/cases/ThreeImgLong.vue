<template>
    <section id="photo">
        <div class="container">
            <div class="p-first"  :style="{ 'background-color': data?.back_first_color }">
                <div class="p-first-photo">
                    <img :src="data?.first" alt="">
                </div>
            </div>    
            <div class="p-second-block">
                <div class="p-second-block-photo" :style="{ 'background-color': data?.back_second_color }">
                    <img :src="data?.second" alt="">
                </div>
                <div class="p-second-block-photo" :style="{ 'background-color': data?.back_third_color }">
                    <img :src="data?.third" alt="">
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
.p-first{
    background-color: rgba(243, 240, 240, 1);
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.p-first-photo img{
    width: 100%;
    padding: 100px 0;
    max-width: 1000px;
}

.p-first-photo:last-child{
    padding-top: 0px;
}

.p-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 150px;
}

.p-second-block-photo{
    display: flex;
    justify-content: center;
}

.p-second-block-photo img{
    width: 100%;
    max-width: 100%;
}

@media screen and (max-width: 1200px) {
    .p-first{
        margin-bottom: 10px;
    }
    .p-first-photo img{
        padding: 20px 0;
        max-width: 200px;
    }
    .p-second-block{
        gap: 10px;
        margin-bottom: 80px;
    }
}
</style>