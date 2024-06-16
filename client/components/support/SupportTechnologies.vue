<template>
    <div class="container">
        <h2 class="title">{{ props?.title}}</h2>
        <div class="technologies">
            <div class="technologies-row">
                <p>Мы используем различные технологии и языки программирования для создания и разработки сайтов.</p>
                <img src="@/assets/img/support1.png">
            </div> 
            <div class="technologies-grid">
                <div class="technologies-grid-item" v-for="item in info">
                    <img :src=item.img>
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
        img:'/_nuxt/assets/img/dev-icons/bitrix.png',
        text:'1C-Bitrix',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/c.png',
        text:'C#',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/css.png',
        text:'CSS3',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/devicon_php-1.png',
        text:'PHP',
    },

    {
        img:'/_nuxt/assets/img/dev-icons/html.png',
        text:'HTML5',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/mongo.png',
        text:'MongoDB',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/net_core-1.png',
        text:'.NET Core',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/node.png',
        text:'Node.JS',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/skill-icons_javascript-1.png',
        text:'JavaScript',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/skill-icons_wordpress.png',
        text:'WordPress',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/strapi.png',
        text:'Strapi',
    },
    {
        img:'/_nuxt/assets/img/dev-icons/vue.png',
        text:'Vue.JS',
    },

]
</script>

<style>
.technologies {
    padding-top: 60px;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.title {
    font-size: 100px;
    font-weight: 500;
    line-height: 110px;
    letter-spacing: 0em;
    text-align: left;
    text-transform: uppercase;
    position: relative;
}

.title::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}

.technologies-row {
    padding: 0 40px;
    border-right: 1px solid var(--dark-gray);
}

.technologies-row:last-child {
    border-right: none;
}

.technologies-row:first-child {
    padding: 0;
    padding-right: 40px;
}

.technologies-row img {
    width: 266px;
    height: 267px;
    margin-top:40px;
    margin-left: 254px;
}

.technologies-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 40px;
    width: 100%;
    padding-left: 40px;
}

.technologies-grid-item {
    display: flex;
    flex-direction: column;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
}

.technologies-grid-item img {
    width: 68px;
    height: auto; 
}

.technologies-grid-item p {
    font-size: 16px;
    font-weight: 200;
    line-height: 23px;
    color:var(--dark-gray);
}

@media screen and (max-width: 1600px)  {
    .title {
        font-size: 60px;
        line-height: 75px;
    }

    .title::before {
        width: 220px;
        height: 35px;
        left: -20px;
    }

    .technologies-row p {
        font-size: 20px;
    }
}

@media screen and (max-width: 1200px) {

    .technologies-row img {
        display: none;  
    }

    .title {
        font-size: 26px;
        font-weight: 500;
        line-height: 35px;
    }

    .title::before {
        width: 95px;
        height: 15px;
        left: -20px;
    }

    .technologies-row {
        border-right: none;
        border-bottom: 1px solid var(--dark-gray);
    }

    .technologies-row p {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
        padding-bottom: 20px ;
    }

    .technologies {
        padding-top: 20px;
        flex-direction: column;
    }

    .technologies-grid-item {
        min-width: 340px;
        min-height: 93px;
        position: relative;
    }

    .technologies-grid-item:first-child {
        margin-top: 40px;
    }

    .technologies-grid-item img {
        width: 68px;
        height: auto; 
        position: absolute;
        top: 0;
        left: 136px;
    }

    .technologies-grid-item p {
        font-size: 12px;
        font-weight: 200;
        line-height: 15px;
        letter-spacing: -0.01em;
        color:var(--dark-gray);
        position: absolute;
        bottom: 0;
        text-align: center;
    }

    .technologies-grid {
        padding-left: 0px;
    }
}
</style>