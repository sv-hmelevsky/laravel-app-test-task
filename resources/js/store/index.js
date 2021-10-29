import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        article: {
            comments: {},
            tags: {},
            statistic: {
                likes: 0,
                views: 0
            }
        },
        slug: '',
        likeIt: true
    },
    actions: {
        getArticleDate(context, payload) {
            axios.get('/api/article-json', {params: {slug: payload}})
                .then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                })
                .catch((e) => {
                    console.log('Ошибка получения статьи', e.err);
                });
        },
        viewsIncrement(context, payload) {
            setTimeout(() => {
                axios.put('/api/article-views-increment', {slug: payload})
                    .then((response) => {
                        context.commit('SET_ARTICLE', response.data.data);
                    })
                    .catch((e) => {
                        console.log('Ошибка изменения счётчика просмотров', e.err);
                    });
            }, 5000);
        },
        addLike(context, payload) {
            axios.put('/api/article-likes-increment', {slug: payload.slug, increment: payload.increment})
                .then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                    context.commit('SET_LIKE', !context.state.likeIt);
                })
                .catch((e) => {
                    console.log('Ошибка изменения счётчика лайков', e.err);
                });
        }
    },
    getters: {
        articleView(state) {
            return state.article.statistic.views;
        },

        articleLikes(state) {
            return state.article.statistic.likes;
        }
    },
    mutations: {
        SET_ARTICLE(state, payload) {
            return state.article = payload;
        },
        SET_SLUG(state, payload) {
            return state.slug = payload;
        },
        SET_LIKE(state, payload) {
            return state.likeIt = payload;
        }
    },
});
