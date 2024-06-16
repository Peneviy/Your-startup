<template>
    <n-scrollbar
        style="max-height: calc(100vh - 151px - 80px)"
        ref="cases__carousel"
        :on-scroll="changePosition()"
    >
        <div class="cases__carousel">
            <div
                class="cases__carousel-item"
                v-for="(item, index) in props?.cases"
                v-html="item.slide_name"
                @click="props?.click(index)"
                :class="currentIndex == index ? 'active' : ''"
            ></div>
        </div>
    </n-scrollbar>
</template>
<script setup>
import { NScrollbar } from "naive-ui";

const props = defineProps({
    cases: Array,
    data: null,
    click: Function,
    currentIndex: Number,
});

const cases__carousel = ref(null);

function changePosition() {
    cases__carousel.value?.scrollTo({
        top: props?.currentIndex * 140 + props?.currentIndex * 40,
        behavior: "smooth",
    });
}
</script>
<style>
.cases__carousel {
    width: 100%;
    margin-top: 10px;
    display: flex;
    flex-direction: column;
    gap: 40px;
}
.cases__carousel-item {
    min-height: 140px;
    max-width: 185px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    border: 1px solid var(--gray);
    color: var(--gray);
    cursor: pointer;
    text-align: center;
    transition: 0.5s;

    font-family: Geologica;
    font-size: 16px;
    font-weight: 500;
    line-height: 20px;
    letter-spacing: -0.01em;
}

.cases__carousel-item.active {
    border: 1px solid var(--accent);
    color: var(--accent);
}
@media screen and (max-width: 1200px ) {
    .cases__carousel {
        display: none;
    }
}
</style>
