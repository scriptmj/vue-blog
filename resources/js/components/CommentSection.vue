<template>
    <div>
        <div v-if="loading">Loading comments</div>

        <response-view v-if="error" :response="error" :class="'response error'"></response-view>

        <new-comment :id="postid"></new-comment>

        <hr />

        <template v-for="comment in comments">
            <comment :comment="comment" :key="comment.id"></comment>
        </template>

        

        
    </div>

</template>


<script>
import Comment from '../components/Comment.vue';
import NewComment from './NewComment.vue';
export default {
    components: { Comment, NewComment },
    props: {
        comments: Array,
        postid: Number,
    },
    created(){
        //this.fetchComments();
    },
    data(){
        return {
            //comments: [],
            loading: false,
            error: null,
        }
    },
    methods: {
        // fetchComments(){
        //     axios.get('/comments/' + postid).then(function(response){
        //         console.log(response.data.data);
        //         self.comments = response.data.data;
        //         self.loading = false;
        //     }).catch(function(response){
        //         console.log(response);
        //         self.error = response;
        //         self.loading = false;
        //     });
        // }
    },
}
</script>


<style>

</style>