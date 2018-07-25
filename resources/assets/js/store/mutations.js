export default {
    showLightbox(state, image) {
        state.lightbox = {
            show: true,
            image,
        };
    },

    hideLightbox(state) {
        state.lightbox.show = false;
    },

    setImages(state, images) {
        state.images = images;
    },
}
