<template>
    <button class="btn-ico" :class="props?.type" @click="href(props?.link)">
        <slot></slot>
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 12" stroke="#7C4DFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M3 2H12V11" stroke="#7C4DFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
</template>
<script setup>
const props = defineProps({
    link: String,
    type: String,
});

function href(link) {
    if (link) {
        window.location.href = link;
    }
}
</script>
<style>
.btn-ico {
    color: var(--accent);
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 15px;
    font-size: 20px;
    font-weight: 600;
    line-height: 30px;
    transition: 0.5s;
    background: transparent
}

.btn-ico path {
    transition: 0.5s;
}

.btn-ico:hover {
    color: var(--light-accent);
}

.btn-ico:hover path {
    stroke: var(--light-accent);
}

.btn-ico:disabled {
    color: var(--gray);
}

.btn-ico:disabled path {
    stroke: var(--gray);
}

.btn-ico:active {
    color: var(--accent);
}

.btn-ico:active path {
    stroke: var(--accent);
}
</style>
