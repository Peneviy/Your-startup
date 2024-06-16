<template>
    <n-modal class="popup" v-model:show="show" :mask-closable="false" :on-after-leave="svg_close" preset="dialog">
        <div class="popup-container container">
            <n-carousel 
                effect="custom" 
                :transition-props="{ name: 'creative' }" 
                :show-arrow=false
                style="width: 100%; height: 100%" 
                :loop="false" 
                :draggable="false"
                ref="carousel"
                :on-update:current-index="(i) => { index = i }" 
                :current-index=index
            >
                <div class="quiz-slide" v-for="question, question_index in questions"
                    :class="index == question_index ? 'active' : ''"
                >
                    <div class="quiz-container" v-if="!question?.has_variants">
                        <div class="quiz-content-lef">
                            <span class="quiz-title">{{ question.title }}</span>
                            <div class="current-page-mobile">
                                <span>{{ index + 1 }}</span>/6
                            </div>
                            <div class="quiz-inputs" v-if="question.is_multiple">
                                <n-checkbox v-for="answer, answer_index in question.answers"
                                    :label="answer?.name" 
                                    :name="'answer-' + question_index + '-' + answer_index" 
                                    :id="'id-' + question_index + '-' + answer_index"
                                    :checked="user_answers[question_index].find((user_answer) => user_answer == answer_index) != undefined"
                                    @update:checked="updateAnswers(answer_index, question_index)" 
                                />
                            </div>
                            <div class="quiz-inputs" v-else>
                                <n-radio-group v-model:value="user_answers[question_index]" :name="'rg-' + question_index">
                                    <n-radio v-for="answer, answer_index in question.answers" 
                                        :label="answer?.name"
                                        :name="'answer-' + question_index + '-' + answer_index" 
                                        :id="'id-' + question_index + '-' + answer_index"
                                        :value="answer_index"
                                        @change="updateAnswers(answer_index, question_index)" 
                                    />
                                </n-radio-group>
                            </div>
                        </div>
                        <div class="quiz-img">
                            <img src="@/assets/img/quiz1.png" alt="">
                            <div class="quiz-img-bg"></div>
                        </div>
                    </div>
                    <div class="quiz-container" v-else>
                        <div class="quiz-content-lef">
                            <span class="quiz-title">{{ question.variants[getAnswersVariant(question_index)].title }}</span>
                            <div class="current-page-mobile">
                                <span>{{ index + 1 }}</span>/6
                            </div>
                            <div class="quiz-inputs" v-if="question.variants[getAnswersVariant(question_index)].is_multiple">
                                <n-checkbox v-for="answer, answer_index in getAnswers(question_index)"
                                    :label="answer?.name" 
                                    :name="'answer-' + question_index + '-' + answer_index" 
                                    :id="'id-' + question_index + '-' + answer_index"
                                    :checked="user_answers[question_index].find((user_answer) => user_answer == answer_index) != undefined"
                                    @update:checked="updateAnswers(answer_index, question_index)" 
                                />
                            </div>
                            <div class="quiz-inputs" v-else>
                                <n-radio-group v-model:value="user_answers[question_index]" :name="'rg-' + question_index">
                                    <n-radio v-for="answer, answer_index in getAnswers(question_index)" 
                                        :label="answer?.name"
                                        :name="'answer-' + question_index + '-' + answer_index" 
                                        :id="'id-' + question_index + '-' + answer_index"
                                        :value="answer_index"
                                        @change="updateAnswers(answer_index, question_index)" 
                                    />
                                </n-radio-group>
                            </div>
                        </div>
                        <div class="quiz-img">
                            <img src="@/assets/img/quiz1.png" alt="">
                            <div class="quiz-img-bg"></div>
                        </div>
                    </div>
                    <div class="bottom-quiz">
                        <div class="current-page">
                            <span>{{ index + 1 }}</span>/6
                        </div>
                        <div class="quiz-btns">
                            <UIButton @click="carousel.next()" :disabled="is_disabled" class="quiz-btns-mobile">Далее</UIButton>
                            <UIButton @click="carousel.prev()" v-if="index != 0" :type="'line'">Вернуться назад</UIButton>
                            <UIButton @click="carousel.next()" :disabled="is_disabled" class="quiz-btns-pc">Далее</UIButton>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide container" :class="index == 5 ? 'active' : ''">
                    <div class="quiz-container">
                        <div class="quiz-content-lef">
                            <span class="quiz-title">Предварительная стоимость</span>
                            <div class="price-list">
                                <div class="price">
                                    <span>Предварительная стоимость</span>
                                    <span class="cena">{{ price }}₽</span>
                                    <div class="quiz__content-include">
                                        В разработку входит:
                                        <div class="quiz__content-include-list">
                                            <template v-for="user_answer, question_index in user_answers">
                                                <div v-if="!Array.isArray(user_answer)" class="quiz__content-include-list-item">
                                                    {{ getAnswer(question_index, user_answer)?.name }}
                                                </div>
                                                <template v-else>
                                                    <div v-for="item in user_answer" class="quiz__content-include-list-item">
                                                        {{ getAnswer(question_index, item)?.name }}
                                                    </div>
                                                </template>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quiz-img">
                            <img src="@/assets/img/quiz1.png" alt="">
                            <div class="quiz-img-bg"></div>
                        </div>
                    </div>
                    <div class="bottom-quiz">
                        <div class="current-page">
                            <span v-if="index != 6">{{ index + 1 }}</span>/6
                        </div>
                        <div class="quiz-btns">
                            <UIButton @click="carousel.prev()" :type="'line'">Вернуться назад</UIButton>
                            <UIButton @click="carousel.next()">Получить подарок</UIButton>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide container" :class="index == 6 ? 'active' : ''">
                    <div class="quiz-container">
                        <div class="quiz-content-lef">
                            <span class="form-title">Заполните форму</span>
                            <p class="form-desc">Наши специалисты детально рассмотрят заявку, посчитают точную стоимость
                                и подготовят
                                коммерческое предложение с учетом подарка.</p>
                            <BaseForm :popup="true" :answer="result" :price="price" @submit_form="send"></BaseForm>
                            <UIButton class="form-back" @click="carousel.prev()" :type="'line'">Вернуться назад</UIButton>
                        </div>
                        <div class="quiz-img">
                            <img src="@/assets/img/quiz1.png" alt="">
                            <div class="quiz-img-bg"></div>
                        </div>
                    </div>
                </div>

                <div class="quiz-slide container" :class="index == 7 ? 'active' : ''">
                    <div class="quiz-succes">
                        <img src="@/assets/img/succes_btn.svg" alt="">
                        <p class="succes-text">С вами свяжутся в течении 30 минут, чтобы подтвердить получение подарка
                        </p>
                        <NuxtLink :to="'/'" @click="closeQuiz">        
                            <UIButton>На главную</UIButton>
                         </NuxtLink>
                    </div>
                </div>
            </n-carousel>
        </div>
    </n-modal>
