<template>
    <section id="trust">
        <div class="container trust-container">
            <h2 class="trust-title" v-html="data?.title"></h2>
            <div class="trust-list">
                <div class="trust-item" :class="'item-' + (index + 1)" v-for="item, index in data?.trust">
                    <div class="border">
                        <span>{{ item?.title }}</span>
                        <p>{{ item?.text }}</p>
                    </div>
                </div>
                <div class="trust-img-container">
                    <img class="trust-img" :src="data?.img" alt="">
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
    const trust = ref([
        {title: 'Персональный подход', text: 'Мы предлагаем полный цикл разработки сайта, начиная от анализа вашего бизнеса и конкурентов, до создания дизайна, написания контента и программирования. Мы гарантируем высокое качество работы и соблюдение сроков.'},
        {title: 'Бюджет', text: 'Мы понимаем, что Ваше время и бюджет являются важными факторами при выборе веб-студии, благодаря нашим конкурентоспособным ценам Вам не придется выходить за рамки бюджета, чтобы получить высококачественный сервис.'},
        {title: 'Качество', text: 'Наша команда состоит из профессионалов, которые имеют большой опыт в разработке сайтов. Мы используем только современные технологии и инструменты, чтобы создать сайт, который будет не только красивым и удобным для пользователей, но и эффективным для вашего бизнеса.'},
        {title: 'Техническое обслуживание', text: 'Мы также предоставляем полную техническую поддержку и обслуживание сайта, чтобы вы могли быть уверены в его надежности и работоспособности.'}
    ])
    const props = defineProps({
        data: null
    });
</script>
<style>
    .trust-title {
        font-family: Unbounded;
        font-size: 80px;
        font-weight: 500;
        line-height: 100px;
        letter-spacing: 0em;
        text-align: left;
        text-transform: uppercase;
        position: relative;
        margin-bottom: 60px;
    }

    .trust-title::before {
        content: '';
        position: absolute;
        height: 43px;
        width: 320px;
        top: 0;
        left: -40px;
        background-color: var(--light-accent);
        z-index: -1;
    }

    .trust-list {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
    }
    
    .trust-item .border {
        display: flex;
        flex-direction: column;
        gap: 95px;
    }

    .trust-item span {
        font-size: 40px;
        font-weight: 500;
        line-height: 50px;
    }

    .trust-item p {
        font-size: 25px;
        font-weight: 200;
        line-height: 35px;
    }

    .trust-item.item-1 {
        padding-right: 40px;
        padding-bottom: 40px;
        border-right: 1px solid var(--dark-gray);
    }

    .trust-item.item-2 {
        padding-left: 40px;
        padding-bottom: 40px;
    }
    
    .trust-item.item-2 .border {
        border-right: 1px solid var(--dark-gray);
        padding-right: 40px;
    }

    .trust-item.item-3 {
        padding-left: 40px;
        padding-bottom: 40px;
    }

    .trust-item.item-4 {
        padding-right: 40px;
        border-right: 1px solid var(--dark-gray);
    }

    .trust-item.item-4 .border {
        padding-top: 40px;
        border-top: 1px solid var(--dark-gray);
    }

    .trust-img-container {
        grid-area: 2 / 2 / auto /span 2;
        padding-left: 20px;
    }

    .trust-img {
        width: 100%;
        height: 375px;
        object-fit: cover;
        /* clip-path: ellipse(50% 50%); */
    }

    #trust {
        margin-bottom: 150px;
    }

    @media screen and (max-width: 1600px) {
        .trust-title {
            font-size: 60px;
            line-height: 75px;
        }
        
        .trust-item p {
            font-size: 20px;
            font-weight: 200;
            line-height: 30px;
        }

        .trust-item span {
            font-size: 28px;
            font-weight: 500;
            line-height: 38px;
        }

        .trust-item .border {
            gap: 65px;
        }
    }

    @media screen and (max-width: 1200px) {
        .trust-item span {
            font-size: 18px;
            font-weight: 500;
            line-height: 25px;
        }

        .trust-item p {
            font-size: 14px;
            font-weight: 200;
            line-height: 20px;
        }

        .trust-list {
            grid-template-columns: 1fr;
        }

        .trust-img-container {
            grid-area: 3 / 1 / auto /span 1;
            padding: 20px 0px;
            border-bottom: 1px solid var(--dark-gray);
        }

        .trust-img {
            height: 178px;
        }

        .trust-title {
            font-size: 26px;
            font-weight: 500;
            line-height: 35px;
            margin-bottom: 20px;
        }

        .trust-title::before {
            width: 95px;
            height: 15px;
            left: -20px;
        }

        .trust-item.item-1,
        .trust-item.item-2,
        .trust-item.item-3,
        .trust-item.item-4 {
            padding: 20px 0px;
            border: none;
            gap: 10px;
            border-bottom: 1px solid var(--dark-gray);
        }

        .trust-item.item-1 {
            border-top: 0px;
        }

        .trust-item.item-1 .border,
        .trust-item.item-2 .border,
        .trust-item.item-3 .border,
        .trust-item.item-4 .border  {
            border: none;
            padding: 0px;
            gap: 10px;
        }

        #trust {
            margin-bottom: 80px;
        }
    }
</style>