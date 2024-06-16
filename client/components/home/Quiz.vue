<template>
    <section id="quiz">
        <div class="container">
            <h2>
                Оцените ваш<br>
                проект
            </h2>
            <div class="quiz-info">
                <div class="quiz-info-block border">
                    <h4>Оценка проекта в несколько шагов</h4>
                </div>
                <div class="quiz-info-block">
                    <div class="quiz-info-text">
                        <div class="quiz-info-text-content">
                            Ответьте на вопросы и получите 2 дополнительных месяца поддержки бесплатно!
                        </div>
                        <UIButton @click="open">Оценить</UIButton>
                    </div>
                </div>
                <div class="quiz-info-block quiz-content">
                    <div class="quiz-bg"></div>
                    <img src="@/assets/img/quiz1.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <BaseQuizPopup v-model:show="open_quize"/>
</template>

<script setup>
    const open_quize = ref(false);

    function open() {
        open_quize.value = true;
    }
</script>

<style>
.quiz-info {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 1fr);
    gap: 40px;
}

.quiz-content {
    position: relative;
    border-left: 1px solid var(--dark-gray); 
    padding-left: 40px;
    grid-area: 1 / 2 / 3 / 4;
}

.quiz-content img {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 856px;
    height: auto;
    transform: translateX(-50%) translateY(-50%);
}

.quiz-info .border {
    border-bottom: 1px solid var(--dark-gray);
    padding-bottom: 40px;
}

.quiz-bg {
    height: 650px;
    aspect-ratio: 1 / 1;
    background-color: var(--light-gray);
    margin: 0 auto;
    border-radius: 50%;
}

.quiz-info-text {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.quiz-info-text-content {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

@media screen and (max-width: 1600px) {
    .quiz-info-text-content {
        font-size: 20px;
    }
}

@media screen and (max-width: 1200px) {
    .quiz-info {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
        gap: 20px;
    }

    .quiz-content {
        grid-area: auto;
        padding-left: 0px;
        border: none;
    }

    .quiz-bg {
        height: auto;
        width: 100%;
    }

    .quiz-content img {
        width: 100%;
    }

    .quiz-info-block:nth-child(2) {
        order: 2;
        padding-top: 20px;
        border-top: 1px solid var(--dark-gray)
    }

    .quiz-info-block h3 {
        font-size: 18px;
        font-weight: 400;
        line-height: 25px;
        padding: 0px
    }

    .quiz-info .border {
        padding-bottom: 20px;
    }

    .quiz-info-text {
        flex-direction: column;
        gap: 40px;
    }

    .quiz-info-text-content {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
    }
}
</style>