</template>
<script setup>
import { NCarousel, NCheckbox, NRadio, NRadioGroup, NCheckboxGroup, NModal } from 'naive-ui';
import { numberWithSpaces } from "@/assets/js/helper.js";
const carousel = ref(null);
const scroll_position = useState('scrollbar');
const index = ref(0);

function send() {
    // После успешной отправки
    carousel.value.next();
}

const show = defineModel('show');

const questions = [
    // 1 вопрос
    {
        title: "Какая услуга вам необходима?",
        is_multiple: false,
        answers: [
            { name: "Лендинг", type: 'base', value: 32, answer_relation: 'site' },
            { name: "Сайт-визитка", type: 'base', value: 128, answer_relation: 'site' },
            { name: "Интернет-магазин", type: 'base', value: 224, answer_relation: 'site' },
            { name: "Корпоративный", type: 'base', value: 240, answer_relation: 'site' },
            { name: "Индивидульное решение", type: 'base', value: 320, answer_relation: 'site' },
            { name: "Мобильное приложение", type: 'base', value: 320, answer_relation: 'app' },
        ],
    },

    // 2 вопрос
    {
        title: "Что необходимо разработать в дизайне?",
        is_multiple: true,
        answers: [
            { name: "Логотип", type: '+', value: 19200 },
            { name: "Брендбук", type: '+', value: 96000 },
            { name: "Дизайн", type: '*', value: 1.8 },
            { name: "Анимации", type: '*', value: 1.2 },
            { name: "Есть готовый дизайн", is_once: true, type: 'none' },
        ],
    },

    // 3 вопрос
    {
        has_variants: true,
        question_relation: 0,
        default_variant: 'site',
        variants: {
            site: {
                title: "Какая CMS должна быть у сайта?",
                is_multiple: false,
                answers: [
                    { name: "1С Битрикс", type: '*', value: 1.2 },
                    { name: "WordPress", type: '*', value: 1 },
                    { name: "Другая CMS", type: '*', value: 1.5 },
                    { name: "Фреймворки (Laravel, Yii, Django и т.д.)", type: '*', value: 1.8 },
                    { name: "Нативная разработка (самописный сайт)", type: '*', value: 2 },
                ],
            },
            app: {
                title: "Платформа мобильного приложения",
                is_multiple: false,
                answers: [
                    { name: "Android", type: '*', value: 1.8 },
                    { name: "IOS", type: '*', value: 1.8 },
                    { name: "Кроссплатформа (Flatter)", type: '*', value: 2.1 },
                    { name: "PWA", type: '*', value: 1.2 },
                ],
            },
        }
    },

    // 4 вопрос
    {
        title: "Медиа продакшен",
        is_multiple: true,
        answers: [
            { name: "Фотосъемка", type: '+', value: 19200 },
            { name: "Видеосъемка", type: '+', value: 19200 },
            { name: "Копирайтер", type: '*', value: 1.1 },
            { name: "Есть свои материалы", is_once: true, type: 'none' },
        ],
    },

    // 5 вопрос
    {
        title: "Дополнительный функционал ",
        is_multiple: true,
        answers: [
            { name: "Онлайн оплата", type: '+', value: 28800 },
            { name: "Интеграция с CRM системами", type: '+', value: 19200 },
            { name: "Телеграмм бот", type: '+', value: 19200 },
            { name: "Система бронирования", type: '+', value: 96000 },
            { name: "Онлайн рассылка", type: '+', value: 9600 },
            { name: "Интеграция с Базами данных (1С, Мой склад, Дебет Плюс и т.д.)", type: '+', value: 96000 },
            { name: "Интеграция с системой доставки (СДЭК, Деловые линии, dpd и т.д.)", type: '+', value: 48000 },
            { name: "Написания своей API для интеграции", type: '*', value: 1.5 },
        ],
    },
];

