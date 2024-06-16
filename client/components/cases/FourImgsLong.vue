<template>
    <section id="photo">
        <div class="container">
            <div class="atc-block">
                <div class="atc-block-photo" :style="{ 'background-color': data?.color }">
                    <img :src="data?.first" alt="">
                </div>
                <div class="atc-block-photo" :style="{ 'background-color': data?.color }">
                    <img :src="data?.second" alt="">
                </div>
            </div>
            <div class="atc-first"  :style="{ 'background-color': data?.color }">
                <div class="atc-first-photo">
                    <img :src="data?.third" alt="">
                </div>
            </div>
            <div class="atc-first-block" :style="{ 'background-color': data?.color }">
                <div class="atc-first-block-photo">
                    <img :src="data?.fourth" alt="">
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
.atc-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
    margin-bottom: 40px;
}

.atc-block-photo{
    display: flex;
    justify-content: center;
}

.atc-first{
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 40px;
    max-height: 1840px;
}

.atc-block-photo img{
    width: 100%;
    padding: 50px;
}

.atc-first-block{
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 40px;
}

.atc-first-photo img{
    width: 100%;
    max-width: 1000px;
    padding: 100px 0;
}

.atc-first-block-photo img{
    width: 100%;
    max-width: 1000px;
    padding: 100px 0;
}

@media screen and (max-width: 1200px) {
    .atc-block {
        gap: 10px;
        margin-bottom: 10px;
    }
    .atc-first-block {
        margin-bottom: 10px;
    }
    .atc-first-photo img{
        max-width: 200px;
        padding: 20px 0;
    }
    .atc-first-block-photo img{
        max-width: 200px;
        padding: 20px 0;
    }
    .atc-first{
    margin-bottom: 10px;
}

}

</style>