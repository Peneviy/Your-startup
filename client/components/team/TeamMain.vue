<template>
    <section id="bastion_main" class="bastion-header" >
        <div class="bg-main" :style="'background-image: url(' + background + ');'">
            <div class="container">
                <div class="main-content" >
                    <h1 class="main-content-title">{{ props?.title }}</h1>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    title: String,
    background: String
});

</script>

<style>
.bastion-header{
    height: 100vh;
    /* max-height: 900px; */
    position: relative;
    margin-top: 0;
    margin: 0 auto;
    margin-bottom: 150px;
}

.bg-main {
    position: relative;
    width: 100%;
    height: 100%;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
    background-color:rgba(0, 0, 0, 0.6);
    background-repeat:no-repeat;
    background-size: cover;
    background-position: center center;
}

.bg-main::before {
    content: '';
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    background: #000;
    opacity: 0.6;
}

@media screen and (min-width: 2000px){
    .bastion-header{
        max-width: 2000px;
        width: 100%;
        min-height: 0;
    }

    .bastion-header::after{
        position: absolute;
        left: 0px;
        width: 20px;
        height: 100%;
        top: 0;
        background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        content: '';
        z-index: 100;
    }

    .bastion-header::before{
        position: absolute;
        right: 0px;
        width: 20px;
        top: 0;
        height: 100%;
        background: linear-gradient(to left, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        content: '';
        z-index: 100;
    }
}

.container{
    height: 100%;
}

.main-content{
    height: 100%;
    padding-bottom: 40px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.main-content-title{
    position: relative;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(187, 187, 187, 1);
    margin-bottom: 0px;
    color: #ffffff;
    text-transform: uppercase;
    z-index: 1;
}

.main-content-title::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}

@media screen and (max-width: 1200px) {
    .bastion-header {
        margin-bottom: 80px;
    }
    .bg-main {
        height: 690px;
    }
    .main-content-title {
        font-size: 26px;
        font-weight: 500;
        line-height: 35px;
        margin: 20px 0;
    }

    .main-content-title::before {
        width: 95px;
        height: 15px;
        left: -20px;
    }
}

</style>