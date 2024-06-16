<template>
    <footer>
        <div class="container footer-content">
            <div class="footer-block">
                <div class="footer-contacts">
                    <div class="footer-contacts-top">
                        <div class="footer-address">
                            <span>Город Ярославль</span>
                            <span>Улица Победы, д. 35/52</span>
                        </div>
                        <div class="footer-contact-links">
                            <a href="tel:+7 (992) 100 99 01">+7 (992) 100 99 01</a>
                            <a href="mailto:info@your-startup.space">info@your-startup.space</a>
                        </div>
                    </div>
                    <div class="footer-social">
                        <a href="https://vk.com/your__startup" target="_blank">
                            <svg width="22" height="14" viewBox="0 0 22 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.9825 14C4.46596 14 0.178638 8.74474 0 0H3.76515C3.88882 6.41842 6.66459 9.13714 8.86321 9.6977V0H12.4085V5.53553C14.5796 5.2973 16.8607 2.77477 17.6302 0H21.1755C20.8855 1.43908 20.3075 2.80165 19.4776 4.0025C18.6477 5.20335 17.5837 6.21663 16.3523 6.97898C17.7269 7.67555 18.941 8.6615 19.9145 9.87175C20.888 11.082 21.5988 12.489 22 14H18.0974C17.7373 12.6876 17.0054 11.5128 15.9934 10.6228C14.9814 9.73284 13.7343 9.16727 12.4085 8.997V14H11.9825Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="https://t.me/yourstartup_space" target="_blank">
                            <svg width="19" height="17" viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 0.602225L15.9946 16.2923C15.9946 16.2923 15.5741 17.3801 14.4189 16.8584L7.48458 11.3526L7.45242 11.3364C8.38909 10.4654 15.6524 3.70266 15.9698 3.39612C16.4613 2.92136 16.1562 2.63873 15.5856 2.99736L4.85679 10.053L0.717638 8.61077C0.717638 8.61077 0.0662573 8.37083 0.00359284 7.84911C-0.0598962 7.32653 0.739076 7.0439 0.739076 7.0439L17.6131 0.188948C17.6131 0.188948 19 -0.44207 19 0.602225Z" fill="white"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/79921009901" target="_blank">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.9268 3.0625C15.9512 1.09375 13.3171 0 10.5366 0C4.7561 0 0.0731696 4.66667 0.0731696 10.4271C0.0731696 12.25 0.585366 14.0729 1.46341 15.6042L0 21L5.56098 19.5417C7.09756 20.3438 8.78049 20.7812 10.5366 20.7812C16.3171 20.7812 21 16.1146 21 10.3542C20.9268 7.65625 19.9024 5.03125 17.9268 3.0625ZM15.5854 14.1458C15.3659 14.7292 14.3415 15.3125 13.8293 15.3854C13.3902 15.4583 12.8049 15.4583 12.2195 15.3125C11.8537 15.1667 11.3415 15.0208 10.7561 14.7292C8.12195 13.6354 6.43903 11.0104 6.29268 10.7917C6.14634 10.6458 5.19512 9.40625 5.19512 8.09375C5.19512 6.78125 5.85366 6.19792 6.07317 5.90625C6.29268 5.61458 6.58536 5.61458 6.80488 5.61458C6.95122 5.61458 7.17073 5.61458 7.31707 5.61458C7.46341 5.61458 7.68293 5.54167 7.90244 6.05208C8.12195 6.5625 8.63414 7.875 8.70731 7.94792C8.78049 8.09375 8.78049 8.23958 8.70731 8.38542C8.63414 8.53125 8.56097 8.67708 8.41463 8.82292C8.26829 8.96875 8.12195 9.1875 8.04878 9.26042C7.90244 9.40625 7.7561 9.55208 7.90244 9.77083C8.04878 10.0625 8.56097 10.8646 9.36585 11.5937C10.3902 12.4687 11.1951 12.7604 11.4878 12.9063C11.7805 13.0521 11.9268 12.9792 12.0732 12.8333C12.2195 12.6875 12.7317 12.1042 12.878 11.8125C13.0244 11.5208 13.2439 11.5938 13.4634 11.6667C13.6829 11.7396 15 12.3958 15.2195 12.5417C15.5122 12.6875 15.6585 12.7604 15.7317 12.8333C15.8049 13.0521 15.8049 13.5625 15.5854 14.1458Z" fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-block footer-info">
                <div class="footer-menu">
                    <nuxt-link v-for="item, index in menu" :to="item.link" :key="index">
                        {{ item.label }}
                    </nuxt-link>
                </div>
                <div class="footer-info-bottom">
                    <span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2C4.69136 2 2 4.69184 2 8C2 11.3082 4.6916 14 8 14C11.3086 14 14 11.3082 14 8C14 4.69184 11.3084 2 8 2ZM8 12.8002C5.35304 12.8002 3.19976 10.647 3.19976 8C3.19976 5.35352 5.3528 3.20024 8 3.20024C10.6467 3.20024 12.7998 5.35352 12.7998 8C12.7995 10.647 10.6465 12.8002 8 12.8002Z" fill="#373737"/>
                            <path d="M6.69711 6.21197C6.90444 5.98288 7.15224 5.79765 7.42691 5.66643C7.70728 5.53218 8.01249 5.46368 8.32102 5.46577C8.71256 5.46577 9.07186 5.56307 9.39937 5.75767C9.72222 5.94797 9.99731 6.21518 10.2021 6.53747L11 5.91563C10.6969 5.4843 10.303 5.13103 9.84867 4.8829C9.38706 4.62763 8.87755 4.5 8.3208 4.5C7.8621 4.5 7.43094 4.5924 7.02754 4.77767C6.63322 4.95541 6.27511 5.21003 5.97246 5.52783C5.67026 5.84754 5.42899 6.22411 5.26147 6.63757C5.08708 7.06083 5 7.5156 5 8.00023C5 8.4844 5.08708 8.9387 5.26147 9.36313C5.42881 9.77641 5.67011 10.1527 5.97246 10.4719C6.27513 10.79 6.63322 11.0449 7.02754 11.223C7.43116 11.4074 7.86232 11.5 8.3208 11.5C8.87755 11.5 9.38684 11.3724 9.84867 11.1169C10.3033 10.8691 10.6972 10.5158 11 10.0841L10.2021 9.46323C9.99697 9.78503 9.72195 10.0519 9.39937 10.2423C9.07186 10.4367 8.71256 10.534 8.32102 10.534C8.01248 10.5362 7.70724 10.4677 7.42691 10.3333C7.15219 10.2022 6.90438 10.017 6.69711 9.7878C6.48937 9.55913 6.32415 9.29057 6.2017 8.9849C6.07925 8.67923 6.01813 8.35047 6.01813 8.00023C6.01813 7.6493 6.07925 7.321 6.2017 7.0151C6.32415 6.7092 6.48937 6.44157 6.69711 6.21197Z" fill="#373737"/>
                        </svg>
                        2020-{{ new Date().getFullYear() }}
                    </span>
                    <nuxt-link to="/privacy-policy">
                        Политика конфиденциальности
                    </nuxt-link>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
