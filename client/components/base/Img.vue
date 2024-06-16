<template>
    <div class="img-container" ref="container">
        <img class="parallax-img" :src="src" alt="" ref="img">
    </div>
</template>

<script setup>
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

const props = defineProps({
    src:     { type: String },
    trigger: { type: String }
});

const container = ref(null),
      img       = ref(null);

onMounted(async () => {
    await nextTick();

    const scrollbar = document.querySelector('#scrollbar .n-scrollbar-container');

    gsap.registerPlugin(ScrollTrigger);

    if (!ScrollTrigger.isTouch) {
        ScrollTrigger.create({
            scroller: scrollbar,
            trigger: props.trigger ?? container.value,
            start: 'top bottom',
            end:  'bottom top',
            onUpdate: (self) => {        
                gsap.set(img.value, {
                    css: {
                        y: self.progress * -container.value.clientHeight * 0.7
                    }
                });
            }
        });
    }
});
</script>

<style>
.img-container {
    position: relative;
    display: flex;
    justify-content: center;
    overflow: hidden;
    height: 100%;
}

.img-container img.parallax-img {
    position: absolute;
    width: 100%;
    height: 170%;
    object-fit: cover;
}
</style>