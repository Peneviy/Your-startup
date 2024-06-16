<template>
    <section id="photo">
        <div class="container">
            <div class="mobile"  :style="{ 'background-color': data?.back_color_row }">
                <div class="mobile-photo">
                    <img :src="data?.first_img_row" alt="">
                </div>
                <div class="mobile-photo-img">
                    <img :src="data?.second_img_row" alt="">
                </div>
                <div class="mobile-photo">
                    <img :src="data?.third_img_row" alt="" >
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

#photo .mobile{
    display: flex;
    gap: 40px;
    justify-content: center;
    padding: 40px;
    margin-bottom: 150px;
}

.mobile-photo img{
    width: 100%;
    max-width: 400px;
}

.mobile-photo-img img{
    width: 100%;
    padding-top: 170px;
    max-width: 400px;
}

.mobile-photo:last-child{
    padding-top: 300px;
}

@media screen and (max-width: 1200px) {
    #photo .mobile{
        gap: 5px;
        margin-top: 10px;
        padding: 10px;
        margin-bottom: 80px;
    }
    .mobile-photo img{
        max-width: 75px;
        /* padding-top: 20px; */
    }
    .mobile-photo:last-child{
        padding-top: 70px;
    }
    .mobile-photo-img img{
        max-width: 75px;
        padding-top: 45px;
    }
}
</style>