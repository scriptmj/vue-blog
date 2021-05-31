<template>
    <div>
        <div class="post-card">
                    <h1>{{post.title}}</h1>
        <p class="silent">Written by {{post.author}} on {{post.created_at}}</p>
        <p v-html="post.body">{{post.body}}</p>
        <span v-for="(tag, index) in post.tags" :key="index" class="tag"  @click="filterByTag(tag.id)">{{tag.name}}</span>
        </div>

    </div>
</template>


<script>

export default {
    props: {
        post: Object,
    },
}
</script>


<style>

</style>