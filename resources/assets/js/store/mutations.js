function offsetLightboxImage(state, offset) {
    let currentIndex = state.lightbox.image.index;
    let newImage = state.images.find(image => image.index === currentIndex + offset);

    if (newImage) {
        state.lightbox.image = newImage;
    }
}


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

    nextImage(state) {
        offsetLightboxImage(state, 1)
    },

    previousImage(state) {
        offsetLightboxImage(state, -1)
    },

    setImages(state, images) {
        state.images = images;
    },
}
