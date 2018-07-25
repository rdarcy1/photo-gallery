import './bootstrap';

import Vue from 'vue'
import store from './store'
import AppComponent from './components/App';



Vue.component('app', AppComponent);

const app = new Vue({
    el: '#app',
    store,
    components: {
        app: AppComponent
    }
});
