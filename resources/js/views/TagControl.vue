<template>
    <div>
        <div class="ml-5">
            <h2>Manage tags</h2>
            <response-view :response="responseText" :class="'response ' + responseClass"></response-view>
            <h4>Current tags:</h4>
            <div class="tag-container">
                <span v-for="(tag, index) in tags" :key="index" class="tag">{{tag.name}}</span>
            </div>

            <h4>Add tag</h4>
            <form @submit.prevent="submitTag">
                <div class="form-group">
                    <label for="name">Tag name</label>
                    <input 
                        id="name" 
                        name="name"
                        type="text"
                        class=""
                        v-model="newTag.name"
                        placeholder="Post title" />
                </div>
                <div>
                    <button type="submit" class="button ml-5">Submit</button>
                </div>
            </form>
        </div>
        
    </div>    
</template>


<script>
import ResponseView from '../components/ResponseView';
export default {
    components: {
        ResponseView
    },
    data() {
        return {
            tags: [],
            newTag: {},
            responseText: {},
            responseClass: '',
        }
    },
    created() {
        this.getTags();
    },
    methods: {
        getTags(){
            this.$store.dispatch('getTags').then(response => this.tags = response);
        },
        submitTag(){
            var self = this;
            this.$store.dispatch('storeTag', this.newTag).then(function(response){
                self.notifyUser('success', {body: ['Your tag has been added.']});
                self.getTags();
            }).catch(function(response){
                self.notifyUser('error', response.response.data.errors);
            });
        },
        notifyUser(className, responseText){
            this.responseClass = className;
            this.responseText = responseText;
        },
    },
}
</script>


<style>

</style>