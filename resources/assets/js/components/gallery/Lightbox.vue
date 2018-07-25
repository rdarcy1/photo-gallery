<template>
    <div>
        <div class="lightbox-close" @click="hideLightbox"></div>
        <div class="lightbox-nav nav-left"><a></a></div>
        <div class="lightbox-nav nav-right"></div>
        <div class="lightbox-container full-screen"
             :style="`background-image: url(${image.url}); background-size: contain`"
        ></div>
        <div class="lightbox-background-overlay full-screen"></div>
    </div>
</template>

<script>
    import { mapMutations, mapState } from 'vuex'

    export default {
        computed: {
            ...mapState(['lightbox']),

            image() {
                return this.lightbox.image;
            }
        },

        methods: {
            ...mapMutations(['hideLightbox'])
        }

    }
</script>

<style lang="scss" scoped>
    .lightbox-close {
        position: fixed;
        top: 0;
        left: 0;
        width: 60px;
        height: 60px;
        cursor: pointer;
        z-index: 1002;
        background-image: url('/img/icons/close-x.png');
        -webkit-background-size: contain;
        background-size: contain;
    }

    .lightbox-nav {
        height: 100px;
        width: 60px;
        position: fixed;
        top: 50%;
        margin-top: -40px;
        cursor: pointer;
        z-index: 1001;
        -webkit-background-size: contain;
        background-size: contain;
        
        &.nav-left {
            background-image: url('/img/icons/left-arrow.png');
            left: 0;
        }

        &.nav-right {
            background-image: url('/img/icons/right-arrow.png');
            right: 0;
        }
    }

    .full-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .lightbox-container {
        text-align: center;
        background-size: contain;
        background: no-repeat center;
        z-index: 1000;

        img {
            max-width: 100%;
        }
    }

    .lightbox-background-overlay {
        background-color: rgba(0, 0, 0, 0.5);

    }
</style>