function svg_close(){
    if (index.value == questions.length + 2){
        closeQuiz()
    }
}

const user_answers = reactive([]);

for (let i = 0; i < questions.length; i++) {
    if (questions[i]?.is_multiple) {
        user_answers.push([]);
    } else {
        user_answers.push(null);
    }
}

function closeQuiz() {
    show.value = false;

    setTimeout(() => {
        index.value = 0;

        user_answers.forEach((answer, key) => {
            if (Array.isArray(answer)) {
                user_answers[key] = [];
            } else {
                user_answers[key] = null;
            }
        });
    }, 800);

    scroll_position.value.scrollTo({
        top: 0,
    });
}

function getAnswersVariant(question_index) {
    const question = questions[question_index];

    if (user_answers[question.question_relation]) {
        const variant_index = user_answers[question.question_relation];
        return questions[question.question_relation].answers[variant_index].answer_relation;
    }

    return question.default_variant;
}

function getAnswers(question_index) {
    const question = questions[question_index];

    if (question?.has_variants) {
        const variant = getAnswersVariant(question_index);
        
        return question.variants[variant].answers;
    } else {
        return question.answers;
    }
}

function getAnswer(question_index, answer_index) {
    const answers = getAnswers(question_index);

    return answers[answer_index];
}

function updateAnswers(new_value, question_index) {
    // Проверка исключающих значений
  
    const answer = getAnswer(question_index, new_value);

    if (Array.isArray(user_answers[question_index])) {
        const has_onse  = answer?.is_once;
        const had_value = user_answers[question_index].find((answer) => answer == new_value);

        if (has_onse == true) {
            if (!had_value) {
                user_answers[question_index] = [new_value];
            } else {
                user_answers[question_index] = [];
            }
        } else {
            const answers = getAnswers(question_index);
            const is_once = answers.findIndex((answer) => answer.is_once == true);

            user_answers[question_index] = user_answers[question_index].filter((answer) => answer != is_once);

            if (!had_value) {
                user_answers[question_index].push(new_value);
            } else { 
                user_answers[question_index] = user_answers[question_index].filter((answer) => answer != new_value);
            }
        }
    } else {
        user_answers[question_index] = new_value;
    }
}

const price = computed(() => {
    let result = 0;
    let base = 0;

    user_answers.forEach((user_answer, question_index) => {
        if (Array.isArray(user_answer) && user_answer.length > 0) {
            user_answer.forEach(answer_index => {
                const answer = getAnswer(question_index, answer_index);

                result += calc(base, answer.type, answer.value)
                if (answer.type == 'base') {
                    base = result;
                }
            })
        } else if (!Array.isArray(user_answer) && user_answer) {
            const answer = getAnswer(question_index, user_answer);

            result += calc(base, answer.type, answer.value)
            if (answer.type == 'base') {
                base = result;
            }
        }
    });

    return numberWithSpaces(result);
});

