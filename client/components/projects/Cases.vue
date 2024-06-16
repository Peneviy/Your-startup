<template>
    <section id="cases" ref="section">
        <div class="container">
            <div class="case-nav mobile">
                <div class="case-nav-prev case-nav-btn" @click="case_carousel_mobile.prev()">
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.03033 1.53033C6.32322 1.23744 6.32322 0.762563 6.03033 0.46967C5.73744 0.176777 5.26256 0.176777 4.96967 0.46967L0.96967 4.46967C0.823223 4.61612 0.75 4.80806 0.75 5C0.75 5.10169 0.770239 5.19866 0.806909 5.28709C0.843509 5.37555 0.897763 5.45842 0.96967 5.53033L4.96967 9.53033C5.26256 9.82322 5.73744 9.82322 6.03033 9.53033C6.32322 9.23744 6.32322 8.76256 6.03033 8.46967L3.31066 5.75H13C13.4142 5.75 13.75 5.41421 13.75 5C13.75 4.58579 13.4142 4.25 13 4.25H3.31066L6.03033 1.53033Z"/>
                    </svg>
                </div>
                <div class="case-nav-next case-nav-btn" @click="case_carousel_mobile.next()">
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.46967 1.53033C8.17678 1.23744 8.17678 0.762563 8.46967 0.46967C8.76256 0.176777 9.23744 0.176777 9.53033 0.46967L13.5303 4.46967C13.8232 4.76256 13.8232 5.23744 13.5303 5.53033L9.53033 9.53033C9.23744 9.82322 8.76256 9.82322 8.46967 9.53033C8.17678 9.23744 8.17678 8.76256 8.46967 8.46967L11.1893 5.75H1.5C1.08579 5.75 0.75 5.41421 0.75 5C0.75 4.58579 1.08579 4.25 1.5 4.25H11.1893L8.46967 1.53033Z"/>
                    </svg>
                </div>
        </div>
            <div class="cases__wrapper">
                <!-- :show-arrow="true" -->
                <n-carousel 
                    :draggable="true"
                    :on-update:current-index="slideTo"
                    :show-dots="false"
                    :mousewheel="scrollable"
                    :loop="false"
                    direction="vertical"
                    style="width: 100%; height: calc(100vh - 151px - 80px)"
                    class="cases-list desktop"
                    ref="case_carousel"
                    @wheel="enterBack"
                >
                    <projects-case 
                        v-for="(item, index) in data?.cases"
                        :case="item"
                        :index="index"
                    />
                </n-carousel>
                <projects-cases-carousel
                    :cases="data?.cases"
                    :click="slideTo"
                    :currentIndex="currentIndex"
                />
               
                <n-carousel 
                    :draggable="true"
                    :on-update:current-index="slideTo"
                    :show-dots="false"
                    :mousewheel="false"
                    :loop="false"
                    direction="horizontal"
                    style="width: 100%; height: 100%"
                    class="cases-list mobile"
                    ref="case_carousel_mobile"
                >
                    <projects-case 
                        v-for="(item, index) in data?.cases"
                        :case="item"
                        :index="index"
                    />
                </n-carousel>
                
            </div>
        </div>
    </section>
</template>
<script setup>
import { NCarousel } from "naive-ui";

const props = defineProps({
    data: null
})

const case_carousel = ref(null);
const case_carousel_mobile = ref()
const currentIndex = ref(0);

const scrollable = ref(true);

function slideTo(index) {
    case_carousel.value.to(index);
    currentIndex.value = index;

    if (index == cases.length - 1) {
        scrollable.value = false;
    }
}

function enterBack(e) {
    if (e.deltaY < 0 && currentIndex.value == cases.length - 1) {
        scrollable.value = true;
        const event = new Event("scrollBy");
        event.params = { top: 0, offset: 0 };

        document.dispatchEvent(event);
    }
}

