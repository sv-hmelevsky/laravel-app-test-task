// В данном примере подключаем напрямую
//require('./bootstrap');

// Потому что так тоже можно. Но если модулей много, лучше разделять на файлы.
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

// Подключаем свою дирректорию.
import store from './store'

// Регистрация своего компонента
Vue.component('article-component', require('./components/ArticleComponent.vue').default);


const app = new Vue({
    store,
    el: '#app',
});
