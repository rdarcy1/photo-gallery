<template>
    <div>
        <masonry
                :cols="4"
                :gutter="20"
        >
            <div class="tile" :key="index" v-for="(item, index) in items">
                <img :src="item.src">
                <div class="overlay">
                    <div class="overlay-text">
                        Test
                    </div>
                </div>
            </div>
        </masonry>
    </div>
</template>

<script>
    function dimension(min, max) {
        return Math.round(Math.random() * (max - min) + min);
    }

    export default {
        data() {
            return {
                items: []
            };
        },

        mounted() {
            let i;
            for (i = 0; i < 10; i++) {
                let width = dimension(400, 800);
                let height = dimension(100, 800);
                this.items.push({ src: `http://via.placeholder.com/${width}x${height}` })
            }
        }
    }
</script>

<style lang="scss" scoped>
    .tile {
        margin-bottom: 20px;
        display: block;
        position: relative;

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
