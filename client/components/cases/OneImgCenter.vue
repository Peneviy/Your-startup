<template>
    <section id="photo">
        <div class="container">
            <div class="wd-first"  :style="{ 'background-color': data?.back_color_img_center }">
                <div class="wd-first-photo">
                    <img :src="data?.one_img_center" alt="">
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
.project{
    display: flex;
    gap: 40px;
    justify-content: center;
    margin-bottom: 40px;
}

.project-photo img{
    width: 100%;
    max-width: 400px;
    padding: 40px 0;
}

.project-photo:last-child{
    padding-top: 206px;
}

.wd-first{
    background-color: rgba(243, 240, 240, 1);
    display: flex;
    justify-content: center;
    margin-bottom: 150px;
    padding: 50px 0px;

}

.wd-first-photo img{
    width: 100%;
    max-width: 800px;
    padding: 20px 0;
}

.wd-first-photo-img img{
    width: 100%;
    max-width: 400px;
}
@media screen and (max-width: 1200px) {
    .project{
        margin-bottom: 10px;
    }
    .project-photo img{
        max-width: 75px;
        padding: 20px 0;
    }
    .project-photo:last-child{
        padding-top: 78px;
    }
    .project{
        gap: 5px;
    }
    .wd-first{
        margin-bottom: 80px;
    }
    .wd-first-photo img{
        max-width: 200px;
    }
}
</style>