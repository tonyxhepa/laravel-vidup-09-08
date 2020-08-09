

require('./bootstrap');

window.Vue = require('vue');

Vue.config.ignoredElements = ['video-js'];

require('./components/channel-upload');

const app = new Vue({
    el: '#app',
});
