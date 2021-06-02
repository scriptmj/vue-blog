<template>
    <div>
        <div v-if="loading">Loading comments</div>

        <response-view v-if="error" :response="error" :class="'response error'"></response-view>

        <new-comment v-if=auth :id="postid" v-on:reload="reloadComments"></new-comment>

        <hr />

        <template v-for="comment in comments">
            <comment :comment="comment" :key="comment.id" class="ml-5"></comment>
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
        postid: Number,
    },
    mounted(){
        this.reloadComments();
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
            comments: [],
        }
    },
    methods: {
        reloadComments(){
            var self = this;
            this.$store.dispatch('getComments', this.postid).then(function(response){
                self.comments = response.data.data;
            });
        },
    },
}
</script>


<style>
</style>