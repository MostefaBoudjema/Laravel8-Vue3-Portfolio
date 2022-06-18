
require('./bootstrap');

import { createApp } from "vue";
// import Vue from 'vue' 

import Example from './components/Example.vue';
import Formation from './components/Formation.vue';
import Experience from './components/Experience.vue';
import Portefolio from './components/Portefolio.vue';
import Competance from './components/Competance.vue';
import Cv from './components/Cv.vue';
// Vue.component('example', Example);
// Vue.component('formation', Formation);
// Vue.component('experience', Experience);
// Vue.component('portefolio', Portefolio);
// Vue.component('competance', Competance);
// Vue.component('cv', Cv);

// const app = new Vue({
//     el: '#app'
// });

createApp({
    components: {
        Example,
        Formation,
        Experience,
        Portefolio,
        Competance,
        Cv,
    }
}).mount('#app')
// }).use(router).mount('#app')
