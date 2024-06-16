<template>
    <section id="wrapper" :style="{ 'background-color': data?.back_color_wrapper_line }">
        <div class="wrapper-box">
            <div :class="stop ? 'stop_wrapper' : ''" ref="slider"class="wrapper-imgs" @touchstart="mousedown" @touchend="mouseup" @mouseup="mouseup" @mousedown="mousedown">
                <div class="wrapper-item" v-for="item in data?.wrapper_line_imgs">
                    <img :src="item" alt="">
                </div>
                <div class="wrapper-item" v-for="item in data?.wrapper_line_imgs" >
                    <img :src="item" alt="">
                </div>
            </div>
        </div>
        <div class="wrapper-box">
            <div :class="stop_revers ? 'stop_wrapper' : ''" ref="slider" class="wrapper-imgs reverse" @touchstart="mousedownReverse" @touchend="mouseupReverse" @mouseup="mouseupReverse" @mousedown="mousedownReverse">
                <div class="wrapper-item" v-for="item in data?.wrapper_line_imgs">
                    <img :src="item" alt="">
                </div>
                <div class="wrapper-item" v-for="item in data?.wrapper_line_imgs">
                    <img :src="item" alt="">
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
const props = defineProps({
    data: null
});

const stop = ref(false);
const stop_revers = ref(false);
const slider = ref(null)

function mousedown() {
    stop.value = true;
}

function mouseup() {
    stop.value = false;
}

function mousedownReverse() {
    stop_revers.value = true;
}

function mouseupReverse() {
    stop_revers.value = false;
}
</script>
<style>
    #wrapper {
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 40px;
        margin-bottom: 150px;
    }

    .wrapper-box {
        width: 100%;
        max-width: 2000px;
        overflow: hidden;
        margin: 0px auto;
        position: relative;
        background: transparent;
    }

    .wrapper-imgs {
        display: flex;
        flex-direction: row;
        white-space: nowrap;
        width: max-content;
        gap: 40px;
        animation: wrapper 40s linear infinite;
        animation-fill-mode: forwards;
    }

    .wrapper-imgs.stop_wrapper {
        animation-play-state: paused;
    }

    .wrapper-imgs.reverse {
        flex-direction: row-reverse;
        animation: wrapper_r 40s linear infinite;
    }

    .wrapper-imgs.reverse.stop_wrapper {
        animation-play-state: paused;
    }

    .wrapper-item {
        width: 800px;
        height: 450px;
    }

    .wrapper-item img {
        width: 800px;
        height: 450px;
        object-fit: cover;
    }

    @keyframes wrapper {
        from {
            transform: translateX(0%);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @keyframes wrapper_r {
        from {
            transform: translateX(-50%);
        }

        to {
            transform: translateX(0%);
        }
    }

    @media screen and (min-width: 2000px){
        .wrapper-box::after{
            position: absolute;
            left: 0px;
            top: 0;
            width: 120px;
            height: 100%;
            background: linear-gradient(to right, rgba(55, 55, 55, 1), rgba(55, 55, 55, 0));
            content: '';
            z-index: 100;
        }

        .wrapper-box::before{
            position: absolute;
            right: 0px;
            width: 120px;
            top: 0;
            height: 100%;
            background: linear-gradient(to left, rgba(55, 55, 55, 1), rgba(55, 55, 55, 0));
            content: '';
            z-index: 100;
        }
    }

    @media screen and (max-width: 1200px) {
        .wrapper-item,
        .wrapper-item img {
            width: 200px;
            height: 122px;
        }

        #wrapper {
            padding: 20px 0px;
            gap: 10px;
            margin-bottom: 80px;
        }

        .wrapper-imgs {
            gap: 10px;
        }
    }
</style>