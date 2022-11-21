import './bootstrap';

import store from "./store";
require('./bootstrap');
window.Vue = require('vue');
import Vue, {createApp} from 'vue'
import App from './App.vue'

createApp(App).mount("#app")
const app = new Vue({
    vuetify: Vuetify,
    store,
    el: '#app'
})
