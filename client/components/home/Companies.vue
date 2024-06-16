<template>
    <section id="companies">
        <div class="container">
            <h2>Компании</h2>
            <div class="companies-sub-title">
                <h4>
                    Для которых мы<br class="desktop">
                    стали опорой
                </h4>
            </div>
                <div class="companies-slide desktop" >
                    <div class="company-wrapper" v-for="item, index in page.reviews" :class="active_reviews == index ? 'reviews-open' : ''">
                        <div class="company" :class="active_reviews == index ? 'reviews-open' : ''" >
                            <div class="company-reviews" >
                                <p>
                                    {{item?.text}}  
                                </p>
                            </div>
                            <div class="company-content">
                                <img :src=item.img> 
                                <p>{{item.title}}</p>
                            </div>
                            <a :href="item.file" target="_blank"><base-arrow-link class="company-content-arow"  :class="active_reviews == index ? 'href' : ''">Смотреть все</base-arrow-link></a>
                            <div class="company-content-link" @click="setActiveReviews(index)">
                                <svg :class="active_reviews == index ? 'open' : ''" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#373737" viewBox="0 0 256 256" >
                                    <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            <n-carousel  ref="slider" class="companies-slider mobile" :loop="false" :show-dots="false">
                <div class="companies-slide" v-for="slide, index in page.reviews">
                    <div class="company-wrapper" >
                        <div class="company" :class="active_reviews == index ? 'reviews-open' : ''" >
                            <div class="company-reviews">
                                <p>
                                    {{slide?.text}}  
                                </p>
                            </div>
                            <div class="company-content">
                                <img :src=slide.img>
                                <p>{{slide.title}}</p>
                            </div>
                        </div>
                        <base-arrow-link to='/' class="company-content-arow"  :class="active_reviews == index ? 'href' : ''">Смотреть все</base-arrow-link>
                        <div class="company-content-link" @click="setActiveReviews(index)">
                            <svg :class="active_reviews == index ? 'open' : ''" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#373737" viewBox="0 0 256 256" >
                                <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </n-carousel>
            <div class="companies-nav mobile">
                <div class="companies-nav-prev companies-nav-btn" :class="slider?.getCurrentIndex() == 0 ? 'disable' : ''" @click="slider.prev()">
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.03033 1.53033C6.32322 1.23744 6.32322 0.762563 6.03033 0.46967C5.73744 0.176777 5.26256 0.176777 4.96967 0.46967L0.96967 4.46967C0.823223 4.61612 0.75 4.80806 0.75 5C0.75 5.10169 0.770239 5.19866 0.806909 5.28709C0.843509 5.37555 0.897763 5.45842 0.96967 5.53033L4.96967 9.53033C5.26256 9.82322 5.73744 9.82322 6.03033 9.53033C6.32322 9.23744 6.32322 8.76256 6.03033 8.46967L3.31066 5.75H13C13.4142 5.75 13.75 5.41421 13.75 5C13.75 4.58579 13.4142 4.25 13 4.25H3.31066L6.03033 1.53033Z"/>
                    </svg>
                </div>
                <div class="companies-nav-next companies-nav-btn" :class="(slider?.getCurrentIndex() + 1) == page.reviews.length ? 'disable' : ''" @click="slider.next()">
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.46967 1.53033C8.17678 1.23744 8.17678 0.762563 8.46967 0.46967C8.76256 0.176777 9.23744 0.176777 9.53033 0.46967L13.5303 4.46967C13.8232 4.76256 13.8232 5.23744 13.5303 5.53033L9.53033 9.53033C9.23744 9.82322 8.76256 9.82322 8.46967 9.53033C8.17678 9.23744 8.17678 8.76256 8.46967 8.46967L11.1893 5.75H1.5C1.08579 5.75 0.75 5.41421 0.75 5C0.75 4.58579 1.08579 4.25 1.5 4.25H11.1893L8.46967 1.53033Z"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
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
</script>

<style>
.company-content-arow{
    opacity: 0;
    position: absolute;
    left: 40px;
    bottom: 40px;
    z-index:10;
}
.href.company-content-arow{
    opacity: 1;
}

.companies-sub-title {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    margin-bottom: 40px;
}

.company img {
    width: 100%;
    height: auto;
    object-fit: none;
    height: 277px;
}

