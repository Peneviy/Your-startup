<template>
    <div class="info-item">
        <div class="info-head" @click="drop">
            {{ name }}
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="40" height="40" rx="20" fill="#F3F0F0"/>
                <path d="M19.6461 21.5236L19.9997 21.8772L20.3532 21.5236L24.2332 17.6436C24.2794 17.5975 24.3342 17.5609 24.3945 17.5359C24.4548 17.5109 24.5194 17.498 24.5847 17.498C24.6499 17.498 24.7146 17.5109 24.7749 17.5359C24.8352 17.5609 24.89 17.5975 24.9361 17.6436C24.9823 17.6898 25.0189 17.7446 25.0439 17.8049C25.0688 17.8652 25.0817 17.9298 25.0817 17.9951C25.0817 18.0603 25.0688 18.125 25.0439 18.1853C25.0189 18.2456 24.9823 18.3004 24.9361 18.3465L20.3461 22.9365L20.3458 22.9369C20.2997 22.983 20.245 23.0197 20.1847 23.0447C20.1245 23.0696 20.0599 23.0825 19.9947 23.0825C19.9294 23.0825 19.8649 23.0696 19.8046 23.0447C19.7444 23.0197 19.6897 22.983 19.6436 22.9369L19.6432 22.9365L15.0532 18.3465L15.0529 18.3462C15.0067 18.3001 14.9701 18.2454 14.9451 18.1851C14.9201 18.1249 14.9072 18.0603 14.9072 17.9951C14.9072 17.9298 14.9201 17.8653 14.9451 17.805C14.9697 17.7457 15.0056 17.6917 15.0508 17.6461C15.2526 17.4517 15.5777 17.4552 15.7661 17.6436L19.6461 21.5236Z" fill="#BBBBBB" stroke="#373737"/>
            </svg>    
        </div>
        <div class="info-drop" :class="is_drop ? 'drop' : ''">
            <div class="info-content">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            is_drop: false
        }
    },
    props: {
        name: ''
    },
    methods: {
        drop() {
            this.is_drop = !this.is_drop;
        }
    },
}
</script>
<style>
    .info-head {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 20px 0px;
        justify-content: space-between;
        font-size: 16px;
        font-weight: 500;
        line-height: 20px;
        border-top: 1px solid var(--dark-gray);
    }

    .info-drop {
        display: grid;
        grid-template-rows: 0fr;
        overflow: hidden;
        transition: 0.8s
    }

    .info-drop.drop {
        padding: 20px 0px;
        grid-template-rows: 1fr;
    }

    .info-content {
        min-height: 0px;
    }
    .info-content p {
        font-size: 14px;
        font-weight: 250;
        line-height: 20px;
        letter-spacing: -0.01em;
    }
</style>