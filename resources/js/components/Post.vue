<template>
    <div>
        <div class="post-card">
                    <h1>{{post.title}}</h1>
        <p class="silent">Written by {{post.author}} on {{post.created_at}}</p>
        <p v-html="post.body">{{post.body}}</p>
        <tag v-for="tag in post.tags" :tag="tag" :key="tag.id"></tag>
        </div>

    </div>
</template>


<script>
import Tag from './Tag.vue';

export default {
    components: { Tag },
    props: {
        post: Object,
    },
}
</script>


<style>

</style>