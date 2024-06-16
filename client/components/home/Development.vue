<template>
    <section id="development" ref="section">
        <div class="container">
            <h2 v-html="data?.section_title"></h2>
            <div :class="touch_dev != 1 ? 'visible' : ''" class="development-info">
                <div class="development-info-text" ref="text">
                    <div class="development-info-text-content">
                        <div class="text-content-row" v-html="data?.title"></div>
                        <p v-html="data?.text"></p>
                    </div>
                </div>
                <div class="development-stages-wrapper" ref="area">
                    <div class="development-stages" ref="stages_container">
                        <div class="stage" ref="stages" v-for="i, index in data?.dev">
                            <span class="number">0{{ index+1 }}</span>
                            <h5>{{ i.title }}</h5>
                            <p>{{ i.text }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <n-carousel :class="touch_dev == 1 ? 'visible' : ''" ref="slider_dev" class="development-slider " :loop="false" :show-dots="false">
                <div class="stage" v-for="i, index in data?.dev">
                    <span class="number">0{{ index+1 }}</span>
                    <h5>{{ i.title }}</h5>
                    <p>{{ i.text }}</p>
                </div>
            </n-carousel>
            <div :class="touch_dev == 1 ? 'visible' : ''" class="development-nav-container">
                <div class="development-nav">
                    <div class="development-nav-prev development-nav-btn" :class="slider_dev?.getCurrentIndex() == 0 ? 'disable' : ''" @click="slider_dev.prev()">
                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.03033 1.53033C6.32322 1.23744 6.32322 0.762563 6.03033 0.46967C5.73744 0.176777 5.26256 0.176777 4.96967 0.46967L0.96967 4.46967C0.823223 4.61612 0.75 4.80806 0.75 5C0.75 5.10169 0.770239 5.19866 0.806909 5.28709C0.843509 5.37555 0.897763 5.45842 0.96967 5.53033L4.96967 9.53033C5.26256 9.82322 5.73744 9.82322 6.03033 9.53033C6.32322 9.23744 6.32322 8.76256 6.03033 8.46967L3.31066 5.75H13C13.4142 5.75 13.75 5.41421 13.75 5C13.75 4.58579 13.4142 4.25 13 4.25H3.31066L6.03033 1.53033Z"/>
                        </svg>
                    </div>
                    <div class="development-nav-next development-nav-btn" :class="slider_dev?.getCurrentIndex() == data?.dev.length - 1 ? 'disable' : ''" @click="slider_dev.next()">
                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.46967 1.53033C8.17678 1.23744 8.17678 0.762563 8.46967 0.46967C8.76256 0.176777 9.23744 0.176777 9.53033 0.46967L13.5303 4.46967C13.8232 4.76256 13.8232 5.23744 13.5303 5.53033L9.53033 9.53033C9.23744 9.82322 8.76256 9.82322 8.46967 9.53033C8.17678 9.23744 8.17678 8.76256 8.46967 8.46967L11.1893 5.75H1.5C1.08579 5.75 0.75 5.41421 0.75 5C0.75 4.58579 1.08579 4.25 1.5 4.25H11.1893L8.46967 1.53033Z"/>
                        </svg>
                    </div>
                </div>
                <div class="numbers-nav">
                    <span>
                        {{ slider_dev?.getCurrentIndex() + 1 }}
                    </span>
                    /{{ data?.dev.length }}
                </div>
            </div>
        </div>
    </section>
    <div class="skip desktop" :class="show_skip ? 'show' : ''">
        <base-scroll-down target="#team"/>
    </div>
</template>

<script setup>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { NCarousel } from 'naive-ui';


const section = ref(null);
const stages_container  = ref(null);
const stages = ref([]);
const text = ref(null);
const area = ref(null);

const route = useRoute();

const show_skip = ref(false);

const slider_dev = ref(null);

const touch_dev = ref(null);

let card_size = 620;
if (process.client && window.innerWidth < 1600) {
    card_size = 550;
}

const dev =ref([
    {title: 'Выявление потенциальных преимуществ', text: 'Проанализируем Ваши потребности, сравним с представителями ниши, на основе этого предложим оптимальное техническое решение, соответствующее требованиям проекта и бюджету.'},
    {title: 'Написание технического задания', text: 'Техническое задание содержит полное описание проекта, включая его цели, функциональные и нефункциональные требования, описание пользовательских сценариев. '},
    {title: 'Архитектура и дизайн', text: ' Вам будут предоставлены дизайн-макеты и прототипы веб-страниц, которые визуально демонстрируют структуру и внешний вид будущего проекта.'},
    {title: 'Программирование', text: 'Вы получите доступ к рабочему проекту, который был разработан на основе утвержденного дизайна и функциональных требований. Этот проект будет включать в себя функции и возможности описанные в техническом задании.'},
    {title: 'Запуск проекта', text: 'Вы получите готовый программный продукт, настройку сервера и доменных имен. Мы обеспечиваем дальнейшую техническую поддержку и мониторинг серверов и доменных имен после завершения настройки в течении одного месяца.'}
])

const props = defineProps({
    data: null
})



onMounted(async () => {
    await nextTick();
    gsap.registerPlugin(ScrollTrigger);
    if (ScrollTrigger.isTouch != 1) {        
        setTimeout(() => {
            animatonInit();
        }, 800);
    }
    touch_dev.value = ScrollTrigger.isTouch
});

function animatonInit() {
    ScrollTrigger.update();
    window.addEventListener('resize', () => resize());

    const scrollbar = document.querySelector('#scrollbar .n-scrollbar-container'),
        offset    = (area.value.clientWidth - card_size) / (stages.value.length - 1),
        step      = card_size - offset,
        max_path  = step * (stages.value.length - 1);     
        ScrollTrigger.create({
            scroller: scrollbar,
            trigger: section.value,
            start: '-110px top',
            end: (stages.value.length - 1) * step + 'px top',
            pin: true,
            onUpdate: (self) => {
                show_skip.value = self.progress > 0 && self.progress < 1;
    
                const dx = self.progress * max_path;
                
                stages.value.forEach((item, index) => {
                    const start = card_size * index,
                          max_dx = step * index,
                          max_x = start - max_dx,
                          current_x = start - dx,
                          x = max_x < current_x ? current_x : max_x;
    
                    gsap.set(item, {
                        css: { x: x }
                    });
                });
            },
        });
    resize();

}

function resize() {
    stages.value.forEach((item, index) => {
        gsap.set(item, {
            css: {
                x: card_size * index
            }
        });
    });
}
</script>

<style>
.development-info {
    display: none;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: 1fr;
    grid-gap: 40px;
    width: calc((100vw - 100%) / 2 + 100%);
    /* margin-left: calc((-100vw + 100%) / 2); */
}

.development-info-text-content {
    aspect-ratio: 1 / 1;
    height: 400px;
    border-radius: 50%;
    background-color: var(--light-gray);
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
}

.development-stages {
    display: flex;
    align-items: stretch;
    width: max-content;
}

.development-stages-wrapper {
    display: flex;
    align-items: stretch;
    overflow: hidden;
    grid-area: 1 / 2 / 2 / 4;
    position: relative;
}

.development-stages .stage {
    width: 620px;
    height: 100%;
    border-left: 1px solid var(--gray);
    background-color: #fff;
    position: absolute;
    padding: 0px 40px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.development-stages .stage p {
    font-family: 'Geologica';
    color: var(--black);
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.skip {
    position: fixed;
    left: 50%;
    transform: translateX(-50%);
    bottom: -100%;
    transition: 0.5s;
}

.skip.show {
    bottom: 10px;
}

.text-content-row {
    display: flex;
    flex-direction: row;
    align-items: flex-end;
    gap: 20px;
    font-family: 'Unbounded';
    font-size: 60px;
    font-weight: 500;
    line-height: 70px;
    padding-right: 20px;

}

.text-content-row span {
    font-family: 'Unbounded';
    font-size: 20px;
    font-weight: 500;
    line-height: 25px;
    padding-bottom: 14px;
}

.development-info-text-content p {
    font-size: 16px;
    font-weight: 200;
    line-height: 23px;
    text-align: center;
}

.development-stages .stage .number {
    color: var(--accent);
    font-size: 40px;
    font-weight: 500;
    line-height: 50px;
    margin-bottom: 20px
}

.development-nav-container {
    display: none;
}

.development-slider.visible {
    display: grid;
}

.development-nav-container.visible {
    display: flex;
}

.development-info-text-content {
    height: 320px;
}

.text-content-row span {
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    padding-bottom: 6px;
}

.development-info-text-content p {
    font-size: 14px;
    font-weight: 200;
    line-height: 20px;
}

.stage {
    display: flex;
    flex-direction: column;
    /* justify-content: space-between; */
    height: 100%;
}

.stage .number {
    color: var(--accent);
    font-size: 40px;
    font-weight: 500;
    line-height: 50px;
}

.stage h5 {
    font-size: 24px;
    font-weight: 500;
    line-height: 29px;
}

.stage p {
    font-size: 18px;
    font-weight: 200;
    line-height: 23px;
}

#development .n-carousel .n-carousel__slides .n-carousel__slide {
    height: 340px;
}

.development-nav {
    display: flex;
    flex-direction: row;
}

.development-nav-btn {
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

.development-nav-btn:hover {
    border: 1px solid var(--accent);
}

.development-nav-btn svg path {
    fill: var(--black);
    transition: 0.5s;
}

.development-nav-btn:hover svg path {
    fill: var(--accent);
}

.development-nav-btn.disable {
    border: 1px solid var(--dark-gray);
    cursor: not-allowed;
}

.development-nav-btn.disable svg path {
    fill: var(--dark-gray);
}

.development-nav-container {
    margin-top: 20px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.development-nav {
    display: flex;
    flex-direction: row;
    gap: 20px;
}

.numbers-nav {
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
}

.numbers-nav span {
    color: var(--accent)
}

.development-info.visible {
    display: grid;
}

.development-slider.visible {
    display: flex;
}   

.development-nav-container {
    display: flex;
}

.development-nav-container {
    display: none;
}

.development-slider {
    display: none
}

@media screen and (max-width: 1600px) {
    .development-info-text-content {
        height: 300px;
    }

    .development-stages .stage {
        gap: 0;
    }

    .development-stages .stage .number {
        font-size: 30px;
        line-height: 40px;
        margin-bottom: 10px;
    }

    .development-stages .stage h5 {
        font-size: 24px;
        line-height: 30px;
        margin-bottom: 10px;
    }

    .development-stages .stage p {
        font-size: 20px;
        line-height: 26px;
    }
}

@media screen and (max-width: 360px) {
    .text-content-row {
        font-size: 20px;
        font-weight: 500;
        line-height: 30px;
    }
}
</style>