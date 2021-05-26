<template>
    <div>
        <span v-if="loading">Loading posts</span>

        <table class="post-overview-table" v-if="!loading">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="post in posts" :key="post.id">
                    <td>{{post.title}}</td>
                    <td>{{post.created_at}}</td>
                    <td>
                        <router-link :to="getEditLink(post.id)" class="actions-link">Edit</router-link>
                        /
                        Delete</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import store from '../store';

export default {
    mounted() {
        this.getUserPosts();
    },
    data() {
        return {
            posts: [],
            loading: true,
        }
    },

    methods: {
        getUserPosts(){
            this.$store.dispatch('fetchPostsByUser').then((response) => {
                //console.log(response);
                this.posts = response.data.data;
                this.loading = false;
            }).catch(function(error){
                console.log(error);
            });
        },
        getEditLink(id){
            return {
                name: "edit",
                params: {
                    id: id
                }
            }
        },
    },

}
</script>


<style>
    .post-overview-table{
        padding:2px;
    }
    .post-overview-table td{
        padding:5px;
    }
    a.actions-link{
        text-decoration: none;
        color: black;
        background:none;
    }
    a.actions-link:hover{
        text-decoration-line: underline;
        color: black;
        background:none;
    }
</style>