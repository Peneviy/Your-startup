<template>
    <section>
        <div class="container">
            <div class="packages">
                <h2>{{ props?.title}}</h2>
                <p>Наша команда готова взять на себя все технические и операционные задачи, связанные с вашим сайтом, чтобы вы могли сосредоточиться на развитии своего бизнеса.</p>
            </div>
            <div class="packages-info">
                <div class="packages-info-item"  v-for="item in info">
                    <h4>{{item.title}}</h4>
                    <h3>{{item.price}} 
                    <svg width="46" height="45" viewBox="0 0 46 45" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29.38 7.08H13.18L17.74 2.52V45H7.54V-3.57628e-06H29.98C33.3 -3.57628e-06 36.14 0.579997 38.5 1.74C40.86 2.86 42.68 4.46 43.96 6.54C45.28 8.58 45.94 10.98 45.94 13.74C45.94 16.46 45.28 18.86 43.96 20.94C42.68 22.98 40.86 24.58 38.5 25.74C36.14 26.86 33.3 27.42 29.98 27.42H0.94V20.34H29.38C31.34 20.34 32.88 19.76 34 18.6C35.12 17.4 35.68 15.78 35.68 13.74C35.68 11.66 35.12 10.04 34 8.88C32.88 7.68 31.34 7.08 29.38 7.08ZM0.88 38.52V32.28H37V38.52H0.88Z" fill="#7C4DFF"/>
                    </svg>
                    </h3>
                    <p class="packages-info-hour">{{item.hour}}</p>
                    <ul>
                    <li class="packages-info-item-color" v-for="li in item.list" :class="li.class?'disable':''">{{li.label}}</li>
                    </ul>
                    <p class="packages-info-text">{{item.infoText}}</p>
                    <UIButton @click="active = true, setService(item?.title)" class="packages-info-btn">Оставить заявку</UIButton>
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
                <BaseForm @submit_form="nextSlide" :is_services="true" :curent_service = "service"/>
                <BaseSuccessPopup @close_popup="close"/>
            </n-carousel>
            </n-drawer-content>
    </n-drawer>
</template>

<script setup>
import { NDrawer, NDrawerContent, NInput, NSelect, NCarousel } from 'naive-ui';
const props = defineProps({
    title: String,
});
const info = [ 
    {
        title:'Старт',
        price:'24 000',
        hour:'10 часов в месяц',
        infoText:'*Дополнительные работы рассчитываются отдельно по тарифу  2 400 руб/час',
        list: [
            { label:'Обеспечение надежной работы сайта'},
            { label:'Регулярное создание резервных копий сайта (1 раз в неделю)'},
            { label:'Обнаружение и лечение вирусов при заражении сайта'},
            { label:'Консультации по работе с CMS'},
            { label:'Решение технических проблем' },
            { label:'Создание дополнительных функциональных возможностей', class:true},
            { label:'Написание уникальных статей и текстов', class:true},
            { label:'Гарантия на крупные доработки 1 месяц', class:true},
            { label:'Перенос неиспользованных часов в следующий месяц (но не более одно раза в квартал)', class:true}
        ]
    },
    {
        title:'Стандарт',
        price:'63 000',
        hour:'30 часов в месяц',
        infoText:'*Дополнительные работы рассчитываются отдельно по тарифу  2 100 руб/час',
        list: [
            { label:'Обеспечение надежной работы сайта'},
            { label:'Регулярное создание резервных копий сайта (1 раз в неделю)'},
            { label:'Обнаружение и лечение вирусов при заражении сайта'},
            { label:'Консультации по работе с CMS'},
            { label:'Решение технических проблем'},
            { label:'Создание дополнительных функциональных возможностей'},
            { label:'Написание уникальных статей и текстов'},
            { label:'Гарантия на крупные доработки 1 месяц'},
            { label:'Перенос неиспользованных часов в следующий месяц (но не более одно раза в квартал)', class:true }
        ]
    },
    {
        title:'Премиум',
        price:'162 000',
        hour:'90 часов в месяц',
        infoText:'*Дополнительные работы рассчитываются отдельно по тарифу  1 800 руб/час',
        list: [
            { label:'Обеспечение надежной работы сайта'},
            { label:'Регулярное создание резервных копий сайта (1 раз в неделю)'},
            { label:'Обнаружение и лечение вирусов при заражении сайта'},
            { label:'Консультации по работе с CMS'},
            { label:'Решение технических проблем'},
            { label:'Создание дополнительных функциональных возможностей'},
            { label:'Написание уникальных статей и текстов'},
            { label:'Гарантия на крупные доработки 1 месяц'},
            { label:'Перенос неиспользованных часов в следующий месяц (но не более одно раза в квартал)'}
        ]
    },
];

