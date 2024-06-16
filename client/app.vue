<template>
    <div class="app-wrapper" :class="dark_theme ? 'dark-theme' : ''">
        <BasePreloader/>
        <n-config-provider :theme="dark_theme ? darkTheme : null" :theme-overrides="themeOverrides" :locale="ruRU"
            :date-locale="dateRuRU">
            <n-message-provider>
                <n-notification-provider placement="bottom-right">
                    <n-dialog-provider>
                        <NuxtLoadingIndicator color="var(--accent)"/>
                        <NuxtLayout>
                            <div>
                                <NuxtPage/>
                            </div>
                        </NuxtLayout>
                    </n-dialog-provider>
                </n-notification-provider>
            </n-message-provider>
        </n-config-provider>
    </div>
</template>

<script setup>
import {
    ruRU,
    dateRuRU,
    darkTheme,
    NConfigProvider,
    NMessageProvider,
    NNotificationProvider,
    NDialogProvider,
    NDrawer
} from 'naive-ui'

const themeOverrides = {
    common: {
        primaryColor: '#5457F5',
        primaryColorHover: '#6a6cf3',
        primaryColorPressed: '#4144f3',
        primaryColorSuppl: '#5457F5',
    },
    Drawer: {
        headerBorderBottom: 'none',
        closeSize: '32px'
    },
    Input: {
        paddingMedium: "16px",
        heightMedium: "55px",
    },
    Upload: {
        padding: "16px",
        height: "55px",
    }
}

const dark_theme = useState('dark_theme');
const local_theme = useCookie('dark_theme');
dark_theme.value = local_theme.value;

const loading = useState('loading');
loading.value = true;

const route = useRoute();
const scroll_position = useState('scrollbar');

watch(() => route.name, (new_value) => {
    scroll_position.value.scrollTo({
        top: 0,
    })
});

useHead({
    link: [{
        rel: 'icon',
        type: 'image/x-icon',
        href: 'https://your-startup.space/wp-content/themes/your-startup/client/.output/public/favicon.ico'
    }],
    script: [{
        innerHTML: `(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();
            for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
            k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(68671093, "init", {
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
            });`
    }],
})
</script>

<style src="~/assets/css/base.css"></style>