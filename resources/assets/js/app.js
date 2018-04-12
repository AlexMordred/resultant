require('./bootstrap.js');

Vue.component('page-index', require('./pages/Index.vue'));

const app = new Vue({
    el: '#app'
});
