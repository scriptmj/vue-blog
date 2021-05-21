<template>
    <div>
        <div class="page">
            <div v-if="loading">Loading post</div>

            <response-view v-if="error" :response="error" :class="'response error'"></response-view>

            <div v-if="post">
                <post :post="post"></post>  
                <hr>
                <h2 class="ml-5">Comments</h2>

                <comment-section :comments="post.comments" :postid="post.id"></comment-section>
            </div>
        </div>
    </div>    
</template>


<script>
import Post from '../components/Post.vue';
import ResponseView from '../components/ResponseView.vue';
import CommentSection from '../components/CommentSection.vue';
export default {
    created(){
        this.fetchPost();
    },

    components: { Post, ResponseView, CommentSection },
    data() {
        return {
            loading: false,
            post: null,
            error: null,
        }

    },
    methods: {
        fetchPost(){
            this.loading = true;
            this.error = this.post = null;
            var id = this.$route.params.id;
            var self = this;
            axios.get('/view/' + id).then(function(response){
                self.post = response.data.data;
                self.loading = false;
            }).catch(function(response){
                self.error = response;
                self.loading = false;
            });
        },

    },
}
</script>


<style>

</style>