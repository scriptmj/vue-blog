<template>
    <div>
        <response-view v-if="submitted" :response="responseText" :class="'response ' + responseClass"></response-view>
        <div class="form-group">
            <form @submit.prevent="submitForm">
                <label for="comment">Post new comment</label>
                <textarea 
                    id="comment" 
                    name="comment"
                    type="text"
                    class=""
                    rows="3"
                    v-model="comment.body"
                    placeholder="Write your comment" />
                    <br />
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
    </div>
</template>


<script>
import ResponseView from './ResponseView.vue';
export default {
    props: {
        id: Number,
    },
    components: {
        ResponseView
    },
    data() {
        return {
            comment: {
                'body': "",
                'post_id': this.id,
            },
            responseText: {},
            responseClass: "hidden",
            submitted: false,
        }
    },
    methods: {
        submitForm(){
            var self = this;
            this.$store.dispatch('storeComment', this.comment).then(function(response){
                self.notifyUser('success', {body: ['Your comment has been published']});
                self.comment.body = "";
                self.$emit('reload');
            }).catch(function(error){
                self.notifyUser('error', error.response.data.errors);
            });
        },
        notifyUser(className, responseText){
            this.submitted = true;
            this.responseClass = className;
            this.responseText = responseText;
        },
    },
}
</script>


<style>

</style>