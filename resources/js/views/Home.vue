<template>
    <div>
        <pagination 
            :data="postData" 
            @pagination-change-page="getResults"
            :show-disabled="true"></pagination>

        <template v-for="post in postData.data">
            <small-post :post="post" :key="post.id"></small-post>
        </template>

        <pagination 
            :data="postData" 
            @pagination-change-page="getResults"
            :show-disabled="true"></pagination>
    </div>
</template>

<script>
import axios from 'axios';
import SmallPost from '../components/SmallPost';



export default {
    components: { SmallPost },
    created() {
        this.getResults();
        // var self = this;
        // axios.get('/blogposts').then(function(response){
        //     self.posts = response.data.data;
        //     self.links = response.data.links;
        //     self.meta = response.data.meta;
        // });
    },
    data() {
        return {
            postData: {},
            posts: [],
            links: null,
            meta: null,
            baseUrl: 'blogposts?page=',
        }
    },
    methods: {
        getResults(page = 1){
            var self = this;
            axios.get('/blogposts?page=' + page).then(function(response){
                self.postData = response.data;
                // self.posts = response.data.data;
                // self.links = response.data.links;
                // self.meta = response.data.meta;
            });
        }
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
</style>