<template>
    <section id="video-section">
        <div ref="container" class="container video-container">
            <div @click="playPause.focus()" class="controls-visible">
                <video :src="data?.video" type="video/webm" key="@/assets/video/promo.mp4" @click="video_control" @loadeddata ="setVideo" @timeupdate="setTimeCode" @ended="is_pause = false" ref="video" pip="false">
                </video>
                <div class="pause-play" :class="is_pause ? 'pause' : 'no-pause'">
                    <div class="bg-shadov-play"></div>
                    <svg class="stop" width="56.000000" height="56.000000" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path id="Vector" d="M28 0C22.46 0 17.04 1.64 12.44 4.71C7.83 7.79 4.25 12.16 2.13 17.28C0.01 22.4 -0.55 28.03 0.53 33.46C1.61 38.89 4.28 43.88 8.2 47.79C12.11 51.71 17.1 54.38 22.53 55.46C27.96 56.54 33.59 55.98 38.71 53.86C43.83 51.74 48.2 48.16 51.28 43.55C54.35 38.95 56 33.53 56 28C55.99 20.57 53.03 13.46 47.78 8.21C42.53 2.96 35.42 0 28 0ZM23.69 36.61C23.69 37.18 23.46 37.73 23.06 38.13C22.65 38.54 22.1 38.76 21.53 38.76C20.96 38.76 20.41 38.54 20.01 38.13C19.61 37.73 19.38 37.18 19.38 36.61L19.38 19.38C19.38 18.81 19.61 18.26 20.01 17.86C20.41 17.45 20.96 17.23 21.53 17.23C22.1 17.23 22.65 17.45 23.06 17.86C23.46 18.26 23.69 18.81 23.69 19.38L23.69 36.61ZM36.61 36.61C36.61 37.18 36.38 37.73 35.98 38.13C35.58 38.54 35.03 38.76 34.46 38.76C33.89 38.76 33.34 38.54 32.93 38.13C32.53 37.73 32.3 37.18 32.3 36.61L32.3 19.38C32.3 18.81 32.53 18.26 32.93 17.86C33.34 17.45 33.89 17.23 34.46 17.23C35.03 17.23 35.58 17.45 35.98 17.86C36.38 18.26 36.61 18.81 36.61 19.38L36.61 36.61Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero"/>
                    </svg>
                    <svg class="play"width="56.000000" height="56.000000" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path id="Vector" d="M40 -0.63C31.96 -0.63 24.11 1.75 17.43 6.22C10.74 10.68 5.54 17.03 2.46 24.45C-0.61 31.87 -1.42 40.04 0.15 47.92C1.72 55.8 5.59 63.04 11.27 68.72C16.95 74.4 24.19 78.27 32.07 79.84C39.95 81.41 48.12 80.6 55.54 77.53C62.96 74.45 69.31 69.25 73.77 62.56C78.24 55.88 80.62 48.03 80.62 40C80.61 29.22 76.32 18.9 68.71 11.28C61.09 3.66 50.77 -0.62 40 -0.63ZM55.83 42.57L35.52 56.63C35.05 56.95 34.5 57.14 33.94 57.18C33.37 57.21 32.8 57.09 32.29 56.83C31.79 56.56 31.37 56.16 31.07 55.67C30.78 55.19 30.62 54.63 30.62 54.06L30.62 25.93C30.62 25.36 30.78 24.8 31.07 24.32C31.37 23.83 31.79 23.43 32.29 23.16C32.8 22.9 33.37 22.78 33.94 22.81C34.5 22.85 35.05 23.04 35.52 23.36L55.83 37.42C56.25 37.71 56.59 38.1 56.83 38.54C57.06 38.99 57.18 39.49 57.18 40C57.18 40.5 57.06 41 56.83 41.45C56.59 41.89 56.25 42.28 55.83 42.57Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero"/>
                    </svg>
                </div>
                <div class="video-controls">
                    <button ref="playPause" @click="video_control" class="play-pause">
                        <svg v-if="is_pause" width="56.000000" height="56.000000" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path id="Vector" d="M28 0C22.46 0 17.04 1.64 12.44 4.71C7.83 7.79 4.25 12.16 2.13 17.28C0.01 22.4 -0.55 28.03 0.53 33.46C1.61 38.89 4.28 43.88 8.2 47.79C12.11 51.71 17.1 54.38 22.53 55.46C27.96 56.54 33.59 55.98 38.71 53.86C43.83 51.74 48.2 48.16 51.28 43.55C54.35 38.95 56 33.53 56 28C55.99 20.57 53.03 13.46 47.78 8.21C42.53 2.96 35.42 0 28 0ZM23.69 36.61C23.69 37.18 23.46 37.73 23.06 38.13C22.65 38.54 22.1 38.76 21.53 38.76C20.96 38.76 20.41 38.54 20.01 38.13C19.61 37.73 19.38 37.18 19.38 36.61L19.38 19.38C19.38 18.81 19.61 18.26 20.01 17.86C20.41 17.45 20.96 17.23 21.53 17.23C22.1 17.23 22.65 17.45 23.06 17.86C23.46 18.26 23.69 18.81 23.69 19.38L23.69 36.61ZM36.61 36.61C36.61 37.18 36.38 37.73 35.98 38.13C35.58 38.54 35.03 38.76 34.46 38.76C33.89 38.76 33.34 38.54 32.93 38.13C32.53 37.73 32.3 37.18 32.3 36.61L32.3 19.38C32.3 18.81 32.53 18.26 32.93 17.86C33.34 17.45 33.89 17.23 34.46 17.23C35.03 17.23 35.58 17.45 35.98 17.86C36.38 18.26 36.61 18.81 36.61 19.38L36.61 36.61Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </svg>
                        <svg v-else width="56.000000" height="56.000000" viewBox="0 0 81 81" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path id="Vector" d="M40 -0.63C31.96 -0.63 24.11 1.75 17.43 6.22C10.74 10.68 5.54 17.03 2.46 24.45C-0.61 31.87 -1.42 40.04 0.15 47.92C1.72 55.8 5.59 63.04 11.27 68.72C16.95 74.4 24.19 78.27 32.07 79.84C39.95 81.41 48.12 80.6 55.54 77.53C62.96 74.45 69.31 69.25 73.77 62.56C78.24 55.88 80.62 48.03 80.62 40C80.61 29.22 76.32 18.9 68.71 11.28C61.09 3.66 50.77 -0.62 40 -0.63ZM55.83 42.57L35.52 56.63C35.05 56.95 34.5 57.14 33.94 57.18C33.37 57.21 32.8 57.09 32.29 56.83C31.79 56.56 31.37 56.16 31.07 55.67C30.78 55.19 30.62 54.63 30.62 54.06L30.62 25.93C30.62 25.36 30.78 24.8 31.07 24.32C31.37 23.83 31.79 23.43 32.29 23.16C32.8 22.9 33.37 22.78 33.94 22.81C34.5 22.85 35.05 23.04 35.52 23.36L55.83 37.42C56.25 37.71 56.59 38.1 56.83 38.54C57.06 38.99 57.18 39.49 57.18 40C57.18 40.5 57.06 41 56.83 41.45C56.59 41.89 56.25 42.28 55.83 42.57Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </svg>
                    </button>
                    <span class="timer">{{ timer }}</span>
                    <input ref="timeline" value="0" @mouseup="afterSetTime" @mousedown="video.pause()" @input="setTime" type="range" class="timeline">
                    <span class="timer">{{ duration_video }}</span>
                    <button ref="volume" @click="video_control_vol" class="volume">
                        <span v-if="is_volume == false" class="line"></span>
                        <svg width="29.000000" height="26.000000" viewBox="0 0 29 26" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path id="Vector" d="M17.43 0.1C17.27 0.01 17.08 -0.02 16.89 0C16.71 0.02 16.53 0.09 16.38 0.21L7.65 7L2 7C1.46 7 0.96 7.21 0.58 7.58C0.21 7.96 0 8.46 0 9L0 17C0 17.53 0.21 18.03 0.58 18.41C0.96 18.78 1.46 19 2 19L7.65 19L16.38 25.78C16.53 25.9 16.71 25.97 16.89 25.99C17.08 26.01 17.27 25.97 17.43 25.89C17.6 25.81 17.74 25.68 17.84 25.52C17.94 25.37 17.99 25.18 18 25L18 1C18 0.81 17.94 0.62 17.84 0.47C17.74 0.31 17.6 0.18 17.43 0.1ZM2 9L7 9L7 17L2 17L2 9ZM16 22.95L9 17.51L9 8.48L16 3.04L16 22.95ZM22.75 9.69C23.55 10.6 23.99 11.78 23.99 13C23.99 14.21 23.55 15.39 22.75 16.3C22.57 16.49 22.32 16.61 22.06 16.63C21.8 16.64 21.54 16.55 21.34 16.38C21.15 16.2 21.03 15.96 21.01 15.7C20.99 15.44 21.07 15.18 21.25 14.98C21.73 14.43 21.99 13.72 21.99 13C21.99 12.27 21.73 11.56 21.25 11.01C21.07 10.81 20.99 10.55 21.01 10.29C21.03 10.03 21.15 9.79 21.34 9.61C21.54 9.44 21.8 9.35 22.06 9.36C22.32 9.38 22.57 9.5 22.75 9.69ZM29 13C29 15.46 28.09 17.83 26.45 19.66C26.27 19.85 26.02 19.97 25.76 19.98C25.5 20 25.24 19.9 25.05 19.73C24.85 19.55 24.73 19.31 24.72 19.05C24.7 18.79 24.79 18.53 24.96 18.33C26.27 16.86 27 14.96 27 13C27 11.03 26.27 9.13 24.96 7.66C24.87 7.56 24.8 7.45 24.75 7.33C24.71 7.2 24.69 7.07 24.69 6.94C24.7 6.8 24.73 6.67 24.79 6.55C24.85 6.43 24.93 6.33 25.03 6.24C25.13 6.15 25.24 6.08 25.37 6.04C25.49 6 25.62 5.98 25.76 5.99C25.89 5.99 26.02 6.03 26.14 6.09C26.26 6.15 26.36 6.23 26.45 6.33C28.09 8.16 29 10.54 29 13Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </svg>
                    </button>
                    <input ref="volumeline" value="1" @input="setVolume" type="range" class="volumeline" style="background: linear-gradient(to right, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 100%, rgba(255, 255, 255, 0.5) 100%, rgba(255, 255, 255, 0.5) 100%)">
                    <button class="full-screen" @click="openFull">
                        <svg v-if="is_open" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fff" viewBox="0 0 256 256">
                            <path d="M152,96V48a8,8,0,0,1,16,0V88h40a8,8,0,0,1,0,16H160A8,8,0,0,1,152,96ZM96,152H48a8,8,0,0,0,0,16H88v40a8,8,0,0,0,16,0V160A8,8,0,0,0,96,152Zm112,0H160a8,8,0,0,0-8,8v48a8,8,0,0,0,16,0V168h40a8,8,0,0,0,0-16ZM96,40a8,8,0,0,0-8,8V88H48a8,8,0,0,0,0,16H96a8,8,0,0,0,8-8V48A8,8,0,0,0,96,40Z"></path>
                        </svg>
                        <svg v-else width="22.000000" height="22.000000" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path id="Vector" d="M22 1L22 6C22 6.26 21.89 6.51 21.7 6.7C21.51 6.89 21.26 7 21 7C20.73 7 20.48 6.89 20.29 6.7C20.1 6.51 20 6.26 20 6L20 2L16 2C15.73 2 15.48 1.89 15.29 1.7C15.1 1.51 15 1.26 15 1C15 0.73 15.1 0.48 15.29 0.29C15.48 0.1 15.73 0 16 0L21 0C21.26 0 21.51 0.1 21.7 0.29C21.89 0.48 22 0.73 22 1ZM6 20L2 20L2 16C2 15.73 1.89 15.48 1.7 15.29C1.51 15.1 1.26 15 1 15C0.73 15 0.48 15.1 0.29 15.29C0.1 15.48 0 15.73 0 16L0 21C0 21.26 0.1 21.51 0.29 21.7C0.48 21.89 0.73 22 1 22L6 22C6.26 22 6.51 21.89 6.7 21.7C6.89 21.51 7 21.26 7 21C7 20.73 6.89 20.48 6.7 20.29C6.51 20.1 6.26 20 6 20ZM21 15C20.73 15 20.48 15.1 20.29 15.29C20.1 15.48 20 15.73 20 16L20 20L16 20C15.73 20 15.48 20.1 15.29 20.29C15.1 20.48 15 20.73 15 21C15 21.26 15.1 21.51 15.29 21.7C15.48 21.89 15.73 22 16 22L21 22C21.26 22 21.51 21.89 21.7 21.7C21.89 21.51 22 21.26 22 21L22 16C22 15.73 21.89 15.48 21.7 15.29C21.51 15.1 21.26 15 21 15ZM6 0L1 0C0.73 0 0.48 0.1 0.29 0.29C0.1 0.48 0 0.73 0 1L0 6C0 6.26 0.1 6.51 0.29 6.7C0.48 6.89 0.73 7 1 7C1.26 7 1.51 6.89 1.7 6.7C1.89 6.51 2 6.26 2 6L2 2L6 2C6.26 2 6.51 1.89 6.7 1.7C6.89 1.51 7 1.26 7 1C7 0.73 6.89 0.48 6.7 0.29C6.51 0.1 6.26 0 6 0Z" fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero"/>
                        </svg>
                        
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>
<script setup>
    import { NSlider } from 'naive-ui';
    const is_pause = ref(false);
    const is_volume = ref(true);
    const is_open = ref(false);
    const video = ref(null);
    const playPause = ref(null);
    const timeline = ref(null);
    const volumeline = ref(null);
    const container = ref(null);
    const timeCode = ref(0);
    const volumeCode = ref(1);
    const last_volume = ref(1);
    const timer = ref('0:00');
    const duration_video = ref()

    const props = defineProps({
        data: null
    });

    const nuxtApp = useNuxtApp();
    nuxtApp.hook('page:finish', () => {
        setVideo();
    })

    // function play () {
    //     is_pause.value = true;
    //     video.value.play();
    // }

    // function pause () {
    //     video.value.pause();
    //     is_pause.value = false;
    // }

    function afterSetTime() {
        console.log(is_pause.value);
        if (is_pause.value) {
            video.value.play();
            is_pause.value = true;
        } else {
            video.value.pause();
            is_pause.value = false;
        }
    }

    // const duration_video = computed(() => {
    //     if (video.value) {
    //         let number = Math.floor(video.value.duration);
    
    //         let minutes = Math.floor(number / 60);
    //         let seconds = number % 60;
    //         if (seconds < 10) {
    //             return `${minutes}:0${seconds}`;
    //         } else {
    //             return `${minutes}:${seconds}`;
    //         }
    //     }
    // })

    function setVideo() {
        if (video.value) {
            const interval = setInterval(() => {                
                let number = Math.floor(video.value.duration);    
                if (number != NaN) {
                    let minutes = Math.floor(number / 60);
                    let seconds = number % 60;
                    if (seconds < 10) {
                        duration_video.value = minutes + ':0' + seconds;
                    } else {
                        duration_video.value = minutes + ':' + seconds;
                    }
                    clearInterval(interval);
                }
            }, 50);
        } else {
            duration_video.value = '0:00'
        }
    }

    function setTime() {
        timeline.value.style.background = 'linear-gradient(to right, #fff 0%, #fff ' +  timeline.value.value + '%, rgba(255, 255, 255, 0.5) ' + timeline.value.value + '%, rgba(255, 255, 255, 0.5) 100%)'
        video.value.currentTime = timeline.value.value * (video.value.duration / 100)
    }

    function openFull() {
        is_open.value = !is_open.value
        let cont = container.value
        if(document.fullscreenElement) {
            document.exitFullscreen();
        } else {
            cont.requestFullscreen();
        }
    }

    function setVolume() {
        video.value.volume = volumeline.value.value / 100;
        volumeCode.value = volumeline.value.value / 100;
        last_volume.value = volumeline.value.value / 100;
        if (volumeCode.value > 0) {
            is_volume.value = true
        } else {
            is_volume.value = false
        }
        volumeline.value.style.background = 'linear-gradient(to right, #fff 0%, #fff ' +  volumeline.value.value + '%, rgba(255, 255, 255, 0.5) ' + volumeline.value.value + '%, rgba(255, 255, 255, 0.5) 100%)'
    }

    function setTimeCode() {
        timeline.value.value = video.value.currentTime / (video.value.duration / 100);
        timeCode.value = video.value.currentTime;
        timer.value = timeFormat(timeCode.value);
        let time =Number(timeline.value.value)
        timeline.value.style.background = 'linear-gradient(to right, #fff 0%, #fff ' +  time + '%, rgba(255, 255, 255, 0.5) ' + time + '%, rgba(255, 255, 255, 0.5) 100%)'
    }

    onMounted(() => {
        if (video.value) {
            video.value.volume = 1;
            setVideo();
        }
    })

    function timeFormat(number_no_format) {
        if (number_no_format) {
            let number = Math.floor(timeCode.value);
            let minutes = Math.floor(number / 60);
            let seconds = number % 60;
            if (seconds < 10) {
                return `${minutes}:0${seconds}`;
            } else {
                return `${minutes}:${seconds}`;
            }
        } else {
            return '0:00'
        }
    }


    function video_control() {
        is_pause.value = !is_pause.value;
        if (is_pause.value) {
            if (video.value.currentTime == video.value.duration) {
                video.value.currentTime = 0
            }
            video.value.play();
        } else {
            video.value.pause();
        }
    }

    function video_control_vol() {
        is_volume.value = !is_volume.value;
        if (is_volume.value) {
            video.value.volume = volumeCode.value;
            volumeline.value.value = last_volume.value * 100
            volumeline.value.style.background = 'linear-gradient(to right, #fff 0%, #fff ' +  last_volume.value * 100 + '%, rgba(255, 255, 255, 0.5) ' + last_volume.value * 100 + '%, rgba(255, 255, 255, 0.5) 100%)'
        } else {
            video.value.volume = 0;
            volumeline.value.value = 0;
            volumeline.value.style.background = 'linear-gradient(to right, #fff 0%, #fff ' +  volumeline.value.value + '%, rgba(255, 255, 255, 0.5) ' + volumeline.value.value + '%, rgba(255, 255, 255, 0.5) 100%)'
        }
    }
