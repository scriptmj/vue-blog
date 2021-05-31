<template>
    <div>
        <h2 class="ml-5">Overview</h2>

<div class="ml-5">
        
        Filter by tag:
        <div class="tag-container">
            <span v-for="(tag, index) in tags" :key="index" class="tag"  @click="filterByTag(tag.id)">{{tag.name}}</span>
        </div>
        <span v-if="currentFilter">Filtered by: {{currentFilter.name}}</span>
        <br />
        <span class="tag" @click="filterByTag(0)">No filter</span>
</div>


        <pagination 
            :data="postData" 
            @pagination-change-page="getPosts"
            :show-disabled="true"></pagination>

        <template v-for="(post, index) in postData.data">
            <small-post :post="post" :key="index" v-on:filter="filterByTag"></small-post>
        </template>

        <pagination 
            :data="postData" 
            @pagination-change-page="getPosts"
            :show-disabled="true"></pagination>
    </div>
</template>

<script>
import SmallPost from '../components/SmallPost';



export default {
    components: { SmallPost },
    created() {
        this.getPosts();
        this.getTags();
    },
    data() {
        return {
            postData: {},
            tags: [],
            currentFilter: null,
        }
    },
    methods: {
        getPosts(page = 1){
            this.$store.dispatch('getAllPosts', page).then((response) => {
                this.postData = response;
            });
        },
        filterByTag(tagId){
            console.log(tagId);
            if(tagId == 0){
                this.getPosts();
                this.currentFilter = null;
            } else {
                this.$store.dispatch('fetchPostsByTag', tagId).then((response) => {
                    this.postData = response;
                });
                this.currentFilter = this.tags[tagId-1];
            }
        },
        getTags(){
            this.$store.dispatch('getTags').then(response => this.tags = response);
        },
    }
}
</script>

<style>
.pagination{
    display: flex;
    list-style: none;
    border-radius:0.25rem;
}
.page-link{
    position:relative;
    display:block;
    color: teal;
    background-color:white;
    border: 1px solid #dee2e6;
    padding: .5rem .75rem;
    line-height: 1.25;
    margin-left: -1px;
}
.page-item.active .page-link {
    color: white;
    background-color: teal;
    border-color: #006666;
}
.tag-container{
    display:flex;
    flex-wrap:wrap;
    width:80%;
}
</style>