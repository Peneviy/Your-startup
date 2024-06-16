<template>
    <section id="news">
        <div class="container">
            <div class="news-head">
                <h1 v-html="data?.title"></h1>
                <div class="news-head-btns desktop">
                    <div @click="prev" class="news-head-btn">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                            <path d="M13 20H27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13 20L19 26" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13 20L19 14" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div @click="next" class="news-head-btn">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                            <path d="M13 20H27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 26L27 20" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 14L27 20" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
                <div class="news-head-btns mobile">
                    <div @click="prev_m" class="news-head-btn">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                            <path d="M13 20H27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13 20L19 26" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M13 20L19 14" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div @click="next_m" class="news-head-btn">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                            <path d="M13 20H27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 26L27 20" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 14L27 20" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
            <n-carousel
                ref="carousel_desktop"
                draggable
                :slides-per-view="3"
                :loop="false"
                :show-arrow="false"
                @mousewheel="mousewheel"
                class="desktop"
            >
                <div class="news-slide" v-for="item, index in data?.news">
                    <div class="news-slide-top-content">
                        <div class="news-slide-top">
                            <svg @click="open(index)" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                                <path d="M20 13V27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 20H27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="news-title">{{ item.date }}</span>
                        </div>
                        <p class="news-slide-title" v-html="item.title"></p>
                    </div>
                    <img @click="open(index)" :src="item.imgs[0]">
                </div>
            </n-carousel>
            <n-carousel
                ref="carousel_mobile"
                :draggable="false"
                :slides-per-view="1"
                :loop="false"
                :show-arrow ="false"
                class="mobile"
            >
                <div class="news-slide" v-for="item, index in data?.news">
                    <div class="news-slide-top-content">
                        <div class="news-slide-top">
                            <svg @click="open(index)" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                                <path d="M20 13V27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M13 20H27" stroke="#373737" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span class="news-title">{{ item.date }}</span>
                        </div>
                        <p class="news-slide-title" v-html="item.title"></p>
                    </div>
                    <img @click="open(index)" :src="item.imgs[0]">
                </div>
            </n-carousel>
        </div> 
        <n-drawer id="news-drawer" v-model:show="open_news" placement="right">
            <n-drawer-content closable>
                    <div class="detail-news">
                        <h2 v-html="data?.news[active_news]?.title"></h2>
                        <span class="detail-news-date" v-html="data?.news[active_news]?.date"></span>
                        <div class="corusel" v-if ="data?.news[active_news].imgs.length > 1">
                            <n-carousel
                                :draggable="true"
                            >
                                <img v-for="item in data?.news[active_news].imgs" :src="item" alt="">
                            </n-carousel>
                        </div>
                        <img v-else :src="data?.news[active_news].imgs" alt="">
                        <div class="detail-news-desc" v-html="data?.news[active_news]?.desc"></div>
                    </div>
            </n-drawer-content>
        </n-drawer>
    </section>
</template>
<script setup>
import { NCarousel, NDrawerContent, NDrawer } from 'naive-ui';

const open_news = ref(false)
const active_news = ref(0)
const carousel_desktop = ref(null);
const carousel_mobile = ref(null);

let is_change = false;

const props = defineProps({
    data: null
})


function open(index) {
    open_news.value = true;
    active_news.value = index
}

function next_m() {
    carousel_mobile.value.next();
}

function prev_m() {
    carousel_mobile.value.prev();
}

function next() {
    is_change = true;

    const index = carousel_desktop.value.getCurrentIndex();
    if (index == props.data?.news.length - 1) {
        is_change = false;
        return;
    }

    const next_index = Math.min(index + 3, props.data?.news.length - 1);
    carousel_desktop.value.to(next_index);

    setTimeout(() => {
        is_change = false;
    }, 300);
}

function prev() {
    is_change = true;

    const index = carousel_desktop.value.getCurrentIndex();
    if (index == 0) {
        is_change = false;
        return;
    }

    const prev_index = Math.max(index - 3, 0);
    carousel_desktop.value.to(prev_index);

    setTimeout(() => {
        is_change = false;
    }, 300);
}

function mousewheel(event) {
    event.preventDefault();
    if (is_change) {
        return;
    }
    
    if (event.deltaY > 0) {
        next();
    } else {
        prev();
    }
}
</script>
<style>
  h1 {
    font-size: 110px;
    font-weight: 500;
    line-height: 130px;
    letter-spacing: 0em;
    text-align: left;
    text-transform: uppercase;
    position: relative;
    margin-bottom: 60px;
}

