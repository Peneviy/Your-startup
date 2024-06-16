<template>
    <section id="team" ref="section">
        <div class="container">
            <h2 v-html="data?.title"></h2>
            <div class="team-info">
                <div class="team-info-text border">
                    <base-arrow-link :to="data?.link">
                        {{ data?.btn_text }}
                    </base-arrow-link>
                </div>
                <template v-for="item, index in data?.team">
                    <div :class="[index == 1 ? 'team-info-center' : 'team-info-block', index == 0 ? 'border' : '']">
                        <img class="base-img" :src="item?.img" trigger=".team-info"/>
                        <div v-if="index != 1" class="text-info-block">
                            <span v-html="item?.name"></span>
                            <p v-html="item?.post"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>
<script setup>
const props = defineProps({
    data: null
})
</script>
<style>
@font-face {
    src: url("@/assets/fonts/Geologica/static/Geologica-Thin.ttf") format("truetype");
    font-family: "GeologicaLight";
    font-weight: normal;
    font-style: normal;
    font-display: swap;
}

.team-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 40px;
}

.team-info-center {
    grid-area: 1 / 2 / 3 / 3;
    height: 650px;
    border-left: 1px solid var(--dark-gray);
    border-right: 1px solid var(--dark-gray);
    padding: 0 40px;
}

.team-info-center .img-container {
    padding-right: 0px;
}

.team-info-center img,
.team-info-block img  {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.team-info-center img {
    object-fit: cover;
}

.team-info-block {
    height: 285px;
    position: relative;
}

.team-info-block:nth-child(2) {
    height: 325px;
}

.team-info-block:nth-child(2) .text-info-block {
    bottom: 40px;
}

.team-info-block .base-img {
    background-color: #DCDCDC;
}

.team-info-center .img-container {
    clip-path: ellipse(50% 50%);
}

.team-info-text {
    line-height: 38px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}
/* .team-info-text .border {
    margin-: 40px;
} */

.team-info .border {
    border-bottom: 1px solid var(--dark-gray) ;
    padding-bottom: 40px;
}

.text-info-block {
    position: absolute;
    display: flex;
    flex-direction: column;
    gap: 10px;
    bottom: 0;
    padding: 20px;
    width: 100%;
}

.text-info-block::before {
    content: '';
    position: absolute;
    z-index: 1;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    background: linear-gradient(180deg, rgba(69, 69, 69, 0) 20%, rgba(20, 20, 20, 0.705599) 70%, #000000 100%);
}

.text-info-block span {
    font-family: Unbounded;
    position: relative;
    z-index: 2;
    color: var(--white);
    font-size: 30px;
    font-weight: 500;
    line-height: 40px;
}

.text-info-block p {
    font-family: GeologicaLight;
    position: relative;
    z-index: 2;
    color: var(--white);
    font-size: 16px;
    font-weight: 200;
    line-height: 23px;
}

@media screen and (max-width: 1600px) {
    .text-info-block span {
        font-size: 24px;
    }
    .text-info-block p {
        font-size: 20px;
    }
}

@media screen and (max-width: 1200px) {
    .team-info {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }

    .team-info-center {
        grid-area: auto;
        border: none;
        padding: 0px;
    }

    .team-info-text {
        order: 3;
    }

    .team-info-center {
        height: 430px;
        /* padding: 0px 10px; */
    }

    .team-info-block .border{
        height: 230px
    }

    .team-info-block:nth-child(2) {
        height: 275px;
    }

    .team-info-block {
        height: 230px
    }

    .team-info-block .base-img {
        height: 230px;
        padding-right: 0px;
        border: none;
    }

    .text-info-block span {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }

    .text-info-block p {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
    }

    .team-info-center .img-container {
        padding-right: 0px;
    }

    .team-info-text.border {
        padding-bottom: 0px;
        border-bottom: none;
    }
}
</style>