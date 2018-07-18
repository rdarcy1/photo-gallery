import Vue from 'vue'
import VueMasonry from 'vue-masonry-css'
import './bootstrap';
import AppComponent from './components/App';

window.Vue = Vue;

Vue.use(VueMasonry);

const app = new Vue({
    el: '#app'
});
