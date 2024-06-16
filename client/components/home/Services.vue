<template>
    <section id="services">
        <div class="container">
            <h2 v-html="data?.section_title"></h2>
            <div class="services-info desktop">
                <div class="services-list">
                    <div class="services-item" v-for="(service, index) in data?.services"
                        :class="active_tab == index  ? 'active' : ''" 
                        @click="active_tab = index"
                        :key="index"
                    >
                        <div :class="(index + 1) % 2 != 0 ? 'border' : ''" v-html="service.title"></div>
                    </div>
                </div>
                <n-carousel class="services-text" 
                    v-model:current-index="active_tab"
                    draggable 
                    :show-dots="false"
                >
                    <div class="services-slide" v-for="(service, index) in data?.services"
                        :style="'background-image: url(' + service.img + ');'"
                        :key="index"
                    >
                        <p v-html="service.text"></p>
                    </div>
                </n-carousel>
            </div>
            <div class="services-info mobile">
                <UIDropItem :name="service.title" v-for="(service, index) in data?.services" :key="index">
                    <p v-html="service.text"></p>
                </UIDropItem>
            </div>
        </div>
    </section>
</template>
<script setup>
import {
    NCarousel,
} from 'naive-ui'

const props = defineProps({
    data: null
})
const active_tab = ref(0);
</script>
<style>
.services-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}

.services-text {
    grid-column: 2 / span 3;
    width: 100%;
}

.services-slide {
    width: 100%;
    height: 100%;
    padding: 40px;
    background-position: right;
    background-size: cover;
    background-color: #373737;
    background-repeat: no-repeat;
    display: flex;
    align-items: flex-end;
}

.services-text p {
    width: 100%;
    max-width: 650px;
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
    color: var(--white);
    -moz-user-select: none;
    -khtml-user-select: none;
    user-select: none;  
}

.services-list {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding-right: 40px;
}

.services-item:nth-child(2),
.services-item:first-of-type {
    padding-top: 0px;
}

.services-item {
    padding: 40px 0px;
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    border-bottom: 1px solid var(--gray);
    transition: 0.8s;
    cursor: pointer;
}

.services-item.active {
    color: var(--accent);
}

.services-item .border {
    height: 95px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-right: 1px solid var(--gray);
    width: 100%;
}

.services-info.mobile {
    display: none
}


@media screen and (max-width: 1600px) {
    .services-slide {
        background-size: 100%;
    }

    .services-text p {
        width: 470px;
        font-size: 20px;
        line-height: 30px;
    }
}

@media screen and (max-width: 1200px) {
    .services-info.desktop {
        display: none;
    }

    .services-info.mobile {
        display: flex;
        flex-direction: column;
    }

    .info-item:last-of-type .info-head {
        border-bottom: 1px solid var(--dark-gray);
    }
}
</style>