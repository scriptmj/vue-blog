<template>
<div>
    <response-view :response="responseText" :class="'response ' + responseClass"></response-view>
    <form @submit.prevent="submitForm">
        <div class="form-group">
            <label for="title">Title</label>
            <input 
                id="title" 
                name="title"
                type="text"
                class=""
                v-model="post.title"
                placeholder="Post title" />
        <div class="form-group">
        </div>
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description"
                type="text"
                class=""
                rows="3"
                v-model="post.description"
                placeholder="What's this post about?" />
        <div class="form-group">
        </div>
            <label for="body">Body</label>
            <textarea 
                id="body" 
                name="body"
                type="text"
                class=""
                rows="8"
                v-model="post.body"
                placeholder="Write your post" />
        </div>
        <div class="form-group">
            <label for="tags">Categories</label>
            <multiselect 
                v-model="post.tags" 
                :options="tags"
                label="name"
                track-by="id"
                :multiple="true"
                :searchable="true"
                :taggable="true"
                :close-on-select="false"
                @tag="addTag"
                tag-placeholder="Add new category"
                placeholder="Select categories">
            </multiselect>
        </div>
        <div>
            <button type="submit" class="button ml-5">Submit</button>
        </div>
    </form>
</div>
</template>

<script>
import Tag from "./Tag.vue";
import Multiselect from 'vue-multiselect';
import ResponseView from './ResponseView.vue';

export default  {
  components: { Tag, Multiselect, ResponseView },
    setup() {
        
    },
    data() {
        return {
            tags: [],
            post: {
                title: '',
                description: '',
                body: '',
                tags: [],
                user_id: 1,
            },
            responseText: {},
            responseClass: 'hidden',
        }
    },
    mounted() {
        axios.get('/tags').then(response => this.tags = response.data);
    },
    methods: {
        addTag(newTag){
            let tag = {name: newTag};
            this.tags.push(tag);
            this.post.tags.push(tag);
        },
        submitForm(){
            var self = this;
            axios.post('/post/store', this.post).then(function(response){
                if(response.status == 200){
                    self.notifyUser('success', {body:['Your post has been published']});
                }
            }).catch(function(response){
                self.notifyUser('error', response.response.data.errors);
            });
        },
        notifyUser(className, responseText){
            this.responseClass = className;
            this.responseText = responseText;
        },
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style>
    label {
        display:block;
        padding: 0.3rem;
        letter-spacing: 0.05em;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
    }
    input {
        border-radius: .25rem;
        border: 1px solid #e8e8e8;
        background-color: #f3f7f9f1;
        width:90%;
        padding: 0.8rem;
        font-size: 1rem;
        font-family:inherit;
    }
    textarea {
        border-radius: .25rem;
        border: 1px solid #e8e8e8;
        background-color: #f3f7f9f1;
        width:90%;
        padding: 0.8rem;
        font-size: 1rem;
        font-family:inherit;
    }
    .form-group {
        padding: 1rem;
    }
    .multiselect {
        width:92%;
    }
    .multiselect__tags {
        background-color: #f3f7f9f1;
    }
    .multiselect__tag{
        background: teal;
    }
    .button {
        background: teal;
        color: white;
        padding: .8rem;
        border: 1px solid teal;
        border-radius: 5px;
        margin: 2px;
    }
</style>