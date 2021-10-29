/**
 * Модуль статей
 */
export const namespaced = true;

export const state = {
    article: {
        comments: {},
        tags: {},
        statistic: {
            likes: 0,
            views: 0
        }
    },
    likeIt: true,
    commentSuccess: false,
    errors: []
};

export const actions = {
    getArticleDate(context, payload) {
        axios.get('/api/article-json', {params: {slug: payload}})
            .then((response) => {
                context.commit('SET_ARTICLE', response.data.data);
            })
            .catch((e) => {
                console.log('Ошибка получения статьи', e.message);
            });
    },
    viewsIncrement(context, payload) {
        console.log("rootState.slug", context.rootState.slug);
        console.log("rootGetters.articleSlugReverse", context.rootState.articleSlugRevers);

        setTimeout(() => {
            axios.put('/api/article-views-increment', {slug: payload})
                .then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                })
                .catch((e) => {
                    console.log('Ошибка изменения счётчика просмотров', e.message);
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
                console.log('Ошибка изменения счётчика лайков', e.message);
            });
    },
    addComment(context, payload) {
        axios.post('/api/article-add-comment', {
            subject: payload.subject,
            body: payload.body,
            article_id: payload.article_id
        })
            .then((response) => {
                context.commit('SET_COMMENT_SUCCESS', !context.state.commentSuccess);
                context.dispatch('getArticleDate', context.rootState.slug);
            })
            .catch((e) => {
                // error.response.status - отсюда можно взять код ошибки, если нужна конкретная
                context.state.errors = e.response.data.errors;
                console.log('Ошибка добавления комментария', e.message);
            });
    }
};
export const getters = {
    // Получаем просмотры
    articleView(state) {
        return state.article.statistic.views;
    },
    // Получаем лайки
    articleLikes(state) {
        return state.article.statistic.likes;
    }
};
export const mutations = {
    SET_ARTICLE(state, payload) {
        return state.article = payload;
    },
    SET_LIKE(state, payload) {
        return state.likeIt = payload;
    },
    SET_COMMENT_SUCCESS(state, payload) {
        return state.commentSuccess = payload;
    }
};