// const cases = [
//     {
//         img: "bastion.jpg",
//         title: "Бастион",
//         field: "Строительство",
//         text: "Cтроительная компания, специализирующаяся на строительстве домов. Наш основной фокус - строительство из материалов собственного производства, включая арболитовые и брусовые дома.",
//         link: "/cases/bastion",
//         slide_name: 'Сайт компании "Бастион"',
//     },
//     {
//         img: "fish.jpg",
//         title: "Рыбная",
//         field: "Ферма",
//         text: 'Компания АО "ЯРОСЛАВСКИЙ БРОЙЛЕР" анонсировала открытие рыбной фермы «Рыба дивная».  Общий объем инвестиций в проект составляет 1,7 млрд рублей.',
//         link: "/cases/fishLogo",
//         slide_name: "Разработка логотипа для рыбной фермы",
//     },
//     {
//         img: "mediator.jpg",
//         title: "Медиатор",
//         field: "Юрист",
//         text: 'Юрист с особым подходом, обеспечение законности и гармонии в отношениях между людьми. Разбираю "нерешаемые" юридические головоломки, помогаю перестроить этическую и экологическую среду в обществе.',
//         link: "/cases/mediator",
//         slide_name: "Сайт-визитка для медиатора, юриста",
//     },
//     {
//         img: "expert.jpg",
//         title: "Expert",
//         field: "Standart",
//         text: "Цель сертификации ISO для бизнеса заключается в том, чтобы установить и подтвердить соответствие организации международным стандартам качества и безопасности.",
//         link: "/cases/expert",
//         slide_name: "Лендинг по сертификации Expert Standart",
//     },
//     {
//         img: "warm-day.jpg",
//         title: "Теплый день",
//         field: "Благотворительная акция",
//         text: 'С 2014 года в ЯНАО проходит ежегодная благотворительная акция "Теплый день", организованная Молодежным правительством региона. Ее цель - поддержать детей из социально незащищенных семей и одиноких пожилых пенсионеров.',
//         link: "/cases/warmDay",
//         slide_name: "Сайт благотворительной акции «Теплый день»",
//     },
//     {
//         img: "museum.jpg",
//         title: "ВМЗ",
//         field: "Музей истории",
//         text: "Музей истории АО «Выксунского металлургического завода» – точка культурного притяжения города Выкса и юга Нижегородской области.",
//         link: "/cases/museum",
//         slide_name: "Сайт музея истории «Выксунского металлургического завода»",
//     },
//     {
//         img: "tantra.jpg",
//         title: "Tantra",
//         field: "Бар",
//         text: "Город вызывает вечный стресс, который не даёт вырваться из порочного круга. Тантра поможет очиститься и вдохнуть полной грудью.",
//         link: "/cases/tantra",
//         slide_name: "Сайт ресторан, кальян-бар, бар, паб Tantra",
//     },
//     {
//         img: "taomed.jpg",
//         title: "ТАОМЕД",
//         field: "",
//         text: "Клиники «ТАО» - дружная команда высококлассных специалистов и особая атмосфера доверия и внимания. Они заботятся о вашем здоровье с 2007 года.",
//         link: "/cases/taomed",
//         slide_name: 'Редизайн страницы "Иглоукалывания" - ТАОМЕД',
//     },
//     {
//         img: "stihi.jpg",
//         title: "«Учим стихи просто»",
//         field: "Интернет-магазин",
//         text: "Для тех, кто имеет трудности с запоминанием стихов наизусть, можно использовать метод ассоциаций. Например, можно связать каждую строчку стихотворения с определенным объектом или картинкой, которые легко запоминаются.",
//         link: "/cases/poetry",
//         slide_name: "Интернет-магазин «Учим стихи просто!»",
//     },
//     {
//         img: "trade.jpg",
//         title: "Off Trade",
//         field: "Корпоративный сайт",
//         text: "Главной особенностью проекта Off-trade является его главная страница и анимации на ней. Она является своего рода визитной карточной сайта и служит для привлечения внимания потенциальных клиентов.",
//         link: "/cases/offtrade",
//         slide_name: "Корпоративный сайт Off-trade",
//     },
//     {
//         img: "avtotrans-sibir.png",
//         title: "АвтоТранс- Сибирь",
//         field: "Корпоративный сайт",
//         text: "Ветроэнергетика. Крупногабаритные и тяжеловесные перевозки. Монтаж, перебазировка, демонтаж буровых установок.",
//         link: "/cases/atc",
//         slide_name: "Корпоративный сайт АвтоТранс-Сибирь",
//     },
// ];
</script>
<style>
.container {
    position: relative;
}
.cases__wrapper {
    display: grid;
    grid-template-columns: 1fr 200px;
    gap: 40px;
}
.cases-list {
    display: flex;
    gap: 40px;
}
.mobile {
    display: none;
}
.case-nav {
    position: absolute;
    right: 10px;
    top: 35px; 
    z-index: 1; 
}
.case-nav-btn {
    display: none;
}

@media screen and (max-width: 1200px ) {
    .cases__wrapper {
        grid-template-columns: 1fr; 
    }
    .desktop {
        display: none;
    }
    .mobile {
        display: flex;
    }
    .case-nav-btn {
        display: flex;
    }
}
</style>
