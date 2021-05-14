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
            <input 
                id="description" 
                name="description"
                type="text"
                class=""
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
                rows="5"
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
        <button type="submit">Submit</button>
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
            },
            responseText: '',
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
            axios.post('/sendnewpost', this.post).then(function(response){
                if(response.status == 200){
                    self.notifyUser('success', 'Your post has been published');
                }
            }).catch(function(response){
                self.notifyUser('error', "Something went wrong");
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
        border: 1px #f3f7f9f1;
        background-color: #f3f7f9f1;
        width:90%;
        padding: 0.8rem;
        font-size: 1rem;
    }
    textarea {
        border-radius: .25rem;
        border: 1px #f3f7f9f1;
        background-color: #f3f7f9f1;
        width:90%;
        padding: 0.8rem;
        font-size: 1rem;
    }
    .form-group {
        padding: 1rem;
    }
    /* .multiselect {
        box-sizing: content-box;
        display:block;
        position:relative;
    }
    .multiselect__tag{
        position: relative;
        display: inline-block;
        background:teal;
        color:white;
        border-radius: 5px;
        padding: 4px 26px 4px 10px;
        margin-right: 10px;
        line-height:1;
        margin-bottom: 5px;
        font-size:14px;
    }
    .multiselect__content{
        display:block;
        list-style:none;
        text-align:left;
        padding: 0;
        margin:3px 0;
        border:1px solid lightgray;
    }
    .multiselect__option{
        padding:0 5px;
    }
    .multiselect__option--selected{
        background:#e6e6e6;
        display:block;
        padding:0 5px;
    } */
</style>