.companies-nav {
    display: flex;
    padding: 10px;
    gap: 10px;
}

.companies-nav-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: 1px solid var(--black);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.5s;
}

.company-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.company-content p {
    width: 100%;
    text-align: left;
}
.company-reviews a {
    margin-top: 25px;
}
.company-content-link {
    position: absolute;
    right: 40px;
    bottom: 40px;
    width: 40px;
    height: 40px;
    border-radius: 50%; 
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.5s;
    background-color: var(--light-gray);
    z-index: 10;
}

.companies-nav-btn:hover {
    border: 1px solid var(--accent);
}

.companies-nav-btn svg path {
    fill: var(--black);
    transition: 0.5s;
}

.companies-nav-btn:hover svg path {
    fill: var(--accent);
}

.companies-nav-btn.disable {
    border: 1px solid var(--dark-gray);
    cursor: not-allowed;
}

.companies-nav-btn.disable svg path {
    fill: var(--dark-gray);
}

.companies-slider {
    margin-top: 40px;
}

.companies-slide {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: 460px 390px;
    width: 100%;
}

.n-carousel .n-carousel__slides .n-carousel__slide {
    padding-right: 0px;
}

.company-wrapper:nth-child(2),
.company-wrapper:nth-child(5) {
    padding-left: 40px;
    padding-right: 40px;
    border-left: 1px solid var(--dark-gray);
    border-right: 1px solid var(--dark-gray);
}

.company-wrapper:nth-child(1),
.company-wrapper:nth-child(4) {
    padding-right: 40px;
}

.company-wrapper:nth-child(3),
.company-wrapper:nth-child(6) {
    padding-left: 40px;
}

.company {
    background-color: var(--black);
    color: #FFF;
    padding: 40px;
    position: relative;
}   

.companies-slider.mobile {
    display: none;
}

.companies-nav.mobile {
    display: none;
}

.company-reviews {
    opacity: 0;
    transition: 0.8s;
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    padding: 40px;   
    z-index: 9;
    background-color: var(--black)
}

.company-reviews p {
    font-size: 20px;
    line-height: 24px
}

.reviews-open .company-reviews {
    opacity: 1;
}

.company-content-link svg {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    transition: 0.4s
}

.company-content-link svg.open {
    opacity: 1;
    transform: translate(-50%, -50%) rotate(135deg);
}

@media screen and (max-width: 1800px) {
    .company-wrapper:nth-child(1), 
    .company-wrapper:nth-child(4) {
        padding-right: 20px;
    }

    .company-wrapper:nth-child(2), 
    .company-wrapper:nth-child(5) {
        padding: 0px 20px
    }

    .company-wrapper:nth-child(3), 
    .company-wrapper:nth-child(6) {
        padding-left: 20px;
    }

    .companies-slide {
        grid-template-rows: 390px 350px;
    }

    .company-reviews p {
        font-size: 16px;
        line-height: 20px;
    }

    .company,
    .company-reviews {
        padding: 20px;
    }

    .company-content-arow {
        left: 20px;
        bottom: 20px;
    }

    .company-content-link {
        right: 20px;
        bottom: 20px;
    }
}

@media screen and (max-width: 1200px) {
    .companies-slider.mobile {
        display: block;
    }
    .companies-slide {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }

    .companies-slide.desktop {
        display: none;
    }

    .company-reviews {
        padding: 20px;
    }

    .company-reviews p {
        font-size: 13px;
        line-height: 16px;
    }

    .company-content-link {
        right: 10px;
        bottom: 10px;
    }

    .company-content-arow {
        left: 10px;
        bottom: 10px;
    }

    .company {
        height: 270px
    }

    .companies-nav.desktop {
        display: none;
    }

    .companies-nav.mobile {
        display: flex;
    }

    .home-page #companies h3 {
        font-size: 18px;
        font-weight: 400;
        line-height: 25px;
    }
    .company {
        padding: 20px;
    }
    .company img {
        height: 170px;
        width: 100%;
        object-fit: contain;
    }
    .company-wrapper:nth-child(1),
    .company-wrapper:nth-child(4) {
        padding-right: 0px;
    }
    .company-content p {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }

    .company-content-arow {
        left: 20px;
    }

    .company a.arrow-link {
        font-size: 14px;
    }

    .company-content {
        height: 100%;
    }
}
</style>