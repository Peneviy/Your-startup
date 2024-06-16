<template>
    <section id="main">
        <div class="container">
            <div class="main-center">
                <h1 class="main-title" v-html="data?.title">

                </h1>
                <div class="main-animation">
                    <home-main-animation />
                    <img :src="data?.img" alt="">
                    <div class="main-animation-bg"></div>
                </div>
            </div>
            <div class="main-info">
                <div class="main-info-block">
                    <UIButton @click="active = true">{{ data?.btn_text }}</UIButton>
                </div>
                <base-scroll-down target="#about" />
                <div class="main-info-block main-info-text" v-html="data?.text"></div>
            </div>
        </div>
    </section>
    <n-drawer id="order-popup" v-model:show="active" placement="right">
        <n-drawer-content closable>
            <n-carousel 
                :draggable="false"
                :mousewheel="false"
                :touchable = "false"
                :loop="false"
                :show-dots="false"
                :current-index=index
            >
                <BaseForm @submit_form="nextSlide"/>
                <BaseSuccessPopup @close_popup="close"/>
            </n-carousel>
        </n-drawer-content>
    </n-drawer>
</template>
<script setup>
import { NDrawer, NDrawerContent, NInput, NSelect, NCarousel } from 'naive-ui';
const active = ref(false); 
const emit = defineEmits(['submit_form']);
const index = ref(0);

const props = defineProps({
    data: null
})

function nextSlide(){
    index.value = 1;
}

function close() {
    active.value = false;
    index.value = 0;
}
</script>
<style>
    #main {
        min-height: calc(100vh - 150px);
        position: relative;
        margin-top: 0;
    }

    .main-center {
        position: relative;
    }

    .main-title {
        font-size: 150px;
        line-height: 150px;
        height: calc(100vh - 150px - 20px - 198px);
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .main-animation {
        position: absolute;
        z-index: 1;
        top: 0;
        right: 5%;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }

    .main-animation-bg {
        display: none;
        position: absolute;
        aspect-ratio: 1 / 1;
        height: 65vh;
        border-radius: 50%;
        background-color: var(--light-gray);
        z-index: -1;
    }

    .main-animation img {
        display: none;
    }

    .main-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid var(--dark-gray);
        padding: 40px 0;
    }

    .main-info-block {
        width: 100%;
        max-width: 550px;
    }

    .main-info-text {
        line-height: 38px;
        letter-spacing: 0em;
        text-align: right;
        font-weight: 250;
    }

    @media screen and (min-width: 2000px) {
        #main {
            max-width: 2000px;
            margin-left: auto;
            margin-right: auto;
        }
    }
    
    @media screen and (max-width: 1600px) {
        .main-title {
            font-size: 110px;
            line-height: 110px; 
            height: calc(100vh - 121px - 20px - 198px);
        }

        .main-info {
            padding: 20px 0;
        }

        .main-info-text {
            font-size: 22px;
        }
    }


    @media screen and (max-width: 1200px) {
        .desktop {
            display: none;
        }

        .main-title {
            /* font-size: 35px; */
            font-size: 32px; /* пока так */
            line-height: 45px;
            height: auto;
            padding-top: 60px;
        }

        .main-title::before {
            content: '';
            position: absolute;
            width: 95px;
            height: 15px;
            left: -20px;
            top: 60px;
            background-color: var(--light-accent);
            z-index: -1;
        }

        .main-animation {
            position: relative;
            padding: 40px 0px;
            display: flex;
            flex-direction: row;
            justify-content: flex-end;
        }

        .main-animation img {
            width: 197px;
            display: block;
        }

        .main-animation-bg {
            height: 278px;
            display: block;
        }

        .main-info {
            display: grid;
            grid-template-columns: 46px 1fr;
            row-gap: 40px;
            column-gap: 20px;
        }

        .main-info .main-info-block:first-of-type {
            grid-column: 1 / span 2;
            order: 3
        }

        .main-info-text {
            font-size: 14px;
            font-weight: 200;
            line-height: 20px;
        }

        .main-info .custom-btn {
            width: 100%;
        }

        .main-info .scroll-down-btn {
            width: 46px;
            height: 46px;
        }
    }
</style>