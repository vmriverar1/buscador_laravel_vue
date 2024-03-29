// windows._ = require('lodash');  

// AXIOS
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// VUE
import { createApp } from 'vue';
import App from '../vue/App.vue';
window.app = createApp(App);
window.vm = app.mount('#app');