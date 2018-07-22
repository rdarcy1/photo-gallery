<template>
    <div>
        <div class="lightbox-container full-screen"></div>
        <div class="lightbox-background-overlay full-screen"></div>
    </div>
</template>

<script>
    import verge from 'verge'

    export default {
        props: ['image'],

        mounted() {
            document.querySelector('.lightbox-container').style
                .backgroundImage = `url(${this.image.src})`;
        },

        computed: {
            viewportHeight() {
                return verge.viewportH();
            }
        }
    }
</script>

<style lang="scss" scoped>
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
