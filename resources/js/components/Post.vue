<template>
    <div>
        <h1>{{post.title}}</h1>
        <p class="silent">Written by {{post.author}} on {{post.created_at}}</p>
        <p>{{post.body}}</p>
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