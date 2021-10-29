<template>
    <div class="row">
        <form v-if="!commentSuccess" @submit.prevent="submit_form()">
            <div class="pb-3">
                <label for="commentSubject" class="form-label">Тема комментария</label>
                <input type="text" class="form-control" id="commentSubject" v-model="subject">
                <div class="alert alert-warning" role="alert" v-if="errorMessage.subject">
                    {{errorMessage.subject[0]}}
                </div>
            </div>
            <div class="pb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea type="text" class="form-control" id="commentBody" rows="3"
                          v-model="body"></textarea>
                <div class="alert alert-warning" role="alert" v-if="errorMessage.body">
                    {{errorMessage.body[0]}}
                </div>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
        <div class="alert alert-success" role="alert" v-else>
            Комментарий успешно отправлен
        </div>
        <div class="toast-container pb-5 mt-3 mx-auto" v-for="comment in comments">
            <div class="toast show" style="min-width: 400px">
                <div class="toast-header">
                    <img src="https://via.placeholder.com/600/0f113b/fff.png?text=Laravel 8" class="rounded me-2"
                         style="width: 120px;" alt="">
                    <strong class="me-auto">{{ comment.subject }}</strong>
                    <small class="text-muted">{{ comment.created_at }}</small>
                </div>
                <div class="toast-body">
                    {{ comment.body }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            subject: '',
            body: ''
        }
    },
    computed: {
        comments() {
            return this.$store.state.article.comments;
        },
        commentSuccess() {
            return this.$store.state.commentSuccess;
        },
        errorMessage() {
            return this.$store.state.errors;
        }
    },
    methods: {
        submit_form() {
            this.$store.dispatch('addComment', {
                subject: this.subject,
                body: this.body,
                article_id: this.$store.state.article.id
            });
        }
    },
    mounted() {
        console.log('Comment component is mounted');
    }
}
</script>

<style scoped>

</style>
