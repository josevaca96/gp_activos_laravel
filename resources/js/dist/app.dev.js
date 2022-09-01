"use strict";

require('./bootstrap');

window.Vue = require('vue');
Vue.component('servicio-component', require('./components/ServicioComponent.vue')["default"]);
var app = new Vue({
  el: '#app'
});