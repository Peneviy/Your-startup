<template>
    <section id="project">
        <div class="container">
            <div class="first"  :style="{ 'background-color': data?.fon_color }">
                <div class="first-photo">
                    <img :src="data?.img_first" alt="">
                </div>
                <div class="first-photo">
                    <img :src="data?.img_second" alt="" >
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

<style >

.first{
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 150px;
}

.first-photo img{
    width: 100%;
    max-width: 800px;
}

.first-photo:last-child{
    padding-top: 206px;
}

@media screen and (max-width: 1770px) {
    .first-photo img{
        max-width: 750px;
    }
}

@media screen and (max-width: 1650px) {
    .first-photo img{
        max-width: 600px;
    }
}

@media screen and (max-width: 1350px) {
    .first-photo img{
        max-width: 500px;
    }
}

@media screen and (max-width: 1200px) {
    .first{
        gap: 10px;
        margin-bottom: 80px;
    }
    .first-photo img{
        max-width: 100px;
    }
    .first-photo:last-child{
        padding-top: 30px;
    }
}

</style>


