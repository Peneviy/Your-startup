<template>
    <section id="showcase">
        <div class="container">
            <h2 v-html="data?.title"></h2>
            <div class="showcase-container">
                <div class="showcase-left">
                    <NuxtLink :to="data?.projects[0].link" class="showcase first-showcase">
                        <img :src="data?.projects[0].img" alt="">
                        <span v-html="data?.projects[0].title"></span>
                    </NuxtLink>
                    <NuxtLink :to="data?.projects[1].link" class="showcase">
                        <img :src="data?.projects[1].img" alt="">
                        <span v-html="data?.projects[1].title"></span>
                    </NuxtLink>
                    <NuxtLink :to="data?.projects[2].link" class="showcase">
                        <img :src="data?.projects[2].img" alt="">
                        <span v-html="data?.projects[2].title"></span>
                    </NuxtLink>
                </div>
                <div class="showcase-right">
                    <div class="other-projects">
                        <h4 v-html="data?.subtitle"></h4>
                        <base-arrow-link to="/cases">
                                {{ data?.   btn_text }}
                        </base-arrow-link>
                    </div>
                    <NuxtLink :to="data?.projects[3].link" class="showcase">
                        <img :src="data?.projects[3].img" alt="">
                        <span v-html="data?.projects[3].title"></span>
                    </NuxtLink>
                </div>
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
    .showcase-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr)
    }

    .showcase-left {
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding-right: 40px;
        border-right: 1px solid var(--gray); 
        grid-column: 1 / span 2;
        gap: 40px;
        box-sizing: border-box;
    }

    .showcase:last-of-type {
        grid-column: 1 / span 2;
    }

    .showcase {
        display: block;
        height: 389px;
        position: relative;
    }

    .showcase::after {
        content: '';
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 100%;
        background: rgba(42, 42, 42, 0.6);
    }

    .showcase span {
        position: absolute;
        width: calc(100% - 40px);
        height: auto;
        left: 20px;
        bottom: 20px;
        font-size: 30px;
        font-weight: 500;
        line-height: 40px;
        color: var(--white);
        z-index: 10;
        transition: 0.5s;
    }

    .showcase:hover span {
        color: var(--light-accent);
    }

    .showcase img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
    }

    .showcase-right {
        padding-left: 40px;
    }
    
    .other-projects {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-bottom: 40px;
        margin-bottom: 40px;
        border-bottom: 1px solid var(--light-gray);
        height: calc(50% - 20px);
    }

    @media screen and (max-width: 1600px){
        .showcase span {
            font-size: 26px;
        }
    }

    @media screen and (max-width: 1200px) {
        .showcase-container {
            grid-template-columns: 1fr;
            gap: 0px;
        }

        .showcase-left {
            padding-right: 0px;
            grid-template-columns: 1fr;
            padding-bottom: 20px;
            gap: 20px;
        }

        .showcase-left .showcase:last-of-type {
            padding-top: 20px;
            border-top: 1px solid var(--light-gray);
        }

        .showcase-left .showcase:last-of-type::after {
            top: 20px;
            height: calc(100% - 20px);
        }

        .showcase:last-of-type {
            grid-column: auto;
            padding-top: 0px;
            border-top: 0px;
            height: 230px;
        }

        .showcase:last-of-type::after {
            height: 100%;
            top: 0px
        }

        .showcase-right {
            padding-left: 0px;
            padding-top: 20px;
            border-top: 1px solid var(--light-gray)
        }

        .showcase {
            height: 250px;
            padding-top: 20px;
            border-top: 1px solid var(--light-gray);
        }

        .showcase::after {
            height: calc(100% - 20px);
            top: 20px;
        }

        .other-projects {
            display: none;
        }

        .first-showcase {
            height: 230px;
            border-top: none;
            padding-top: 0px;
        }

        .first-showcase::after {
            top: 0px;
            height: 100%;
        }

        .showcase span {
            font-size: 16px;
            font-weight: 500;
            line-height: 20px;
        }

        #showcase .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        #showcase h4 {
            margin-bottom: 20px;
        }

        #showcase h2 {
            margin-bottom: 0px;
        }
    }
</style>