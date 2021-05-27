require('./bootstrap');
require('bootstrap/js/src/index');
var bourbon = require('bourbon').includePaths;

window.vue = require('vue');

import router from "./router";
import VueRouter from 'vue-router';
import axios from 'axios';
import VueAxios from "vue-axios";
import App from "./components/App";
import Desk from "./components/Desk";
import Thread from "./components/Thread";
import Register from "./components/Register";
import Login from "./components/Login";
import ModalForm from "./components/ModalForm";


vue.component('App', require('./components/App').default);
vue.component('Desk', require('./components/Desk').default);
vue.component('Thread', require('./components/Thread').default);
vue.component('Register', require('./components/Register').default);
vue.component('Login', require('./components/Login').default);
vue.component('ModalForm', require('./components/ModalForm').default);


vue.use(VueRouter);


const app = new vue({
    el:'#app',
    render: h=>h(App),
    router
})
