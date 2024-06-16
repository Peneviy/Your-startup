<template>
    <header :class="[ props.window_scroll > 0 ? 'scrolled' : '', ]">
        <div class="container">
            <div class="header-content">
                <div class="header-block">
                    <div class="burger" @click="active = true">
                        <div class="burger-bar"></div>
                        <div class="burger-bar"></div>
                        <div class="burger-bar"></div>
                    </div>
                </div>
                <NuxtLink to="/" @click="ScrollTop">
                    <img class="header-logo" src="/assets/img/logo.svg" alt="">
                </NuxtLink>
                <div class="header-block">
                    <div class="header-contacts">
                        <a href="tel:+7 (992) 100 99 01">+7 (992) 100 99 01</a>
                        <a href="mailto:info@your-startup.space">info@your-startup.space</a>
                    </div>
                </div>
            </div>
            
        </div>
    </header>
    <n-drawer id="menu" v-model:show="active" placement="left">
        <n-drawer-content closable>
            <template #header>  
                <a class="menu-logo"ref="">
                    <img class="menu-logo" src="@/assets/img/logo.svg" alt="">
                </a>
            </template>
            <div class="nav-list">
             <NuxtLink class="nav-item" @click="active = false" v-for="item in menu" :to="item.link" :key="item.link">
                    {{ item.label }}
                </NuxtLink>   
            </div>
            <UIButton @click="setActive">Оставить заявку</UIButton>
        </n-drawer-content>
    </n-drawer>
    <n-drawer id="order-popup" v-model:show="active_form" placement="right">
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
const active_form = ref(false); 
const emit = defineEmits(['submit_form']);
const index = ref(0);

function nextSlide(){
    index.value = 1;
}

function close() {
    active.value = false;
    index.value = 0;
}

function setActive () {
    active.value = false
    active_form.value = true
}

const props = defineProps({
    window_scroll: 0
})
const scroll_position = useState('scrollbar');
function ScrollTop() {
    scroll_position.value.scrollTo({
        top: 0,
    })
}

const menu = [
    {
        label: 'Главная',
        link: '/'
    },
    {
        label: 'О компании',
        link: '/about'
    },
    {
        label: 'Команда',
        link: '/team'
    },
    {
        label: 'Портфолио',
        link: '/cases'
    },
    {
        label: 'Поддержка сайтов',
        link: '/support'
    },
    {
        label: 'Новости',
        link: '/news'
    },
    {
        label: 'Контакты',
        link: '/contacts'
    },
]

</script>

<style>

#menu {
    width: 100%!important;
    max-width: 950px;
    z-index: 20000;
}

#menu .custom-btn {
    width: 100%;
    margin-top: 60px
}

.nav-list {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.nav-list .nav-item {
    font-size: 30px;
    font-weight: 500;
    line-height: 40px;
    width: max-content;
}

header {
    position: fixed;
    width: 100%;
    top: 0px;
    left: 0px;    
    z-index: 300;
    transition: 0.5s
}

header.scrolled {
    background-color: var(--white);
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--dark-gray);
    padding: 40px 0;
    transition: 0.5s
}

header.scrolled .header-content {
    padding: 20px 0;
}

.header-block {
    width: 300px;
}

.burger {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: relative;
    gap: 15px;
    cursor: pointer;
    width: 80px;
    transition: 0.5s
}

header.scrolled .burger {
    gap: 9px;
    width: 60px;
}

.burger-bar {
    height: 3px;
    width: 100%;
    background-color: var(--black);
}

.header-contacts {
    display: flex;
    align-items: flex-end;
    flex-direction: column;
    gap: 20px;
    transition: 0.5s;
}

header.scrolled .header-contacts {
    gap: 5px;
}

.header-contacts a {
    font-size: 20px;
    font-weight: 500;
    line-height: 25px;
    letter-spacing: 0em;
    text-align: right;
    width: max-content;
    text-transform: uppercase;
    transition: 0.5s;
}

header.scrolled .header-contacts a {
    font-size: 16px;
    line-height: 20px;
}

.header-logo {
    display: block;
    transition: 0.5s;
    height: 70px;
}

header.scrolled .header-logo {
    height: 46px;
}

.menu-logo {
    display: none
}

#menu .n-drawer-content .n-drawer-body {
    height: 100%;
}

#menu  .n-drawer-content.n-drawer-content--native-scrollbar .n-drawer-body-content-wrapper {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

@media screen and (max-width: 1600px) {
    .header-content {
        padding: 30px 0;
    }

    header .burger {
        gap: 12px;
        width: 70px;
    }

    .header-logo {
        height: 60px;
    }

    .header-contacts {
        gap: 12px;
    }

    .header-contacts a {
        font-size: 18px;
        line-height: 22px;
    }

    .nav-list {
        gap: 15px;
    }

    .nav-list .nav-item {
        font-size: 26px;
        font-weight: 500;
        line-height: 40px;
    }

    #menu {
        max-width: 600px;
    }

    #menu .custom-btn {
        /* width: 500px; */
        padding: 20px 40px;
    }
}

@media screen and (max-width: 1200px) {
    .header-content,
    header.scrolled .header-content {
        flex-direction: row-reverse;
        justify-content: space-between;
        padding: 20px 0px;
    }

    .header-block:has(.header-contacts) {
        display: none;
    }

    .header-block {
        width: max-content
    }

    header.scrolled .header-content .header-logo,
    .header-content .header-logo,
    .header-content a {
        width: 88px;
        height: 34px;
    }

    header .burger,
    header.scrolled .burger {
        width: 24px;
        gap: 4px
    }

    .burger-bar {
        height: 2px;
    }

    .nav-list .nav-item {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }

    .menu-logo {
        display: block;
        width: 88px;
    }

    #menu .nav-list {
        border-top: 1px solid var(--gray);
        padding-top: 20px
    }

    #menu.n-drawer .n-drawer-content .n-drawer-header {
        padding: 0px 10px;
        padding-bottom: 20px;
        display: flex;
        align-items: center;
    }

    #menu .custom-btn {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }
}
</style>