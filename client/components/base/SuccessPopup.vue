<template>
    <div class="popup">
        <div class="popup-succes">
            <img src="@/assets/img/succes_btn.svg" alt="">
            <h4>Данные отправлены</h4>
            <p>С вами свяжутся в течении 30 минут</p>
            <NuxtLink @click="emit('close_popup')" :to="'/'">        
                <UIButton  class="popup-secces-btn">На главную</UIButton>
            </NuxtLink>   
        </div>
    </div>
</template>

<script setup>
const emit= defineEmits('close_popup')
</script>

<style>
.popup {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.popup-succes {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    gap: 20px
}

.popup-succes button {
    margin-top: 60px;
    width: 100%;
}

.popup-succes h4{
    font-weight: 500;
    margin-top: 40px;
}

.popup-succes p {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
}

</style>