function calc(base, type, value) {
    let result = 0;

    switch (type) {
        case 'base':
            result = value * 2400;
            break;
        case '+':
            result = value;
            break;

        case '*':
            result = base * value - base;
            break;

        default:
            break;
    }

    return result;
}

const is_disabled = computed(() => {
    if (index.value == 4) {
        return false
    }

    const current_answer = user_answers[index.value];

    let result = false;

    if (Array.isArray(current_answer)) {
        result = !Boolean(current_answer.length > 0);
    } else {
        result = !Boolean(current_answer != null);
    }

    return result;
});

/* <div class="quiz__content-include-list">
    <template v-for="user_answer, question_index in user_answers">
        <div v-if="!Array.isArray(user_answer)" class="quiz__content-include-list-item">
            {{ getAnswer(question_index, user_answer)?.name }}
        </div>
        <template v-else>
            <div v-for="item in user_answer" class="quiz__content-include-list-item">
                {{ getAnswer(question_index, item)?.name }}
            </div>
        </template>
    </template>
</div> */

const result = computed(() => {
    let result = "";

    user_answers.forEach((user_answer, question_index) => {
        if (!Array.isArray(user_answer)) {
            result += getAnswer(question_index, user_answer)?.name + '\n';
        } else {
            user_answer.forEach((item) => {
                result += getAnswer(question_index, item)?.name + '\n';
            })
        }
    });

    return result;
})

function close() {
    
}
</script>
<style>
.n-dialog .n-dialog__content.n-dialog__content--last {
    width: 100%;
}
.popup.open {
    opacity: 1;
    pointer-events: all;
}

.popup .popup-container,
.popup .quiz-succes {
    position: relative;
    max-height: 90vh;
    width: 100%;
    margin: auto 0px;
}

.popup .popup-container.container {
    margin: 0px auto;
    height: calc(100vh - 28px);
    max-height: calc(100vh - 28px);
    padding: 0;
}

.popup .quiz-succes {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 20px
}

.quiz-btns-mobile {
    display: none;
}
.current-page-mobile{
    display: none;
}

