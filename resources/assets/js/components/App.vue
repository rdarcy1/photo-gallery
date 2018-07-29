<template>
    <div>
        <gallery-header></gallery-header>
        <justified-gallery></justified-gallery>
        <lightbox v-show="lightbox.show"></lightbox>
    </div>
</template>

<script>
    import JustifiedGallery from './gallery/JustifiedGallery'
    import Lightbox from './gallery/Lightbox'
    import GalleryHeader from './gallery/GalleryHeader'
    import { mapState } from 'vuex'

    export default {
        components: { JustifiedGallery, Lightbox, GalleryHeader },

        computed: {
            ...mapState(['lightbox'])
        }
    }
</script>

<style scoped>

</style>
