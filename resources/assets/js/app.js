import './bootstrap';

import Vue from 'vue'
import store from './store'
import AppComponent from './components/App';
import { mapMutations } from 'vuex'


Vue.component('app', AppComponent);

function dimension(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}

const app = new Vue({
    el: '#app',
    store,
    components: {
        app: AppComponent
    },

    methods: {
        ...mapMutations(['setImages']),
    },

    mounted() {
        window.addEventListener('keydown', event => {
            window.Event.fire('keydown', event);
        });


        let items = [];
        let i;
        for (i = 0; i < 100; i++) {
            let width = dimension(1000, 2000);
            let height = dimension(1000, 2000);
            items.push({
                index: i + 1,
                width,
                height,
                url: `https://picsum.photos/${width}/${height}?random`,
                // url: `https://via.placeholder.com/${width}x${height}`,
                title: 'Lorem ipsum doler',
            });
        }

        this.setImages(items);
    }
});
