<template>
    <div class="row mt-5">
        <div class="col-12 p-3">
            <img :src="article.img" alt="" class="border rounded mx-auto d-block">
            <h5 class="mt-5">{{ article.title }}</h5>
            <p>
            <span class="tag" v-for="(tag,index) in article.tags">
                <span v-if="(index+1) < tagsLen">{{ tag.label }} | </span>
                <span v-else>{{ tag.label }}</span>
            </span>
            </p>
            <p class="card-text">{{ article.body }}</p>
            <p>Опубликовано: <i>{{ article.created_at }}</i></p>
            <div class="mt-3">
                <likes-component></likes-component>
                <views-component></views-component>
            </div>
        </div>
    </div>
</template>

<script>
import {mapState} from 'vuex';

export default {
    computed: mapState({
        article: state => state.article.article,
        tagsLen: state => state.article.article.tags.length
    }),
    mounted() {
        console.log('Article component is mounted');
    }
}
</script>

<style scoped>

</style>
