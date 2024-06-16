<template>
    <section id="photo">
        <div class="container">
            <div class="tan-first-block" :style="{ 'background-color': color }">
                <img :src="props?.first" alt="">
            </div>
            <div class="tan-second-block">
                <div class="tan-second-block-photo" :style="{ 'background-color': color2 }">
                    <img :src="props?.second" alt="">
                </div>
                <div class="tan-second-block-photo" :style="{ 'background-color': color2 }">
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
    color2: String
});

</script>

<style>
.tan-first-block{
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.tan-first-block img{
    width: 70%;
    max-height: 1125px;
    height: 100%;
    object-fit: cover;
}

.tan-second-block{
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 40px;
}

.tan-second-block-photo{
    display: flex;
    justify-content: center;
}

.tan-second-block-photo img{
    width: 100%;
    max-width: 900px;
}

@media screen and (max-width: 1880px) {
    .tan-second-block-photo img{
        width: 100%;
        /* max-width: 600px; */
    }
}

@media screen and (max-width: 1200px) {
    .tan-first-block {
        margin-bottom: 10px;
    }
    
    .tan-second-block {
        margin-bottom: 80px;
        gap: 10px;
    }
    .tan-second-block-photo img{
        max-width: 165px;
    }
}

</style>