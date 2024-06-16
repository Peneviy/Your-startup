<template>
    <section id="fl_main" class="fl-header">
        <div class="bg-main" :style="'background-image: url(' + background + ');'">
            <div class="container">
                <div class="main-content" >
                    <h1 class="main-content-title-color">{{ props?.title }}</h1>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
const props = defineProps({
    title: String,
    link: String,
    background: String
});

</script>

<style>
.fl-header{
    height: 100vh;
    /* max-height: 900px; */
    position: relative;
    margin-top: 0;
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
    background-color:rgba(0, 0, 0, 0.6);
    background-repeat:no-repeat;
    background-size: cover;
    background-position: center center;
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
    .fl-header{
        max-width: 2000px;
        width: 100%;
        min-height: 0;
    }
    .fl-header::after{
        position: absolute;
        left: 0px;
        width: 20px;
        height: 100%;
        top: 0;
        background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0));
        content: '';
        z-index: 100;
    }

    .fl-header::before{
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
    padding-bottom: 60px;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
}

.main-content-title-color{
    position: relative;
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(187, 187, 187, 1);
    margin-bottom: 60px;
    color: #ffffff;
    text-transform: uppercase;
    z-index: 1;
}

.main-content-title-color::before {
    content: '';
    position: absolute;
    height: 43px;
    width: 320px;
    top: 0;
    left: -40px;
    background-color: var(--light-accent);
    z-index: -1;
}

@media screen and (max-width: 1700px) {
    #fl_main .main-content-title-color {
        font-size: 80px;
    }
}

@media screen and (max-width: 1200px) {
    .main-content-btn {
        width: 100%;
        max-width: 100%;
    }

    .fl-header {
        margin-bottom: 80px;
    }

    .main-content-title-color::before { 
        width: 95px; 
        height: 15px;
    }

    #fl_main .main-content-title-color {
        font-size: 35px;
        line-height: 45px;
    }

}
</style>