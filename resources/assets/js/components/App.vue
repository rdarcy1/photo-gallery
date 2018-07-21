<template>
    <div>
        <justified-layout :items="items" :options="layoutOptions">
            <template slot="inner" slot-scope="slotProps">
                <div class="tile">
                    <img :src="slotProps.item.url"/>
                    <div class="overlay">
                        <div class="overlay-text">
                            Test
                        </div>
                    </div>
                </div>
            </template>
        </justified-layout>

        <!--<div class="tile" :key="index" v-for="(item, index) in items">-->
        <!--<img :src="item.src">-->

        <!--</div>-->
    </div>
</template>

<script>
    import JustifiedLayout from 'vue-justified-layout';
    import verge from 'verge';

    function dimension(min, max) {
        return Math.round(Math.random() * (max - min) + min);
    }

    export default {
        data() {
            return {
                items: [],
                layoutOptions: {
                    boxSpacing: 5,
                    containerWidth: verge.viewportW(),
                },
            };
        },

        components: {
            JustifiedLayout
        },

        mounted() {
            let i;
            for (i = 0; i < 10; i++) {
                let width = dimension(100, 400);
                let height = dimension(100, 400);
                let url = `http://via.placeholder.com/${width}x${height}`;
                this.items.push({ width, height, url });
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
            display: block;
        }
    }

    .overlay {
        display: none;
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
