<template>
    <div class="lightbox-container">
        <!--<img :src="image.src" id="lightbox-image" :height="viewportHeight">-->
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
    .lightbox-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        background-size: contain;
        background: rgba(0, 0, 0, 0.5) no-repeat center;

        img {
            max-width: 100%;
        }
    }
</style>