const menu = [
    {
        label: 'Главная',
        link: '/'
    },
    {
        label: 'О компании',
        link: '/about'
    },
    {
        label: 'Команда',
        link: '/team'
    },
    {
        label: 'Портфолио',
        link: '/cases'
    },
    {
        label: 'Поддержка сайтов',
        link: '/support'
    },
    {
        label: 'Новости',
        link: '/news'
    },
    {
        label: 'Контакты',
        link: '/contacts'
    },
]
</script>

<style>
footer {
    padding: 40px 0;
    border-top: 1px solid var(--dark-gray);
}

.footer-content {
    display: grid;
    grid-template-columns: 1fr 1fr
}

.footer-block {
    width: 100%;
    border-right: 1px solid var(--dark-gray); 
}

.footer-block:last-of-type {
    border-right: none; 
}

.footer-contacts {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 230px;
}

.footer-contacts-top {
    display: flex;
    gap: 60px;
}

.footer-address,
.footer-contact-links {
    font-size: 20px;
    line-height: 25px;
    font-weight: 300;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.footer-contact-links {
    text-transform: uppercase;
    font-weight: 500;
}

.footer-address span {
    width: max-content;
}

.footer-social {
    display: flex;
    gap: 15px;
}

.footer-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
    width: 40px;
    background-color: var(--black);
}

.footer-info {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    row-gap: 80px;
    padding-left: 40px;
    height: 100%;
}

.footer-menu {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    gap: 10px 20px;
    max-height: 130px;
    max-width: max-content;
}

.footer-menu a {
    font-size: 20px;
    font-weight: 300;
    line-height: 25px;
    letter-spacing: 0em;
    text-align: left;
    width: 250px;
}

.footer-info-bottom {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
    font-weight: 400;
    line-height: 18px;
    letter-spacing: -0.01em;
    text-align: left;
}

.footer-info-bottom span {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

@media screen and (max-width: 1200px) {
    footer {
        padding-top: 0px;
        border-top: none;
    }

    .footer-content {
        display: flex;
        flex-direction: column;
    }

    .footer-contacts-top {
        flex-direction: column;
        gap: 20px;
    }

    .footer-contacts {
        min-height: 100%;
        padding-top: 40px;
        gap: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--dark-gray);
        border-top: 1px solid var(--dark-gray);
    }

    .footer-block:first-of-type {
        border-right: none;
    }

    .footer-menu {
        flex-wrap: nowrap;
        max-height: 100%;
    }
    
    .footer-info {
        padding-left: 0px;
        padding-top: 20px;
        gap: 40px;
    }

    .footer-address, 
    .footer-contact-links,
    .footer-menu a {
        font-size: 14px;
        font-weight: 200;
        line-height: 20px;
    }

    .footer-info-bottom {
        flex-direction: column;
        align-items: flex-start;
        font-size: 12px;
        font-weight: 200;
        line-height: 15px;
    }
}
</style>
