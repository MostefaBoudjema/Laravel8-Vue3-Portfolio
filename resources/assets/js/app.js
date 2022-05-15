/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
// Vue.component('formation', require('./components/Formation.vue'));


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
