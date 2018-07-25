<template>
    <div>
        <justified-gallery></justified-gallery>
        <lightbox
                :image="{src: `http://via.placeholder.com/600x500`}"
                v-show="lightbox.show"
        ></lightbox>
    </div>
</template>

<script>
    import JustifiedGallery from './gallery/JustifiedGallery'
    import Lightbox from './gallery/Lightbox'
    import { mapState } from 'vuex'

    export default {
        components: { JustifiedGallery, Lightbox },

        computed: {
            ...mapState(['lightbox'])
        }
    }
</script>

<style scoped>

</style>
