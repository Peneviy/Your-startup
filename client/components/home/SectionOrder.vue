<template>
    <section id="order">
        <div class="container order-container">
            <div class="img-container desktop">
                <img src="@/assets/img/team56.jpg" alt="">
            </div>
            <div class="order-content">
                <div class="order-text-content">
                    <h2>Оставить заявку</h2>
                    <div class="img-container mobile">
                        <img src="@/assets/img/team56.jpg" alt="">
                    </div>
                    <p>Оставьте заявку и наши специалисты свяжутся с вами в ближайшее время, чтобы обсудить все детали и ответить на ваши вопросы.</p>
                </div>
                <div class="button-order">
                    <img src="@/assets/img/ring.png" alt="">
                    <UIButton @click="active = true">Оставить заявку</UIButton>
                </div>
            </div>
        </div>
        <n-drawer id="order-popup" v-model:show="active" placement="right">
            <n-drawer-content closable>
            <n-carousel 
                :loop="false"
                :show-dots="false"
                :current-index=index
                :draggable="false"
                :mousewheel="false"
                :touchable = "false"
            >
                <BaseForm @submit_form="nextSlide"/>
                <BaseSuccessPopup @close_popup="close"/>
            </n-carousel>
            </n-drawer-content>
        </n-drawer>
    </section>
</template>
<script setup>
import { NDrawer, NDrawerContent, NInput, NSelect, NCarousel } from 'naive-ui';
    const active = ref(false); 
    const emit = defineEmits(['submit_form']);
    const index = ref(0);

    function nextSlide(){
        index.value = 1;
    }

    function close() {
        index.value = 0
        active.value = false
    }

</script>
<style>
    #order {
        background: var(--black);
        padding: 40px 0px;
    }

    .order-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    #order .img-container {
        padding-right: 40px;
        border-right: 1px solid var(--dark-gray);
    }
    
    #order .img-container img {
        /* clip-path: ellipse(50% 50%); */
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #order .img-container {
        padding-right: 40px;
    }

    .order-content {
        padding-left: 40px;
        display: grid;
        grid-template-rows: repeat(2, 1fr);
    }

    .order-container h2 {
        margin-left: 40px;
        color: var(--white);
        z-index: 10;
        position: relative;
        font-size: 100px;
        font-weight: 500;
        line-height: 110px;
        letter-spacing: 0em;
        text-align: left;
        text-transform: uppercase;
        margin-bottom: 60px;
    }

    .order-container h2::before {
        content: '';
        position: absolute;
        height: 43px;
        width: 320px;
        top: 0;
        left: -40px;
        background-color: var(--light-accent);
        z-index: -1;
    }

    .order-text-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-bottom: 40px;
        border-bottom: 1px solid var(--dark-gray);
    }

    .order-text-content p {
        max-width: 750px;
        color: var(--white);
        font-size: 25px;
        font-weight: 200;
        line-height: 35px;
    }

    .button-order {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 40px;
        padding-top: 40px;
    }

    .button-order img {
        position: absolute;
        left: 40px;
        top: calc(50% + 20px);
        transform: translateY(-50%);
        width: 398px;
        height: 397px;
    }

    .img-container.mobile {
        display: none;
    }

    .approval {
        font-size: 16px;
        line-height: 23px;
        font-weight: 200;
    }

    .approval a {
        font-weight: 500;
    }

    #order-popup {
        width: 100%!important;
        max-width: 700px;
    }

    #order-popup form .custom-btn {
        width: 100%;
        margin-top: 40px
    }

    form .n-drawer .n-drawer-content .n-drawer-header {
        border: none!important;
    }

    #section-order {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin: auto
    }

    .logo-form {
        margin: 0px auto;
        margin-bottom: 40px;
    }

    form .n-base-selection .n-base-selection-label {
        height: 55px;
    }

    form .n-base-selection .n-base-selection-overlay {
        padding: 0px 16px
    }



    @media screen and (max-width: 1700px) {
        .button-order img {
            width: 200px;
            height: auto;
        }
    }
    @media screen and (max-width: 1600px) {
        .order-container h2 {
            font-size: 60px;
            line-height: 75px;
        }
        .order-text-content p{
            font-size: 20px;
        }
        .button-order{
            padding-right: 150px;
        }
    }

    @media screen and (max-width: 1450px) {
        .button-order img {
            width: 150px;
            left: -15px;
        }
    }

    @media screen and (max-width: 1200px) {
        .order-container {
            grid-template-columns: 1fr;
        }

        .order-content {
            grid-template-rows: auto;
        }

        .img-container.desktop {
            display: none;
        }

        .order-content {
            padding-left: 0px;
        }

        #order h2 {
            margin-left: 0px;
        }

        .img-container {
            padding-right: 0px;
            border: none;
            margin-bottom: 20px
        }

        .button-order {
            padding-right: 0px;
        }

        .order-container h2 {
            font-size: 26px;
            font-weight: 500;
            line-height: 35px;
        }

        .order-container h2::before {
            width: 95px;
            height: 15px;
            left: -20px;
        }

        .button-order img {
            display: none;
        }

        .order-text-content {
            border-bottom: none;
        }

        .order-text-content p {
            padding-top: 20px;
            border-top: 1px solid var(--dark-gray);
        }

        .button-order {
            padding-top: 0px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--dark-gray);
        }

        .order-text-content p {
            font-size: 14px;
            font-weight: 200;
            line-height: 20px;
        }

        .button-order button {
            width: 100%;
            font-size: 16px;
            font-weight: 500;
            line-height: 20px;
        }

        .img-container.mobile {
            display: block;
        }

        #order .img-container {
            padding-right: 0px;
            border-right: none;
        }
    }
</style>