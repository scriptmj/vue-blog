<template>
    <div>
        <div v-if="loading">Loading comments</div>

        <response-view v-if="error" :response="error" :class="'response error'"></response-view>

        <new-comment v-if=auth :id="postid"></new-comment>

        <hr />

        <template v-for="comment in comments">
            <comment :comment="comment" :key="comment.id"></comment>
        </template>

    </div>

</template>


<script>
import Comment from '../components/Comment.vue';
import NewComment from './NewComment.vue';
import store from '../store';

export default {
    components: { Comment, NewComment },
    props: {
        comments: Array,
        postid: Number,
    },
    computed: {
        auth() {
            return this.$store.getters.isAuthenticated;
        },
    },
    created(){
    },
    data(){
        return {
            loading: false,
            error: null,
        }
    },
    methods: {
    },
}
</script>


<style>

</style>