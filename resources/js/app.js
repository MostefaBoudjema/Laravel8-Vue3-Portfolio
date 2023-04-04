require('./bootstrap');

import { createApp } from "vue";
import swal from 'sweetalert2';

import App from './App.vue'
import router from './router'

window.Swal = swal;
createApp({
    components: {
        App,
    }
}).
use(router).
mount('#app')
