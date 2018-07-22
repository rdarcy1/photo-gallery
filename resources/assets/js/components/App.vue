<template>
    <div>
        <justified-gallery></justified-gallery>
        <lightbox :image="{src: `http://via.placeholder.com/600x500`}"></lightbox>
    </div>
</template>

<script>
    import JustifiedGallery from './gallery/JustifiedGallery'
    import Lightbox from './gallery/Lightbox'

    export default {
        components: { JustifiedGallery, Lightbox },
    }
</script>

<style scoped>

</style>