</script>
<style>
    .video-container {
        position: relative;
        padding: 0px 2px;
    }

    .video-container video {
        width: 100%;
        height: auto;
    }

    .video-controls {
        width: calc(100% - 80px);
        position: absolute;
        bottom: 40px;
        left: 40px;
        border-radius: 20px;
        background: rgba(45, 45, 45, 0.6);
        padding: 20px 40px;
        display: flex;
        flex-direction: row;
        align-items: center;
        transition: 0.8s;
        opacity: 0;
        transform: translateY(50%);
        pointer-events: none;
    }

    .controls-visible:hover .video-controls {
        opacity: 1;
        pointer-events: all;
        transform: translateY(0);
    }

    .video-btn {
        position: absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 220px;
        height: 220px;
        background: var(--white);
        border-radius: 50%;
        z-index: 10;
        transition: 0.5s;
        cursor: pointer;
        opacity: 0;
        pointer-events: none;
    }

    .video-container:hover .video-btn {
        opacity: 1;
        pointer-events: all;
    }

    .video-btn svg {
        margin-left: 5px;
    }

    .play-pause,
    .volume,
    .full-screen {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 56px;
        height: 56px;
        padding: 0px;
        background: transparent;
    }

    .play-pause {
        margin-right: 40px;
    }

    .volume {
        position: relative;
    }

    .volume .line {
        width: 36px;
        height: 2px;
        border-radius: 50%;
        background: var(--white);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(45deg);
        z-index: 10;
    }

    .timer {
        font-size: 25px;
        font-weight: 200;
        line-height: 35px;
        color: var(--white);
        width: 50px;
        margin: 0px 10px;
    }

    .volumeline,
    .timeline {
        accent-color: var(--white);
        background:transparent;
        -webkit-transition: 2s linear;
        -moz-transition: 2s linear;
        -o-transition: 2s linear;
        transition: 0.2s linear;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 8px;
        height: 10px;
        outline: none;
        border: none;
        -webkit-appearance: none;
    }
    
    .timeline {
        height: 10px;
        width: 100%;   
    }

    .timeline::-webkit-slider-thumb {
        transform: scale(1.5);
    }

    .volumeline::-webkit-slider-thumb {
        opacity: 0;
    }
    

    .volumeline {
        height: 6px;
        width: 125px;
    }

    .volume {
        margin-left: 40px;
    }

    .full-screen {
        margin-left: 45px;
    }

    .pause-play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        pointer-events: none;
        opacity: 0;
        transition: 0.8s
    }
    
    .controls-visible:hover .pause-play {
        opacity: 1;
    }

    .pause-play.no-pause {
        opacity: 1;
    }

    .stop {
        transform: translateX(50%) scale(0.8);
        width: 82px;
        height: 82px;
        opacity: 0;
        transition: 0.5s;
    }

    .play {
        transform: translateX(-50%) scale(1);
        width: 82px;
        height: 82px;
        opacity: 1;
        transition: 0.5s;
    }

    .pause-play.pause .stop {
        opacity: 1;
    }

    .pause-play.pause .play {
        opacity: 0;
    }


    #video-section {
        margin-bottom: 150px; 
    }

    .bg-shadov-play {
        border-radius: 50%;
        width: 85px;
        height: 85px;
        -webkit-box-shadow: 0px 0px 65px 2px rgb(84, 52, 172);
        -moz-box-shadow: 0px 0px 65px 2px rgb(84, 52, 172);
        box-shadow: 0px 0px 65px 2px rgb(84, 52, 172);
        background: rgba(124, 77, 255, 0.5);
    }

    .stop,
    .play {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }

    @media screen and (max-width: 1200px) {
        .stop,
        .play {
            width: 24px;
            height: 24px;
        }

        .video-controls {
            width: calc(100% - 40px);
            left: 20px;
            padding: 10px;
        }

        .play-pause {
            width: 20px;
            height: 20px;
            margin-right: 20px;
        }

        .timer:first-of-type {
            font-size: 12px;
            font-weight: 200;
            line-height: 15px;
            margin: 0px;
            margin-right: 5px;
        }

        .timer:last-of-type {
            font-size: 12px;
            font-weight: 200;
            line-height: 15px;
            margin: 0px;
            margin-left: 5px;
        }

        .volume,
        .volumeline {
            display: none;
        }

        .full-screen {
            margin-left: 25px;
            width: 16px;
            height: 16px;
        }

        .timeline {
            height: 5px;
        }

        .timeline::-webkit-slider-thumb {
            width: 16px;
            height: 16px;
            transform: scale(1);
        }

        .video-container {
            display: flex;
            align-items: center;
        }

        #video-section {
            margin-bottom: 80px; 
        }

        .video-container:hover .video-controls {
            opacity: 1;
            pointer-events: all;
            transform: translate(0)
        }

        .bg-shadov-play {
            width: 25px;
            height: 25px;
            box-shadow: 0px 0px 10px 0px rgb(84, 52, 172);
            background: rgba(124, 77, 255, 0.5);
        }
    }
</style>