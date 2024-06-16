<template>
    <div class="form" :class="popup ? 'popup-form' : ''">
        <img v-if="popup != true" class="logo-form" src="@/assets/img/logo.svg" alt="">
        <n-form
            ref="formRef"
            :model="model"
            :rules="rules"
        >
            <n-form-item  
                path="name"
            >
                <n-input
                    type="text"
                    :allow-input="onlyLetters"
                    placeholder="Имя"
                    v-model:value="model.name"
                />
            </n-form-item

            >
            <n-form-item 
                v-if="is_services"
                :label-style="{ opacity }"
                path="services"
            >
                <n-select 
                    :options="options" 
                    placeholder="Услуга"
                    v-model:value="model.services"
                />
            </n-form-item>
            <n-form-item 
                :label-style="{ opacity }"
                path="phoneEmail" 
            >
                <n-input
                    @input="replaceForEmail"
                    v-model:value="model.phoneEmail"
                    type="text"
                    placeholder="Телефон или e-mail"
                />
            </n-form-item>
            <n-form-item v-if="popup">
                <n-upload
                    :default-file-list="defaultFileList"
                    v-model:file-list="fileList"
                >
                    <n-button>
                        Техническое задание
                        <img src="@/assets/img/PaperClipOutlined.svg" alt="">
                    </n-button>
                </n-upload>
            </n-form-item>
            <div class="approval">
                Нажима на кнопку, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
            </div>
            <UIButton @click="submit">Отправить</UIButton>
            
        </n-form>
    </div>
</template>
<script setup>
import axios from 'axios'
import { replaceNumberForPasteEmail, validateEmail } from '@/assets/js/helper.js'
import {
    NForm,
    NFormItem,
    NInput,
    NSelect,
    NUpload,
    NButton
} from "naive-ui";
    const pattern = /^[а-яА-ЯЁёa-zA-Z@]*$/g;
    const pattern_phone = /^(?=.*[0-9])[- +()0-9]+$/;
    const opacity = ref(1);
    const formRef = ref(null)
    const model = ref({
        name: "",
        services: null,
        message: "",
        phoneEmail: "",
    });
    const emit = defineEmits(["submit_form"]);
    const fileList = ref([])
    const props = defineProps({
        popup: true,
        curent_service: null,
        is_services: false,
        answer: null,
        price: Number
    })
    const rules = {
        name: {
            required: true,
            message: "Обязательное поле",
            trigger: ["input", "blur"],
        },
        services: {
            required: true,
            message: "Обязательное поле",
            trigger: ["input", "blur"],
        },
        phoneEmail: {
            required: true,
            trigger: ["input", "blur"],
            validator(rule, value) {
                if (!value) {
                    return new Error("введите номер телефона или почту");
                }
                if (value.match(pattern_phone) == null) {
                    if (!validateEmail(value)) {
                        value.replace(/[\(\)\s]/g,"");
                        return new Error("введите существующую почту");
                    }
                } else {
                    model.value.phoneEmail = replaceNumberForPasteEmail(value);
                    if (value.length < 18) {
                        return new Error("введите существующий телефон");
                    }
                }
            },
        },
    };

    const options = ref(
        [
            {
            label: "Старт",
            value: 'Start',
            },
            {
            label: 'Стандарт',
            value: 'Standart'
            },
            {
            label: 'Премиум',
            value: 'Premium'
            },
        ]
    )

    function submit(e) {
        e.preventDefault();
        formRef.value?.validate((errors) => {
          if (!errors) {
            let data = new FormData();

            if (props.popup == true) {
                fileList.value.forEach((element, index) => {
                    data.append('file' + (index + 1), element.file);
                });
                data.append('name', model.value.name);
                data.append('phoneEmail', model.value.phoneEmail);
                data.append('answer', props.answer);
                data.append('price', props.price);

                let config = {
                    method: 'post',
                    maxBodyLength: Infinity,
                    url: 'https://your-startup.space/v1/methods/createOrder',
                    headers: {
                        "Content-type": 'multipart/form-data'
                    },
                    data: data
                };

                axios.request(config).then((response) => {
                    if (response.data.success) {
                        model.value.name = ''
                        model.value.services = ''
                        model.value.phoneEmail = ''
                        emit("submit_form");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
            } else {
                data.append('name', model.value.name);
                data.append('service', model.value.services);
                data.append('phoneEmail', model.value.phoneEmail);
                

                let config = {
                    method: 'post',
                    maxBodyLength: Infinity,
                    url: 'https://your-startup.space/v1/methods/createOrder',
                    headers: {
                        "Content-type": 'multipart/form-data'
                    },
                    data: data
                };

                axios.request(config).then((response) => {
                    if (response.data.success) {
                        model.value.name = ''
                        model.value.services = ''
                        model.value.phoneEmail = ''
                        emit("submit_form");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
            }

            
          } else {

          }
        })
    }

    function onlyLetters(value) { 
        if (!value || /^[а-яА-ЯЁё ]*$/g.test(value)) {
            return true;
        } else {
            return false;
        }
    }


    onMounted(() => {
        if (props.curent_service) {
            model.value.services = props.curent_service;
        }
    })
</script>
<style>
    .popup-form {
        max-width: 620px;
    }

    .n-upload-file-list {
        max-height: 132px;
        height: max-content;
        overflow-y: auto;
    }

    .n-upload-file-info__action .n-upload-file-info__action--text-type .n-button {
        height: 100%;
    }
    
    .form .n-select.no-holder::before {
        position: absolute;
        z-index: 10;
        top: 50%;
        left: 16px;
        transform: translateY(-50%);
        content: 'Услуга';
        color: rgba(194, 194, 194, 1);
        font-family: inherit;
        line-height: 1.5;
        font-size: 14px;
    }

    .n-form-item {
        margin-top: -24px;
    }
    @media screen  and (max-width: 1200px){
        
    }
</style>