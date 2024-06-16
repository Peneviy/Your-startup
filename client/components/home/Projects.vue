<template>
    <section id="projects" ref="section">
        <div class="container">
            <h2 v-html="data?.title"></h2>
            <div class="projects-info">
                <div class="projects-info-block">
                    <nuxt-link to="/" class="projects-info-link">
                        <img src="@/assets/img/home-about.jpg" trigger=".projects-info"/>
                        <div class="project-title">
                            Лендинг<br>
                            по сертификации<br>
                            Expert Standart
                        </div>
                    </nuxt-link>
                </div>
                <div class="projects-info-block center">
                    <nuxt-link to="/" class="projects-info-link">
                        <img src="@/assets/img/home-about.jpg" trigger=".projects-info"/>
                        <div class="project-title">
                            Лендинг<br>
                            по сертификации<br>
                            Expert Standart
                        </div>
                    </nuxt-link>
                </div>
                <div class="projects-info-text border">
                    <h4>Посмотрите,<br>чем мы гордимся</h4>
                    <base-arrow-link :to="data?.link">
                        {{ data?.btn_text }}
                    </base-arrow-link>
                </div>
                <div class="projects-info-center">
                    <nuxt-link to="/" class="projects-info-link">
                        <img src="@/assets/img/home-about.jpg" trigger=".projects-info"/>
                        <div class="project-title">
                            Лендинг<br>
                            по сертификации<br>
                            Expert Standart
                        </div>
                    </nuxt-link>
                </div>
                <div class="projects-info-block top-padding">
                    <nuxt-link to="/" class="projects-info-link">
                        <img src="@/assets/img/home-about.jpg" trigger=".projects-info"/>
                        <div class="project-title">
                            Лендинг<br>
                            по сертификации<br>
                            Expert Standart
                        </div>
                    </nuxt-link>
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
.projects-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    column-gap: 40px;
}

.projects-info-center {
    grid-area: 2 / 1 / 3 / 3;
    height: 395px;
    padding-right: 40px;
    padding-top: 40px;
    border-right: 1px solid var(--dark-gray);
}

.projects-info-center img,
.projects-info-block img  {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.projects-info-block {
    height: 395px;
}

.projects-info-block.center {
    border-left: 1px solid var(--dark-gray);
    border-right: 1px solid var(--dark-gray);
    padding: 0 40px;
}

.projects-info-block.top-padding {
    padding-top: 40px;
}

.projects-info-text {
    line-height: 38px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.projects-info .border {
    border-bottom: 1px solid var(--dark-gray);
    padding-bottom: 40px;
}

.projects-info-link {
    position: relative;
}

.project-title {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    padding: 40px;
    font-size: 30px;
    font-weight: 500;
    line-height: 37px;
    letter-spacing: 0em;
    text-align: left;
    color: #FFF;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: flex-end;
}
</style>