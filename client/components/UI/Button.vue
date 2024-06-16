<template>
    <button v-if="props?.link" class="custom-btn" :class="props?.type, disabled ? 'disabled' : ''" @click="href(props?.link, props?.target)">
        <slot></slot>
    </button>
    <button v-else class="custom-btn no-link" :class="props?.type, disabled ? 'disabled' : ''">
        <slot></slot>
    </button>
</template>
<script setup>
const props = defineProps({
    link: String,
    type: String,
    target: false,
    disabled: false,
});

function href(link, target) {
    if (target && link) {
        window.open(link, '_blank');
        return
    }
    if (link) {
        window.location.href = link;
    }
}
</script>
<style>
/* Дефолт */
.custom-btn {
    font-family: 'Unbounded';
    font-size: 30px;
    font-weight: 400;
    line-height: 37px;
    letter-spacing: 0em;
    text-align: center;
    padding: 40px 60px;
    background-color: var(--accent);
    color: #FFF;
    transition: 0.5s;
}

.custom-btn:hover {
    background-color: var(--light-accent);
}

.custom-btn.disabled,
.custom-btn.line.disabled {
    background: var(--gray);
    color: var(--dark-gray);
    border: 1px solid var(--gray);
    pointer-events: none;
}

.custom-btn:active,
.custom-btn.line:active {
    box-shadow: inset 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}

.custom-btn.line {
    background: var(--white);
    border: 1px solid var(--accent);
    color: var(--accent);
}

.custom-btn.line:hover {
    background: var(--light-accent);
    border-color: var(--light-accent);
}
@media screen and (max-width: 1600px) {
    .custom-btn {
        padding: 30px 50px;
        font-size: 20px;
    }
}

@media screen and (max-width: 1200px) {
    .custom-btn {
        padding: 20px 40px;
        font-size: 20px;
        font-weight: 500;
        line-height: 25px;
    }
}

</style>
