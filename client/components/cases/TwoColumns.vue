<template>
    <section :style="{ 'background-color': color }" class="two-column" id="museum">
        <div class="container">
            <img :src="props?.first_img" alt="">
            <img :src="props?.second_img" alt="">
        </div>
    </section>
</template>
<script setup>
    const props = defineProps({
        first_img: '',
        second_img: ''
    })
</script>
<style>
    .two-column {
        background: var(--black);
        margin-bottom: 150px;
    }

    .two-column .container {
        display: flex;
        flex-direction: row;
        gap: 40px;
        width: 100%;
        max-width: 1300px;
    }

    .two-column .container img {
        width: calc(50% - 20px);
        height: auto;
        object-fit: contain;
        object-position: left top;
    }

    @media screen and (max-width: 1300px) {
        .two-column .container {
            max-width: 1160px;
        }
    }

    @media screen and (max-width: 1200px) {
        .two-column .container {
            flex-direction: column;
        }

        .two-column {
            margin-bottom: 80px;
        }

        .two-column .container img {
            width: 100%;
        }
    }
</style>
