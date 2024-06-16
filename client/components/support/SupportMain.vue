<template>
    <section id="support_main" class="support-header" >
        <div class="bg-main" :style="'background-image: url(' + background + ');'">
            <div class="container">
                <div class="main-content" >
                    <h1 class="main-content-title">{{ props?.title }}</h1>
                    <UIButton @click="active = true" class="main-content-btn">Оставить заявку</UIButton>
                </div>
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
                <BaseForm @submit_form="nextSlide" :is_services="true"/>
                <BaseSuccessPopup @close_popup="close"/>
            </n-carousel>
            </n-drawer-content>
        </n-drawer>
</template>

<script setup>
import { NDrawer, NDrawerContent, NInput, NSelect, NCarousel } from 'naive-ui';
const active = ref(false);
const props = defineProps({
    title: String,
    background: String,
});

const emit = defineEmits(['submit_form']);
const index = ref(0);

function nextSlide(){
    index.value = 1;
}

function close() {
    active.value = false;
    index.value = 0;
}

</script>

<style>
.support-header{
    height: 100vh;
    /* max-height: 900px; */
    position: relative;
    margin-top: 0;
    margin: 0 auto;
    margin-bottom: 150px;
}

.bg-main {
    position: relative;
    width: 100%;
    height: 100%;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
    background-color:rgba(0, 0, 0, 0.6);
    background-repeat:no-repeat;
    background-size: cover;
    background-position:  center center;
}

.bg-main::before {
    content: '';
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    background: #000;
    opacity: 0.6;
}

@media screen and (min-width: 2000px){
    .support-header{
        max-width: 2000px;
        width: 100%;
        min-height: 0;
    }

    .support-header::after{
        position: absolute;
        left: 0px;
        width: 20px;
        height: 100%;
        top: 0;
        background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        content: '';
        z-index: 100;
    }

    .support-header::before{
        position: absolute;
        right: 0px;
        width: 20px;
        top: 0;
        height: 100%;
        background: linear-gradient(to left, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        content: '';
        z-index: 100;
    }
}

.container{
    height: 100%;
}

.main-content{
    height: 100%;
    padding-bottom: 40px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.main-content-title{
    position: relative;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(187, 187, 187, 1);
    margin-bottom:0px;
    color: #ffffff;
    text-transform: uppercase;
    z-index: 1;
}

.main-content-title::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}

#support_main .main-content-btn{
    max-width:439px;
    max-height:120px;
    padding: 40px 60px 40px 60px;
    margin-top: 60px;
    z-index: 1;
}

@media screen and (max-width: 1600px) {
    .main-content-btn{
        padding: 30px 40px 30px 40px;
        margin-top: 60px;
        font-size: 20px;
        font-weight: 500;
        line-height: 20px;
    }
}

@media screen and (max-width: 1200px) {
    .support-header {
        margin-bottom: 80px;
    }
    .main-content-title {
        font-size: 26px;
        font-weight: 500;
        line-height: 35px;
    }

    .main-content-title::before {
        width: 95px;
        height: 15px;
        left: -20px;
    }
    .main-content-btn{
        max-width:340px;
        max-height:60px;
        padding: 20px 40px 20px 40px;
        margin-top: 60px;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }
}

</style>