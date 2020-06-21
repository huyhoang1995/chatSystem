require('./bootstrap');

window.Vue = require('vue');

var $ = require('jquery');
global.jQuery = require("jquery");
window.$ = $;

// import service
window.service = {
    chatService: require('@libs/service/chatService').default,
}
// vue router
import VueRouter from 'vue-router';

//thực hiện router 
import routes from "./listRouter"
Vue.use(VueRouter);

// vue-couter

import LoginChatComponent from "./components/loginComponent.vue";

const router = new VueRouter({ routes })

const app = new Vue({
    el: '#app',
    router,
    data: {

    },
    methods: {

    },
    components: {
        'my-login-component': LoginChatComponent,

    }
});