.news-page h1::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}

.news-slide {
    width: 100%;
    padding: 0px 40px;
    border-right: 1px solid var(--gray);
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.news-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    
    max-height: 350px;
    cursor: pointer;
    display: block;
    z-index: 10;
    pointer-events: all;
}

#news .n-carousel {
    height: 675px;
    margin: 0px -40px;
    width: calc(100% + 80px);
}

#news .n-carousel::after {
    content: '';
    height: 100%;
    width: 1px;
    top: 0px;
    right: 0px;
    position: absolute;
    background: var(--white);
    z-index: 1;
}

.news-slide-top {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.news-slide-top svg {
    cursor: pointer;
}

.news-slide-top-content {
    display: flex;
    flex-direction: column;
    gap: 100px;
}

.news-head {
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 60px;
}

.news-head h1 {
    margin-bottom: 0px;
}

.news-head-btns {
    display: flex;
    flex-direction: row;
    gap: 20px;
}

.news-head-btn {
    cursor: pointer;
}

#news .n-carousel__dots {
    display: none
}

#news-drawer {
    width: 700px!important;
}

.detail-news {
    height: 100%;
    overflow-y: auto;
}

.detail-news h2 {
    font-size: 30px;
    font-weight: 500;
    line-height: 40px;
    margin-bottom: 20px;
}

.detail-news-date {
    display: block;
    color: var(--gray);
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.detail-news .n-carousel {
    padding-top: 40px;
    padding-bottom: 80px;
    border-bottom: 1px solid var(--gray);
    border-top: 1px solid var(--gray);
    margin: 60px 0px;
    height: 480px;
}

.detail-news-desc {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.detail-news img {
    width: 100%;
    height: 100%;
    max-height: 350px;
    object-fit: cover;
    object-position: center;
}

.detail-news .n-carousel .n-carousel__dots {
    bottom: 40px;
}

.detail-news .n-carousel__dots.n-carousel__dots--dot .n-carousel__dot {
    width: 20px;
    height: 20px;
    background: var(--gray);
    border-radius: 20px;
    transition: 0.5s;
}

.detail-news .n-carousel__dots.n-carousel__dots--dot .n-carousel__dot.n-carousel__dot--active { 
    width: 40px;
    background: var(--accent);
}

.news-head-btns.mobile {
    display: none;
}

@media screen and (max-width: 1600px) {
    .news-page h1 {
        font-size: 60px;
        line-height: 75px;
    }
    .news-slide span{
        font-size: 24px;
    }
    .news-slide-title{
        font-size: 20px;
    }
    .detail-news h2 {
        font-size: 24px;
    }
    .detail-news-date {
        font-size: 22px;
    }
    .detail-news-desc {
        font-size: 20px;
        line-height: 30px;
    }
    .detail-news .n-carousel {
        margin: 40px 0;
    }
}

@media screen and (max-width: 1200px) {
    .news-head-btns.desktop {
        display: none;
    }
    .news-head-btns.mobile {
        display: flex;
    }
    .news-page h1 {
        font-size: 35px;
        font-weight: 500;
        line-height: 45px;
    }

    .news-page h1::before {
        width: 95px;
        height: 15px;
        left: -20px;
    }

    #news-drawer {
        width: 100%!important;
    }

    .detail-news h2 {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }

    .detail-news-date {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
    }

    .detail-news .n-carousel {
        padding-top: 20px;
        padding-bottom: 40px;
    }

    .detail-news .n-carousel .n-carousel__dots {
        bottom: 20px;
    }
    
    .detail-news .n-carousel__dots.n-carousel__dots--dot .n-carousel__dot {
        height: 10px;
        width: 10px;
        border-radius: 10px;
    }

    .detail-news .n-carousel__dots.n-carousel__dots--dot .n-carousel__dot.n-carousel__dot--active {
        width: 20px;
    }

    .detail-news .n-carousel {
        height: auto;
        margin: 40px 0px; 
    }

    .detail-news-desc {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
    }
}

@media screen and (max-height: 850px) {
    .news-slide-top-content {
        gap: 50px
    }
}

@media screen and (max-height: 670px) {
    .news-slide-top-content {
        gap: 25px
    }
}
</style>