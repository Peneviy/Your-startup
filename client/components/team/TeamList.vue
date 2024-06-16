<template>
    <section>
        <div class="container">
            <h2>Наш коллектив</h2>
            <div class="desktop">
                <div class="team-list first-list">
                    <div class="team-item" :style="'background-image: linear-gradient(180.00deg, rgba(69, 69, 69, 0) 70.494%,rgba(20, 20, 20, 0.71) 90.394%,rgb(0, 0, 0) 100.359%),url('+ item.img + ');'" :class="index < 6 ? '' : 'hidden'" v-for="item, index in team">
                        <div class="team-item-text">
                            <span>{{ item?.name }}</span>
                            <p>{{ item?.post }}</p>   
                        </div>
                    </div>
                </div>
                <div class="team-drop" :class="drop ? 'drop' : ''">
                    <div class="team-list">
                        <div class="team-item" :style="'background-image: linear-gradient(180.00deg, rgba(69, 69, 69, 0) 70.494%,rgba(20, 20, 20, 0.71) 90.394%,rgb(0, 0, 0) 100.359%),url('+ item.img + ');'" :class="index > 5 ? '' : 'hidden'" v-for="item, index in team">
                            <div class="team-item-text">
                                <span>{{ item?.name }}</span>
                                <p>{{ item?.post }}</p>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile">
                <div class="team-list first-list">
                    <div class="team-item" :style="'background-image: linear-gradient(180.00deg, rgba(69, 69, 69, 0) 70.494%,rgba(20, 20, 20, 0.71) 90.394%,rgb(0, 0, 0) 100.359%),url('+ item.img + ');'" :class="index < 3 ? '' : 'hidden'" v-for="item, index in team">
                        <div class="team-item-text">
                            <span>{{ item?.name }}</span>
                            <p>{{ item?.post }}</p>   
                        </div>
                    </div>
                </div>
                <div class="team-drop" :class="drop ? 'drop' : ''">
                    <div class="team-list">
                        <div class="team-item" :style="'background-image: linear-gradient(180.00deg, rgba(69, 69, 69, 0) 70.494%,rgba(20, 20, 20, 0.71) 90.394%,rgb(0, 0, 0) 100.359%),url('+ item.img + ');'" :class="index > 2 ? '' : 'hidden'" v-for="item, index in team">
                            <div class="team-item-text">
                                <span>{{ item?.name }}</span>
                                <p>{{ item?.post }}</p>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="more-btn" :class="drop ? 'drop' : ''" @click="dropList">Показать ещё</div>
        </div>
    </section>
</template>
<script setup>
const team = ref([
    {img: '/_nuxt/assets/img/team3.jpg', name: 'Цепов Игорь', post: 'Генеральный директор'},
    {img: '/_nuxt/assets/img/team2.jpg', name: 'Денис Андреев', post: 'Исполнительный директор'},
    {img: '/_nuxt/assets/img/team1.jpg', name: 'Олег Бардак', post: 'Руководитель отдела продаж'},
    {img: '/_nuxt/assets/img/team15.jpg', name: 'Сергей Глазунов', post: 'Руководитель отдела медиапродакшен'},
    {img: '/_nuxt/assets/img/team14.jpg', name: 'Максим Васильев', post: 'Frontend-разработчик'},
    {img: '/_nuxt/assets/img/team17.jpg', name: 'Георгий Егоров', post: 'Frontend-разработчик'},
    {img: '/_nuxt/assets/img/team12.jpg', name: 'Григорий Еремин', post: 'Backend-разработчик'},
    {img: '/_nuxt/assets/img/team24.jpg', name: 'Екатерина Шумило', post: 'UX/UI - дизайнер'},  
    {img: '/_nuxt/assets/img/team26.jpg', name: 'Екатерина Саблина', post: 'SMM - менеджер'},
    {img: '/_nuxt/assets/img/team6.jpg', name: 'Полина Эрлих', post: 'Backend-разработчик'},
    {img: '/_nuxt/assets/img/team18.jpg', name: 'Матвей Смирнов', post: 'Backend-разработчик'},
    {img: '/_nuxt/assets/img/team13.jpg', name: 'Степан Кубасов', post: 'Project manager'},     
    {img: '/_nuxt/assets/img/team16.jpg', name: 'Иван Смолин', post: 'Full stack-разработчик'},
    {img: '/_nuxt/assets/img/team5.jpg', name: 'Денис Заводовский', post: 'Веб-дизайнер'},
    {img: '/_nuxt/assets/img/team4.jpg', name: 'Алина Оберт', post: 'Full stack-разработчик'},
    {img: '/_nuxt/assets/img/team10.jpg', name: 'Никита Дележов', post: 'Full stack-разработчик'},
    {img: '/_nuxt/assets/img/team8.jpg', name: 'Леонид Яговцов', post: 'Frontend-разработчик'},
    {img: '/_nuxt/assets/img/team11.jpg', name: 'Семён Лопаков', post: 'Backend-разработчик'},
    {img: '/_nuxt/assets/img/team9.jpg', name: 'Дмитрий Бардак', post: 'Тестировщик'},  
    {img: '/_nuxt/assets/img/team7.jpg', name: 'Дарья Громова', post: 'Frontend-разработчик'},
    {img: '/_nuxt/assets/img/team25.jpg', name: 'Ефим Щербина', post: 'Видеооператор'},
    
])

