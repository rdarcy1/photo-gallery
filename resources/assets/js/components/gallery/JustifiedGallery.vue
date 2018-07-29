<template>
    <justified-layout :items="images" :options="layoutOptions" id="justified-layout">
        <template slot="inner" slot-scope="{ item }">
            <div class="tile" @click="activateLightbox(item)">
                <img :src="item.url"/>
                <div class="overlay">
                    <div class="overlay-text">
                        {{ item.title }}
                    </div>
                </div>
            </div>
        </template>
    </justified-layout>
</template>

<script>
    import JustifiedLayout from 'vue-justified-layout';
    import { mapMutations, mapState } from 'vuex'

    export default {
        data() {
            return {
                items: [],
                layoutOptions: {
                    boxSpacing: 2,
                    containerWidth: this.containerWidth,
                    containerPadding: 2,
                    targetRowHeight: 400,
                },
            };
        },

        components: {
            JustifiedLayout
        },

        computed: {
            ...mapState(['images']),

            containerWidth() {
                return document.getElementById('justified-layout').getBoundingClientRect().width;
            }
        },

        methods: {
            ...mapMutations(['showLightbox']),
            activateLightbox(item) {
                this.showLightbox(item)
            }
        },
    }
</script>

<style lang="scss" scoped>
    .tile {
        img {
            width: 100%;
        }

        &:hover .overlay {
            opacity: 1;
        }
    }

    .overlay {
        opacity: 0;
        transition-property: opacity;
        transition-duration: 0.2s;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        width: 100%;
        height: 100%;
        text-align: center;
        cursor: pointer;
    }

    .overlay-text {
        position: absolute;
        top: 50%;
        width: 100%;
        line-height: 2rem;
        margin-top: -1rem;
    }
</style>
