<template>
    <section id="photo">
        <div class="container">
            <div class="row-first"  :style="{ 'background-color': color }">
                <div class="row-first-photo">
                    <img :src="props?.first" alt="">
                </div>
                <div class="row-first-photo">
                    <img :src="props?.second" alt="" >
                </div>
                <div class="row-first-photo">
                    <img :src="props?.third" alt="" >
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

const props = defineProps({
    first: String,
    second: String,
    third:String,
    color: String
});

</script>

<style >
.row-first{
    background-color: rgba(243, 240, 240, 1);
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-top: 150px;
    margin-bottom: 150px;
}

.row-first-photo img{
    width: 100%;
    max-width: 481px;
    padding: 40px 0;
}

.row-first-photo:last-child {
    padding-top: 0px; 
}
@media screen and (max-width: 1600px) {
    .row-first-photo img{
        max-width: 250px;
        padding: 20px 0;
    }
}
@media screen and (max-width: 1200px) {
    .row-first{
        gap: 10px;
        margin-top: 80px;
        margin-bottom: 80px;
    }
    .row-first-photo img{
        max-width: 75px;
        padding: 20px 0;
    }
}
</style>