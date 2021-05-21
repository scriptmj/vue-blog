require('./bootstrap');

import router from './routes';
import App from "./App.vue";
import store from './store';

new Vue({
    el: "#app",

    store,
    router,
    render: (h) => h(App),
}) 

require('alpinejs');
