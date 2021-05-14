<template>
    <button :class="tagClass" :key="tag.id" :id="tag.id" @click="toggleSelect()">
        {{ tag.name }}
    </button>
</template>

<script>
export default {
    props: {
        tag: Object,
    },
    methods: {
        // removeChosenTag(tag){ 
        //     tag.selected = false;
        // }
        toggleSelect(){
            this.tag.selected ? this.tag.selected = false : this.tag.selected = true;
            this.$emit('toggle-selected-tag', this.tag);
        }
    },
    computed: {
        tagClass(){
            return this.tag.selected ? 'tag selected' : 'tag';
        }
    },
};
</script>

<style>
    .tag {
        color:black;
        background-color: white;
        border: 1px solid teal;
        font-size: .9rem;
        padding: .1rem .6rem;
        white-space: nowrap;
        margin-right: 3px;
        display: inline;
        border-radius: 10rem;
        cursor: pointer;
    }
    .selected {
        color: white;
        background-color: teal;
        border: 1px solid teal;
        font-weight: 700;
        font-size: 1.1rem;

    }
    .removeButton {
        font-size: 1rem;
        border: none;
        background: none;
        color: white;
        cursor: pointer;
    }
</style>