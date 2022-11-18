
require('./bootstrap');

import { createApp } from "vue";
import swal from 'sweetalert2';

import App from '../App.vue'
import router from './router'

import Formation from './components/Formation.vue';
import Experience from './components/Experience.vue';
import Portefolio from './components/Portefolio.vue';
import Competance from './components/Competance.vue';
import Cv from './components/Cv.vue';



window.Swal = swal;
createApp({
    components: {
        App,
        Formation,
        Experience,
        Portefolio,
        Competance,
        Cv,
    }
}).
use(router).
mount('#app')
