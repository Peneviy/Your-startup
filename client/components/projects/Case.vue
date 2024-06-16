<template>
    <div class="case">
        <NuxtLink :to="props?.case?.link">
            <div class="case-title">
                <img :src="props?.case?.img" alt="" />
                <div class="case-name">
                    <h3>{{ props?.case?.title }}</h3>
                    <h5>{{ props?.case?.field }}</h5>
                </div>
            </div>
        </NuxtLink>
        <div class="case__info">
            <div class="case__info-number">
                {{ (index + 1).toString().padStart(2, 0) }}
            </div>
            <div class="case__info-content">
                <div class="case__info-content-text">
                    {{ props?.case?.text }}
                </div>
                <base-arrow-link :to="props?.case?.link">
                    О проекте
                </base-arrow-link>
            </div>
        </div>
    </div>
    <div class="case-mobile">
        <div class="case-main">
            <div class="case-number">{{(index + 1).toString().padStart(2, 0)}}</div>
        </div>
        <div class="case-mobile-slide">
            <NuxtLink :to="props?.case?.link"><div class="case-mobile-slide-img">
                <img :src="`/_nuxt/assets/img/${props?.case?.img}`" />
                <h3 class="case-mobile-slide-title">{{props?.case?.title}}</h3>
                <h5 class="case-mobile-slide-text">{{props?.case?.field }}</h5>
            </div>
            </NuxtLink>
            <p class="case-mobile-slide-desc">{{ props?.case?.text }}</p>
            <div class="btn">
                <base-arrow-link :to="props?.case?.link">
                    О проекте
                </base-arrow-link>
                <base-scroll-down target="#order"/>
            </div>
        </div>
    </div>
</template>
<script setup>
const props = defineProps({
    case: Object,
    index: Number,
});
import { NCarousel } from 'naive-ui';

const active_reviews = ref(-1);
const last_open = ref(null);

function setActiveReviews(index) {
    if (last_open.value != index) {
        active_reviews.value = index;
        last_open.value = index;
    } else {
        last_open.value = null;
        active_reviews.value = null;
    }
}

const { data : page } = useNuxtData('page/home')

const window_w = ref(window?.innerWidth);

const slider = ref(null);
const slides = [
    [1, 2, 3, 4, 5, 6],
    [1, 2, 3, 4, 5, 6],
    [1, 2, 3, 4]
];


</script>
<style>
.case {
    display: grid;
    grid-template-columns: 600px 1fr;
    gap: 30px;
    height: calc(100vh - 151px - 80px);
}
.case-title {
    position: relative;
    width: 100%;
    height: 100%;
}
.case-title img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.case-title:after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    display: block;
    width: 100%;
    height: 100%;
    background: rgba(42, 42, 42, 0.5);
}
.case-name {
    position: absolute;
    left: 40px;
    top: 40px;
    z-index: 1;
}
.case-name h3,
.case-name h5 {
    color: var(--white);
}
.case__info {
    display: grid;
    grid-template-rows: 1fr 1fr;
    padding: 0 30px;
    border: 1px solid var(--gray);
    border-top: none;
    border-bottom: none;
    height: calc(100vh - 151px - 80px);
}
.case__info-number {
    font-family: Unbounded;
    font-size: 110px;
    font-weight: 250;
    line-height: 130px;
    text-align: right;
    height: 100%;
    color: var(--accent);
    padding-bottom: 40px;
    display: inline-flex;
    align-items: flex-end;
    justify-content: flex-end;
}
.case__info-content {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.case__info-content-text {
    border-top: 1px solid var(--gray);
    padding-top: 30px;
    font-family: Geologica;
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
    text-align: left;
}
.cases-mobile{
    display: none;
}

.case-main{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    /* padding: 40px 0; */
    margin-bottom: 40px;
}
.case-number{
    font-family: Unbounded;
    font-size: 35px;
    font-weight: 250;
    line-height: 45px;
    color:var(--accent);
}
.case-nav {
    display: flex;
    padding: 10px;
    gap: 10px;
}
.btn{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.case-nav-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 1px solid #F3F0F0;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.5s;
    background-color: #F3F0F0;
}

.case-nav-btn svg path {
    fill: var(--black);
    transition: 0.5s;
}

.case-nav-btn:hover svg path {
    fill: var(--accent);
}

.case-slide {
    width: 100%;
}

.case-mobile-slide-img {
    position: relative;
}

.case-mobile-slide-img img {
    width: 100%;
    height: 440px;
    object-fit: cover;
    object-position: center center;
}

.case-mobile-slide-img::after {
    content: '';
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    max-height: 440px;
    width: 100%;
    background: rgba(42, 42, 42, 0.5);
}

.case-mobile-slide-title {
    position: absolute;
    top: 20px;
    left: 20px;
    color: #FFF;
    font-family: Unbounded;
    font-size: 20px;
    font-weight: 500;
    line-height: 30px;
    z-index: 1;
}

.case-mobile-slide-text {
    position: absolute;
    top: 55px;
    left: 20px;
    color: #FFF;
    font-family: Unbounded;
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    z-index: 1;
}

.case-mobile-slide-desc{
    font-size: 14px;
    font-weight: 200;
    line-height: 20px;
    letter-spacing: -0.01em;
}


@media screen and (max-width: 1800px) {
    .case__info-content-text {
        font-size: 20px;
        line-height: 30px;
    }
}

@media screen and (max-width: 1600px ) {
    .case__info-number {
        font-size: 80px;
        line-height: 80px;
    }

    .case__info-content-text {
        font-size: 20px;
    }

    .case-name {
        left: 30px;
        top: 30px;
    }

    .case-name h3 {
        font-size: 30px;
        line-height: 35px;
    }

    .case-name h5 {
        font-size: 20px;
    }
}

@media screen and (max-width: 1400px) {
    .case {
        grid-template-columns: 1fr 1fr;
    }

    .cases__wrapper {
        grid-template-columns: 1fr 160px;
    }

    .cases__carousel .cases__carousel-item {
        padding: 16px;
        max-width: 100%
    }
}

@media screen and (max-width: 1200px ) {
    .case {
        display: none;
    } 
    .cases-mobile{
        display: block;
    }
}
</style>
