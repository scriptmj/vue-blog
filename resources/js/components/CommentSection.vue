<template>
    <div>
        <template v-for="comment in comments">
            <comment :comment="comment" :key="comment.id"></comment>
        </template>
    </div>

</template>


<script>
export default {
    props: {
        id: Number,
    },
    created(){
        this.fetchComments();
    },
    data(){
        return {
            comments: [],
        }
    },
    methods: {
        fetchComments(){
            //Fetch comments from backend.
        }
    },
}
</script>


<style>

</style>