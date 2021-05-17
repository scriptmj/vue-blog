<template>
    <div>
        <template v-for="post in posts">
            <small-post :post="post" :key="post.id"></small-post>
        </template>
    </div>
</template>

<script>
import axios from 'axios';
import SmallPost from '../components/SmallPost';



export default {
    components: { SmallPost },
    created() {
        axios.get('/blogposts').then(response => this.posts = response.data.data);
    },
    data() {
        return {
            posts: []
        }
    }
}
</script>

<style>
.page{
    margin-left: 25px;
    width: 75%;
}
</style>