const drop = ref(false);

function dropList() {
    drop.value = true;
}

</script>
<style scoped>
    .team-drop {
        display: grid;
        grid-template-rows: 0fr;
        overflow: hidden;
        transition: 0.8s
    }

    .team-drop.drop {
        grid-template-rows: 1fr;
    }

    .team-list {
        position: relative;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        row-gap: 40px;
        column-gap: 80px;
    }

    .first-list {
        margin-bottom: 40px;
    }
    
    .team-drop .team-list {
        min-height: 0px;
    }

    .team-item.hidden {
        display: none;
    }

    .team-list::after,
    .team-list::before {
        content: '';
        position: absolute;
        top: 0px;
        width: 1px;
        height: 100%;
        background: var(--gray);
    }
    
    .team-list::before{
        left: calc((100% - 40px) / 3);
    }

    .team-list::after{
        right: calc((100% - 40px) / 3);
    }

    .team-item {
        padding: 40px;
        height: 485px;
        display: flex;
        align-items: flex-end;
        gap: 20px;
        color: var(--white);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .team-item span {
        font-size: 30px;
        font-weight: 500;
        line-height: 40px;
    }

    .team-item p {
        font-size: 25px;
        font-weight: 200;
        line-height: 35px;
    }

    .more-btn {
        width: 100%;
        padding: 20px 40px;
        border: 1px solid var(--accent);
        color: var(--accent);
        font-size: 20px;
        font-weight: 500;
        line-height: 25px;
        text-align: center;
        margin-top: 60px;
        cursor: pointer;
        transition: 0.5s;
    }

    .more-btn.drop {
        opacity: 0;
        height: 0px;
        pointer-events: none;
        padding: 0px;
        margin: 0px;
    }

    .more-btn:hover {
        background: var(--accent);
        color: var(--white);
    }

    .team-page h2 {
        font-size: 100px;
        font-weight: 500;
        line-height: 110px;
        letter-spacing: 0em;
        text-align: left;
        text-transform: uppercase;
        position: relative;
        margin-bottom: 60px;
    }

    .team-page h2::before {
        content: '';
        position: absolute;
        height: 43px;
        width: 320px;
        top: 0;
        left: -40px;
        background-color: var(--light-accent);
        z-index: -1;
    }

    @media screen and (max-width: 1600px) {
        .team-page h2 {
            font-size: 60px;
            line-height: 75px;
        }

        .team-item span {
            font-size: 24px;
            font-weight: 500;
            line-height: 40px;
        }

        .team-item p {
            font-size: 20px;
            font-weight: 200;
            line-height: 35px;
        }
    }

    @media screen and (max-width: 1570px) {
        
        .team-item {
            padding: 20px;  
            height: 420px;
            min-height: 420px;
        }

        .team-list {
            column-gap: 40px;
            row-gap: 20px;
        }

        .team-item span {
            font-size: 25px;
            line-height: 25px;
        }

        .team-item p {
            font-size: 20px;
            line-height: 20px;
        }

        .team-list::before {
            left: calc((100% - 20px) / 3);
        }

        .team-list::after {
            right: calc((100% - 20px) / 3);
        }
    }

    @media screen and (max-width: 1200px) {
        .team-page h2 {
            font-size: 26px;
            font-weight: 500;
            line-height: 35px;
            margin-bottom: 40px;
        }

        .team-page h2::before {
            width: 95px;
            height: 15px;
            left: -20px;
        }

        .team-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .team-page .mobile {
            flex-direction: column;
        }
        .team-list::after, .team-list::before {
            display: none;
        }

        .team-drop {
            transition: 2.6s
        }

        .team-item span {
            font-size: 16px;
            line-height: 20px;
        }

        .team-item p {
            font-size: 14px;
            line-height: 20px;
        }

        .more-btn {
            margin-top: 0px;
            font-size: 16px;
            font-weight: 500;
            line-height: 20px;
            padding: 20px 40px;
        }

        .first-list {
            margin-bottom: 20px;
        }

        .team-page .mobile {
            flex-direction: column;
        }
    }
</style>