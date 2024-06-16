<template>
    <section id="photo">
        <div class="container">
            <div v-if="data?.back_img" class="med-project" :class="data?.padding_img ? 'first-padding' : 'second-padding'"  :style="'background-image: url(' + data?.back_img + ')'">
                <div class="med-project-photo">
                    <img :src="data?.first_img" alt="">
                </div>
                <div class="med-project-photo">
                    <img :src="data?.second_img" alt="" >
                </div>
            </div>
            <div v-else class="med-project" :class="data?.padding_img ? 'first-padding' : 'second-padding'"  :style="{ 'background-color': data?.back_color }">
                <div class="med-project-photo">
                    <img :src="data?.first_img" alt="">
                </div>
                <div class="med-project-photo">
                    <img :src="data?.second_img" alt="" >
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
.med-project {
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 40px;
    width: 100%;
    height: 100%;
    background-repeat:no-repeat;
    background-size: cover;
    background-position: center center;
}

.med-project-photo img{
    width: 100%;
    max-width: 400px;
    padding: 40px 0;
}

.first-padding .med-project-photo:first-child{
    padding-top: 149px;
}

.second-padding .med-project-photo:last-child{
    padding-top: 149px;
}

.med-first{
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-bottom: 150px;
}

.med-first-photo img{
    width: 100%;
    max-width: 800px;
}

.med-first-photo:last-child{
    padding-top: 191px;
}
@media screen and (max-width: 1700px) {
    .med-first-photo img{
        max-width: 300px;
    }
}

@media screen and (max-width: 1200px) {
    .med-project{
        margin-bottom: 10px;
    }
    .med-project-photo img{
        max-width: 75px;
        padding: 20px 0;
    }
    .first-padding .med-project-photo:first-child{
        padding-top: 27px;
    }

    .second-padding .med-project-photo:last-child{
        padding-top: 27px;
    }
    .med-project{
        gap: 5px;
    }
    .med-first-photo img{
        max-width: 100px;
    }
    .med-first{
        gap: 10px;
        margin-bottom: 80px;
    }
}
</style>