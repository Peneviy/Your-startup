<template>
    <section id="about" ref="section">
        <div class="container">
            <h2 v-html="data?.title"></h2>
            <div class="about-info">
                <div class="border">
                    <h3>
                        <n-number-animation
                            :from="0"
                            :to="Number(data?.years.title)"
                            :active="animation_active"
                            :duration="duration"
                        />
                        {{ data?.years.after_title }}<br>
                        <span>
                            {{ data?.years.text }}
                        </span>
                    </h3>
                </div>
                <div class="border mobile">
                    <h3>
                        <n-number-animation
                            :from="0"
                            :to="Number(data?.projects.title)"
                            :active="animation_active"
                            :duration="duration"
                        />
                        {{ data?.projects.after_title }}<br>
                        <span>
                            {{ data?.projects.text }}
                        </span>
                    </h3>
                </div>
                <div class="border mobile-padding">
                    <h3>
                        ~
                        <n-number-animation
                            :from="0"
                            :to="Number(data?.price.title)"
                            :active="animation_active"
                            :duration="duration"
                        />
                        {{ data?.price.after_title }}<br>
                        <span>
                            {{ data?.price.text }}
                        </span>
                    </h3>
                </div>
                <div class="about-info-img">
                    <img :src="data?.img" />
                </div>
                <div class="desktop">
                    <h3>
                        <n-number-animation
                            :from="0"
                            :to="Number(data?.projects.title)"
                            :active="animation_active"
                            :duration="duration"
                        />
                        {{ data?.projects.after_title }}<br>
                        <span>
                            {{ data?.projects.text }}
                        </span>
                    </h3>
                </div>
                <div>
                    <div class="about-info-text">
                        <span v-html="data?.about_text"></span>
                        
                        <base-arrow-link :to="data?.link">
                            {{ data?.btn_text }}
                        </base-arrow-link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

import {
    NNumberAnimation
} from 'naive-ui'

const props = defineProps({
    data: null
})

const section          = ref(null);
const animation_active = ref(false);
const duration         = 3000;

onMounted(async () => {
    await nextTick();
    gsap.registerPlugin(ScrollTrigger);

    const scrollbar = document.querySelector('#scrollbar .n-scrollbar-container');

    ScrollTrigger.create({
        scroller: scrollbar,
        trigger: section.value,
        start: '260px bottom',
        onEnter: (self) => {
            animation_active.value = true;
        }
    });
});
</script>

<style>

.border.mobile {
    display: none;
}

.about-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 40px;
}

.about-info-img {
    grid-area: 1 / 2 / 3 / 3;
    height: 650px;
    border-left: 1px solid var(--dark-gray);
    border-right: 1px solid var(--dark-gray);
    padding: 0 40px;
}

.about-info-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.about-info-text {
    line-height: 38px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.about-info .border {
    border-bottom: 1px solid var(--dark-gray) ;
}

@media screen and (max-width: 1600px) {
    .about-info-text {
        font-size: 20px;
        line-height: 28px;
    }

    .about-info-img {
        height: 570px;
    }
}

@media screen and (max-width: 1200px) {
    .border.mobile {
        display: flex;
        justify-content:flex-start;
    }

    .about-info {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        gap: 20px;
    }

    .about-info-img {
        grid-area: auto;
    }

    .home-page h3 {
        font-size: 20px;
        font-weight: 500;
        line-height: 30px;
        gap: 10px;
        padding-bottom: 20px;
    }

    .border-three {
        order: 2;
    }

    .about-info-img {
        height: 227px;
        padding: 0px;
        border: none;
    }

    .about-info-img .img-container {
        padding-right: 0px;
        border: none;
    }

    .img-container img {
        clip-path: none;
    }

    .img-container {
        padding-right: 0px;
    }

    .about-info .mobile-padding {
        padding-bottom: 40px;
    }

    .about-info-img {
        padding-bottom: 20px;
        border-bottom: 1px solid var(--dark-gray);
    }

    .about-info-text {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
    }

    a.arrow-link {
        margin-top: 20px;
        font-size: 16px;
        font-weight: 600;
        line-height: 30px;
    }
}
</style>