<template>
    <section id="photo">
        <div class="container">
            <div class="tantra-first"  :style="{ 'background-color': data?.color }">
                <div class="tantra-first-photo">
                    <img :src="data?.img" alt="">
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

.tantra-first{
    display: flex;
    gap: 40px;
    justify-content: center;
    /* margin-bottom: 200px */
}

.tantra-first-photo img{
    width: 100%;
    max-width: 800px;
    padding: 50px 0;
}
@media screen and (max-width: 1200px) {
    .tantra-first{
        gap: 10px;
    }
    .tantra-first-photo img{
        max-width: 100px;
        padding: 0 0;
        padding-top: 20px;
    }
}

</style>