.popup .quiz-succes p {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.popup .quiz-succes button {
    margin-top: 40px;
}

.popup .carousel-img {
    width: 100%;
    height: 240px;
    object-fit: cover;
}

.popup .bottom-quiz {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center
}

.popup .quiz-btns {
    z-index: 200;
    display: flex;
    flex-direction: row;
    gap: 20px;
}

.popup .current-page {
    font-size: 30px;
    font-weight: 500;
    line-height: 40px;
}

.popup .current-page span {
    color: var(--accent);
}

.popup .quiz-container {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.popup .quiz-slide {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 60px;
    height: 100%;
    margin: auto;
    width: 100%;
    padding-bottom: 20px;
}

.popup .quiz-img {
    width: 444px;
    height: 444px;
    position: relative;
}

.popup .quiz-img-bg {
    background: var(--light-gray);
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 50%;
}

.popup .quiz-img img {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 0px;
    width: 485px;
    height: auto;
}

.popup .quiz-title {
    font-size: 60px;
    font-weight: 500;
    line-height: 70px;
}

.popup .quiz-content-lef {
    display: flex;
    flex-direction: column;
    gap: 60px;
}

.popup .quiz-inputs {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.popup .n-carousel__slide {
    display: flex;
    align-items: center;
    justify-content: center;
}

.popup .n-carousel__slides>div {
    overflow-y: auto;
    padding-right: 20px
}

.popup * {
    scrollbar-width: thin;
    scrollbar-color: rgba(0, 0, 0, 0.25) transparent;
}

.popup .n-carousel__slides>div::-webkit-scrollbar {
    width: 5px;
}

.popup .n-carousel__slides>div::-webkit-scrollbar-thumb {
    width: 10px;
    border-radius: 5px;
    background: rgba(0, 0, 0, 0.25);
    border: 4px solid transparent;
}

.popup .n-carousel.n-carousel--usercontrol .n-carousel__slides>div:has(.active) {
    z-index: 1000;
    opacity: 1;
    scale: 1;
}

.popup .n-checkbox .n-checkbox__label {
    font-family: Geologica;
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.popup .n-checkbox .n-checkbox-box {
    width: 27px;
    height: 27px;
}

.popup .n-checkbox {
    display: flex;
    align-items: center;
    gap: 22px;
}

.popup .n-radio-group {
    display: flex;
    flex-direction: column;
    gap: 40px;
}

.popup .n-radio .n-radio__label {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.popup .n-radio {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 20px;
}

.popup .n-radio .n-radio__dot-wrapper,
.popup .n-radio .n-radio__dot.n-radio__dot--checked,
.popup .n-radio .n-radio__dot {
    width: 27px;
    height: 27px;
}

.popup .quiz__content-include {
    display: flex;
    flex-direction: column;
    gap: 20px;
    font-size: 25px;
    font-weight: 500;
    line-height: 35px;
}

.popup .quiz__content-include-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px 40px;
}

.popup .quiz__content-include-list-item {
    font-size: 23px;
    font-weight: 200;
    line-height: 25px;
    display: flex;
    flex-direction: row;
    gap: 5px;
    padding: 10px;
    border: 1px solid var(--accent);
}

.popup .price {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.popup .price span {
    color: var(--dark-gray);
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.popup .price span.cena {
    color: var(--accent);
    font-size: 60px;
    font-weight: 500;
    line-height: 70px;
    margin-bottom: 20px;
}

.popup .n-upload .n-upload-trigger {
    width: 100%;
}

.popup .n-upload .n-button {
    width: 100%;
    height: 56px;
}

.popup .n-upload .n-button__content {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    width: 100%;
    font-size: 16px;
    font-weight: 200;
    line-height: 23px;
    color: var(--dark-gray);
}

.popup .popup-form .approval {
    margin-top: 30px;
}

.popup .popup-form button.custom-btn {
    width: 100%;
    margin-top: 60px;
}

.popup .n-carousel.n-carousel--usercontrol .n-carousel__slides>div {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
    padding: 0px;
    opacity: 0;
    scale: 0.8;
    transition: 0.5s;
}

.popup .quiz-content-lef {
    max-width: 61%;
}

.popup .form-title {
    font-size: 60px;
    font-weight: 500;
    line-height: 70px;
}

.popup.form-desc {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

.popup .n-dialog__close {
    position: absolute;
    right: 40px;
    top: 40px;
    width: 32px;
    height: 32px;
    cursor: pointer;
    display: block;
    z-index: 2000;
    margin: 0px;
}

.popup .n-base-close::before {
    width: 32px;
    height: 32px;
}

.popup .n-carousel .n-carousel__slides .n-carousel__slide {
    overflow-y: auto;
    display: flex;
    align-items: flex-start;
}

.n-dialog.popup {
    width: 100vw;
    max-width: 1920px;
    height: 100vh;
    max-height: 100vh;
    box-shadow: none;
}

.n-modal-mask {
    background-color: var(--white);
}

.popup .n-dialog__title {
    display: none;
}

.popup .n-base-icon svg,
.popup .n-base-icon {
    width: 32px;
    height: 32px;
}

.quiz-btns .custom-btn {
    font-size: 25px;
    padding: 20px 40px;
}

.quiz-slide .custom-btn.line {
    width: 620px;
}

.form-back {
    margin-top: -40px;
}
@media screen and (max-width: 1200px) {
    .current-page-mobile{
        display: block;
        font-family: Unbounded;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }
    .popup .quiz-content-lef {
        max-width: 100%;
    }
    .popup .current-page-mobile span {
        color: var(--accent);
    }
    .current-page{
        display: none;
    }
    .popup .quiz-img-bg {
        display: none;
    }
    .popup .quiz-img {
        display: none;
    }
    .popup .quiz-title {
        font-family: Unbounded;
        font-size: 20px;
        font-weight: 500;
        line-height: 30px;
    }
    .popup .n-radio .n-radio__label {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
    }
    .popup .quiz-btns {
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }
    .quiz-btns .custom-btn {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
    }
    .quiz-btns-mobile {
        display: block;
    }
    .quiz-btns-pc{
        display: none;
    }
    .popup .n-checkbox .n-checkbox__label {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
    }
    .popup .price span {
        font-family: Geologica;
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
    }
    .popup .price span.cena {
        font-family: Unbounded;
        font-size: 20px;
        font-weight: 500;
        line-height: 30px;
    }

    .popup .quiz__content-include {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
        letter-spacing: -0.01em;
    }

    .popup .quiz__content-include-list-item {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
    }

    .popup .form-title {
        font-family: Unbounded;
        font-size: 20px;
        font-weight: 500;
        line-height: 30px;
    }

    .popup .form-desc {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
        letter-spacing: -0.01em;
    }

    .popup .quiz-content-lef {
        gap: 40px;
    }
    .popup .popup-form .approval {
        margin-top: 0px;
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        letter-spacing: -0.01em;
    }

    .quiz-slide .custom-btn.line {
        width: 100%;
    }

    .form-back {
        margin-top: -20px;
    }
}

</style>