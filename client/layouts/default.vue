<template>
    <div>
        <n-scrollbar ref="scrollbar" @scroll="scroll_window" style="max-height: 100vh; z-index: 2000;" trigger="none" id="scrollbar">
            <base-header :window_scroll="scroll" />
            <main :class="is_cases ? 'cases' : ''">
                <slot />
            </main>
            <base-footer />
        </n-scrollbar>
    </div>
</template>

<script setup>
import { NScrollbar } from 'naive-ui';

const scrollbar = ref(null);
const scroll = ref(0);
function scroll_window(e) {
    scroll.value = Math.abs(e.target.scrollTop);
}

const is_cases = useState('is_cases');


onMounted(() => {

    const params = {
        behavior: 'smooth',
    }

    const offset = 100;

    document.addEventListener('scrollBy', (e) => {
        params.top = e.params.top;
        if (e.params.offset) {
            params.top -= e.params.offset
        }
        else {
            params.top -= offset;
        }

        scrollbar.value.scrollBy(params);
    });
    

    document.addEventListener('scrollTo', (e) => {
        const element = document.querySelector(e?.params?.element);
        
        if (!element) {
            return;
        } 

        const rect = element.getBoundingClientRect();
        params.top = rect.top;
        if (e.params.offset) {
            params.top -= e.params.offset
        }
        else {
            params.top -= offset;
        }

        scrollbar.value.scrollBy(params);
    });

    const state_scrollbar = useState('scrollbar');
    state_scrollbar.value = scrollbar.value;
})

</script>
<style>
    main.cases {
        padding-top: 0;
    }

    .app-wrapper:has(main.cases) header:not(.scrolled) {
        background: transparent;
    }

    .app-wrapper:has(main.cases) header:not(.scrolled) .burger-bar {
        background-color: var(--white);
    }

    .app-wrapper:has(main.cases) header:not(.scrolled) a img {
        -webkit-filter: invert(1);
        filter: invert(1);
    }

    .app-wrapper:has(main.cases) header:not(.scrolled) .header-contacts a {
        color: var(--white);
    }

    main {
        padding-top: 150px;
    }

    @media screen and (max-width: 1200px) {
        main {
            padding-top: 80px;
        }
    }

    @media screen and (max-width: 1200px){
        .main__content-title::before {
        width: 95px;
        height: 15px;
        left: -20px;
        }
    }
</style>