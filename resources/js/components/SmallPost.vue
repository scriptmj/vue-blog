<template>
    <div>
        <div class="post-card ml-5">
            <p class="silent">{{post.created_at}}</p>
            <p>
                <router-link :to="postLink" class="post-title">
                    {{ post.title }}
                </router-link>
            </p>
            <p class="post-body">{{ post.description }}</p>
            <tag v-for="(tag, index) in post.tags" :tag="tag" :key="index"></tag>
            <div class="post-footer">
                <router-link :to="postLink">
                    Read more
                </router-link>
                By {{post.author}}
            </div>
        </div>
    </div>    
</template>


<script>
import Tag from './Tag.vue';

export default {
    components: { Tag },
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
        },
        formatDate(date){
            return new DateTimeFormat(date);
        }
    }
}
</script>


<style>
.post-card{
    background-color:white;
    border-radius: .5rem;
    padding:1rem;
    margin: 0 0 1rem 1rem;
    /* border: 2px solid #d7dadbf1; */
    width: 80%;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.06);
}
.post-title{
    display:block;
    font-weight: 700;
    font-size: 1.5rem;
    text-decoration: none;
    color:black;
}
a:hover{
    text-decoration-line: underline;
    color:teal;
}
.post-body{
    color:black;
}
.post-footer{
    display: flex;
    justify-content: space-between;
}
p.silent {
    font-weight:400;
    font-size:0.75rem;
    letter-spacing: 0.01rem;
    margin-top:0;
}
</style>