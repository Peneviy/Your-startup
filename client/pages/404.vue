<template>
    <section id="not-found">
        <div class="container">
            <div class="not-found-content">
                <div class="not-found-content-img">
                    <img src="@/assets/img/404.jpg" alt="">
                </div>
                <div class="not-found-content-text">
                    <h4>Извините, запрашиваемая вами страница не может быть найдена.</h4>
                    <p>Это может быть результатом:</p>
                    <ul>
                        <li>Опечатки в адресе URL</li>
                        <li>Устаревшей ссылки или удаленной страницы</li>
                        <li>Временных технических проблем</li>
                    </ul>
                    <UIButton link="/">На главную</UIButton>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

</script>

<style>
#not-found .container {
    padding-top: 135px;
}

.not-found-content {
    display: flex;
    justify-content: space-between;
    gap: 40px;
}

.not-found-content-img  {
    padding: 40px 117px 40px 77px;
    border-right: 1px solid var(--light-gray);
}

.not-found-content-img img {
    width: 100%;
    height: 100%;
}

.not-found-content-text h4 {
    font-weight: 500;
    margin-bottom: 40px;
}

.not-found-content-text p {
    font-weight: 500;
    margin-bottom: 10px;
}

.not-found-content-text ul {
    margin: 10px 0;
}

.not-found-content-text ul li {
    font-size: 25px;
    font-weight: 200;
    line-height: 35px;
    margin: 10px 0;
}

.not-found-content-text button{
    margin-top: 50px;
    padding: 20px 40px 20px 40px;
    font-size: 20px;
    font-weight: 500;
    line-height: 25px;
}

@media screen and (max-width:1200px) {
    .not-found-content {
        flex-direction: column;
        gap: 20px;
    }

    .not-found-content-img  {
        padding: 20px 38px 20px 38px;
        border-right: none;
        border-bottom: 1px solid var(--light-gray);
    }
    .not-found-content-text p {
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
        letter-spacing: -0.01em;
        margin-bottom: 20px;
    }
    .not-found-content-text ul li {
        font-size: 16px;
        font-weight: 200;
        line-height: 23px;
    }
    .not-found-content-text ul {
        padding: 0 0 0 20px;
    }
    .not-found-content-text h4 {
        font-weight: 500;
        margin-bottom: 20px;
    }
    .not-found-content-text button{
        margin-top: 30px;
        width: 100%;
        font-size: 16px;
        line-height: 20px;
    }
}
</style>