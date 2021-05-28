<template>
    <div>
        <pagination 
            :data="postData" 
            @pagination-change-page="getPosts"
            :show-disabled="true"></pagination>

        <template v-for="(post, index) in postData.data">
            <small-post :post="post" :key="index"></small-post>
        </template>

        <pagination 
            :data="postData" 
            @pagination-change-page="getPosts"
            :show-disabled="true"></pagination>
    </div>
</template>

<script>
import axios from 'axios';
import SmallPost from '../components/SmallPost';



export default {
    components: { SmallPost },
    created() {
        this.getPosts();
    },
    data() {
        return {
            postData: {},
        }
    },
    methods: {
        getPosts(page = 1){
            var self = this;
            axios.get('/blogposts?page=' + page).then(function(response){
                self.postData = response.data;
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