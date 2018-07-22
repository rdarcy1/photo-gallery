<template>
    <justified-layout :items="items" :options="layoutOptions" id="justified-layout">
        <template slot="inner" slot-scope="{ item }">
            <div class="tile">
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

    function dimension(min, max) {
        return Math.round(Math.random() * (max - min) + min);
    }

    export default {
        data() {
            return {
                items: [],
                layoutOptions: {
                    boxSpacing: 2,
                    containerWidth: this.containerWidth,
                    targetRowHeight: 200,
                },
            };
        },

        components: {
            JustifiedLayout
        },

        computed: {
            containerWidth() {
                return document.getElementById('justified-layout').getBoundingClientRect().width;
            }
        },

        mounted() {
            let i;
            for (i = 0; i < 10; i++) {
                let width = dimension(100, 400);
                let height = dimension(100, 400);
                this.items.push({
                    width,
                    height,
                    url: `http://via.placeholder.com/${width}x${height}`,
                    title: 'Lorem ipsum doler',
                });
            }
        }
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
    }

    .overlay-text {
        position: absolute;
        top: 50%;
        width: 100%;
        line-height: 2rem;
        margin-top: -1rem;
    }
</style>
