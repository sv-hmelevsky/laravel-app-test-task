import Vue from 'vue';
import Vuex from 'vuex';

// Разделяем код на модули
import * as article from './modules/article';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        article
    },
    state: {
        slug: ''
    },
    actions: {},
    getters: {
        articleSlugRevers(state) {
            return state.slug.split('').reverse().join('');
        }
    },
    mutations: {
        SET_SLUG(state, payload) {
            return state.slug = payload;
        }
    },
});
