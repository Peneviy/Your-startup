<template>
    <div class="container">
        <div class="advantages" >
            <h2>{{ props?.title}}</h2>
            <div class="advantages-row">
                <div class="advantages-row-block" v-for="item in info">
                    <h3>{{item.number}}</h3>
                    <h4>{{item.title }}</h4>
                    <p>{{item.text}}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    title: String,
});
const info = [ 
    {
        number:'01',
        title:'Быстро и эффективно',
        text:'Мы гарантируем быструю и качественную техническую поддержку для Вас, что позволит Вам быстро и эффективно решать свои проблемы и продолжать пользоваться сайтом без препятствий.'
    },
    {
        number:'02',
        title:'Ответственно',
        text:'Наша команда состоит из профессионалов в области технической поддержки, которые имеют высокую квалификацию и опыт работы с различными техническими проблемами. Мы гарантируем профессиональный подход к каждому случаю и быстрое решение любых проблем.'
    },
    {
        number:'03',
        title:'Инновационно',
        text:'Мы используем самые современные технологии и инструменты для обеспечения быстрой и качественной технической поддержки. Это позволяет нам быстро решать любые проблемы и обеспечивать высокий уровень сервиса для Вас.'
    },
]
</script>

<style>
.advantages{
    margin-bottom: 150px;
}
.advantages h2 {
    font-size: 100px;
    font-weight: 500;
    line-height: 110px;
    letter-spacing: 0em;
    text-align: left;
    text-transform: uppercase;
    position: relative;
    margin-bottom: 60px;
}

.advantages h2::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}
.advantages-row{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    /* max-width: 640px;
    max-height: 480px; */
}
.advantages-row-block{
    padding: 0 40px;
    border-right: 1px solid var(--dark-gray);
}
.advantages-row-block:last-child{
    border-right: none;
}
.advantages-row-block:first-child{
    padding: 0;
    padding-right: 40px;
}
.advantages-row-block h3{
    color:var(--accent);
}
.advantages-row-block h4{
    padding: 20px 0;
    min-height: 140px;
}
@media screen and (max-width: 1600px) {
    .advantages h2 {
        font-size: 60px;
        line-height: 75px;
    }

    .advantages h2::before {
        width: 220px;
        height: 35px;
        left: -20px;
    }

    .advantages-row-block h3 {
        font-size: 50px;
    }

    .advantages-row-block h4 {
        font-size: 28px;
    }

    .advantages-row-block p {
        font-size: 20px;
        line-height: 30px;
    }

    
}
@media screen and (max-width: 1400px) {
    .advantages-row-block {
        padding: 0px 20px;
    }
}
@media screen and (max-width: 1200px) {
    .advantages{
        margin-bottom: 80px;
    }
    .advantages h2 {
        font-size: 26px;
        font-weight: 500;
        line-height: 35px;
        margin-bottom: 40px;
    }
    .advantages h2::before {
        width: 95px;
        height: 15px;
        left: -20px;
    }
    .advantages-row-block{
        padding: 20px 0;
        border-right: none;
        border-bottom: 1px solid var(--dark-gray);
    }
    .advantages-row-block:first-child{
        padding-bottom: 20px;

    }
    .advantages-row{
        flex-direction: column;;
    }
    .advantages-row-block p{
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
        max-width: 340px;
        max-height: 220px;
    }
    .advantages-row-block h4{
        padding: 10px 0;
        min-height: 0;
        width: 240px;
        font-size: 18px;
    }
    .advantages-row-block h3 {
        font-size:20px;

    }
}
</style> 