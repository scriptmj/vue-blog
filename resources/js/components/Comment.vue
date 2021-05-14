<template>
    <div>
        <h4>{{comment.user}}</h4>
        <p>{{comment.body}}</p>
        <p class="silent">Posted on {{comment.created_at}}</p>
    </div>
</template>


<script>
export default {
    props: {
        comment: Object,
    },
}
</script>


<style>

</style>