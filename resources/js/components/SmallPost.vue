<template>
    <div>
        <div class="post-card">
            <div class="post-title">{{ post.title }}</div>
            <div class="post-body">
                <p class="silent">Written by {{post.author}} on {{post.created_at}}</p>
                {{ post.description }}
            </div>
            <div class="post-footer">
                <router-link :to="postLink">
                    Read more
                </router-link>
            </div>
        </div>
    </div>    
</template>


<script>

export default {
    
    name: 'SmallPost',
    props: {
        post: Object,
    },
    computed: {
        postLink() {
            return {
                name: "post",
                params: {
                    id: this.post.id
                }
            }
        }
    }
}
</script>


<style>
.post-card{
    background-color:#f3f7f9f1;
    border-radius: .5rem;
    margin: 0 0 1rem 1rem;
    border: 2px solid #d7dadbf1;
    width: 50%;
}
.post-title{
    background-color:#d7dadbf1;
    display:block;
    padding: 1rem;
    border-radius: .375rem .375rem 0 0;
    font-weight: 500;
    font-size: 1.2rem;
}
.post-body{
    padding: 1rem;
    color:black;
}
.post-footer{
    padding: 1rem;
    background-color:#d7dadbf1;
    border-radius: 0 0 .375rem .375rem;
}
p.silent {
    font-weight:400;
    font-size:0.75rem;
    letter-spacing: 0.01rem;
    margin-top:0;
}
</style>