<template >
    <section>
        <div class="container">
            <div class="text">
                <h2 v-if="year" class="text-year">{{ year }}</h2>
                <p class="text-subtitle">{{ subtitle }}</p>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    year: '',
    subtitle: ''
});

</script>

<style>

.text {
    /* display: flex;
    justify-content: space-between; */
    display:grid;
    grid-template-columns: 2fr 1fr;
    margin-bottom: 150px;
    margin-top: 150px;
}

.text-year{
    font-size: 110px;
    font-weight: 250;
}

.text-subtitle{
    grid-column-start: 2;
    font-size: 25px;
    font-weight: 250;
    line-height: 35px;
    max-width: 755px;
    padding-bottom: 20px;
    border-bottom: 1px solid #DFDFDF;
}
@media screen and (max-width: 1600px) {
    .text-year{
        font-size: 80px;
    }
    .text-subtitle{
        font-size: 20px;
    }
}

@media screen and (max-width: 1200px) {
    .text {
        flex-direction: column;
        gap: 20px;
        margin: 80px 0px;
    }

    .text h2 {
        font-size: 35px;
        font-weight: 250;
        line-height: 45px;
    }

    .text-subtitle {
        font-size: 16px;
        font-weight: 200;
        line-height: 23px;
        min-width: 340px;
        grid-column-start: 1;
    }
}

</style>