
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueChatScroll from 'vue-chat-scroll'

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 * 
 * Vue.component('example-component', require('./components/ExampleComponent.vue'));
 * 
 */

Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
Vue.use(VueChatScroll)

const app = new Vue({
    el: '#app',

    data: {
        messages: []
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
                console.log(response.data);
            });
            this.scrollToEnd();
        },

        addMessage(message) {
            this.messages.push(message);

            console.log(message);

            axios.post('/messages', message).then(response => {
                console.log(response.data);
            });
            this.scrollToEnd();
        },

        scrollToEnd(){
            $('.card-body-message').animate({ scrollTop: $('.card-body-message').prop("scrollHeight")}, 1000);
        },

        playSound(){
            var audio = new Audio('/music/to-the-point.mp3');
            audio.play();
        }
    },

    created() {
        this.fetchMessages();
        Echo.private('chat').listen('MessageSent', (e) => {
            this.messages.push({
                message: e.message.message,
                user: e.user,
                created_at:e.message.created_at
            });
        });
    },

    updated (){
        this.scrollToEnd();
        this.playSound();
    },

});


