<template>
    <button class="scroll-down-btn" @click="scrollDown">
        <svg width="21" height="25" viewBox="0 0 21 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.5612 15.5613L11.5612 24.5613C11.4218 24.7011 11.2563 24.812 11.0739 24.8878C10.8916 24.9635 10.6961 25.0024 10.4987 25.0024C10.3013 25.0024 10.1058 24.9635 9.92347 24.8878C9.74114 24.812 9.57555 24.7011 9.4362 24.5613L0.436196 15.5613C0.154403 15.2795 -0.00390625 14.8973 -0.00390625 14.4988C-0.00390625 14.1002 0.154403 13.718 0.436196 13.4363C0.717988 13.1545 1.10018 12.9961 1.4987 12.9961C1.89721 12.9961 2.2794 13.1545 2.5612 13.4363L8.99995 19.875V1.5C8.99995 1.10218 9.15798 0.720644 9.43929 0.43934C9.72059 0.158035 10.1021 0 10.4999 0C10.8978 0 11.2793 0.158035 11.5606 0.43934C11.8419 0.720644 11.9999 1.10218 11.9999 1.5V19.875L18.4387 13.435C18.7205 13.1532 19.1027 12.9949 19.5012 12.9949C19.8997 12.9949 20.2819 13.1532 20.5637 13.435C20.8455 13.7168 21.0038 14.099 21.0038 14.4975C21.0038 14.896 20.8455 15.2782 20.5637 15.56L20.5612 15.5613Z" fill="white"/>
        </svg>
    </button>
</template>

<script setup>
const props = defineProps({
    target: {
        type: String,
    },
})

function scrollDown() {
    const event = new Event('scrollTo');
    event.params = { element : props.target };

    document.dispatchEvent(event);
}
</script>

<style>
.scroll-down-btn {
    width:  63px;
    height:  63px;
    border-radius: 50%;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--accent);
    cursor: pointer;
}
@media screen and (max-width: 1200px ) {
    .scroll-down-btn {
        width: 46px;
        height: 46px;
    }
    .scroll-down-btn svg{
        width: 12px;
        height: 14px;
    }

}
</style>