const active = ref(false);
const service = ref(null);
const emit = defineEmits(['submit_form']);
const index = ref(0);

function nextSlide(){
    index.value = 1;
}
function setService(item) {
    service.value = item;
}

function close() {
    active.value = false;
    index.value = 0;
}
</script>

<style>
.packages {
    margin-top: 150px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin-bottom: 60px
}
.packages h2 {
    font-size: 100px;
    font-weight: 500;
    line-height: 110px;
    letter-spacing: 0em;
    text-align: left;
    text-transform: uppercase;
    position: relative;
}

.packages h2::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}
.packages p {
    max-width: 586px;
    margin-left: 20px;
}
.packages-info {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-bottom: 150px;
    gap: 20px;
}
.packages-info-item {
    border: 1px solid var(--accent);
    box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.1);
    padding: 40px;
}
.packages-info h3 {
    color: var(--accent);
    padding-top: 20px;
    padding-bottom: 10px;
}
.packages-info-hour {
    color: var(--dark-gray);
    font-size: 14px;
    font-weight: 250;
    line-height: 20px;
    letter-spacing: -0.01em;
}
.packages-info ul {
    list-style: none;
    font-size: 16px;
    font-weight: 200;
    line-height: 23px;
    padding-left: 0;
    border-bottom: 1px solid var(--dark-gray);
}
.packages-info li {
    background: url('/_nuxt/assets/img/Check_support.svg') no-repeat left center; 
    padding: 10px 0;
    padding-left: 30px;
}
.packages-info li:last-child {
    padding-bottom: 20px;
}
.packages-info-text {
    font-size: 14px;
    font-weight: 200;
    line-height: 20px;
    letter-spacing: -0.01em;
    color: var(--black);
    margin-bottom: 60px;
}
.packages-info-btn {
    padding: 20px 40px 20px 40px;
    font-size: 20px;
    font-weight: 500;
    line-height: 25px;
    width: 100%;
}
.packages-info-item-color {
    color: var(--black);
 }
.packages-info-item-color.disable {
    color: var(--gray);
    background: url('/_nuxt/assets/img/Check_support_disabled.svg') no-repeat left center;
 }

 @media screen and (max-width: 1600px) {
    .packages h2 {
        font-size: 60px;
        line-height: 75px;
    }

    .packages h2::before {
        width: 220px;
        height: 35px;
        left: -20px;
    }
    .packages p {
        font-size: 20px;
    }
    .packages-info-item h3 {
        font-size: 50px;
    }
    .packages-info svg { 
        width: 35px;
        height: 36px;
    }
    .packages-info-item h4{
        font-size: 28px;
    }
    .packages-info-btn {
        font-size: 20px;
    }
 }
 @media screen and (max-width: 1200px) {
    .packages{
        margin-top: 80px;
        flex-direction: column;
    }
    .packages h2 {
        font-size: 26px;
        font-weight: 500;
        line-height: 35px;
        margin-bottom: 20px;
    }

    .packages h2::before {
        width: 95px;
        height: 15px;
        left: -20px;
    }
    .packages p {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
        margin-left: 0;
    }
    .packages-info {
        flex-direction: column;
        margin-bottom: 80px;
        gap: 20px;
    }
    .packages-info-btn {
        padding: 20px 40px 20px 40px;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }
    .packages-info-hour {
        font-size:12px;
    }
    .packages-info-item {
        padding: 20px;
    }
    .packages-info svg { 
        width: 15px;
        height: 16px;
    }
    .packages-info h3 {
        padding-top: 10px;
        padding-bottom: 5px;
        font-size: 20px;
        font-weight: 500;
        line-height: 30px;
    }
    .packages-info li {
        padding: 5px 0;
        padding-left: 30px;
    }
    .packages-info-text {
        margin-bottom: 40px;
        font-size: 12px;
        font-weight: 200;
        line-height: 15px;
        letter-spacing: -0.01em;
    }
    .packages-info ul {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
    }

}
</style>