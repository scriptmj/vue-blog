<template>
    <form>
        <label for="filterField">
            Field:
            <select id="filterField" @change="changeFilterField($event)">
                <option value="">Disable filters</option>
                <option value="isActive">Active user</option>
                <option value="name">Name</option>
                <option value="email">Email</option>
                <option value="balance">Balance</option>
                <option value="registered">Date registered</option>
            </select>
        </label>

        <label for="filterQuery" v-show="filter.field && !isActiveFilterSelected()">
            Query:
            <input type="text" id="filterQuery" v-model="filter.query">
        </label>

        <span v-show="filter.field && isActiveFilterSelected()">
            Active
            <label for="userStateActive">
                Yes: 
                <input type="radio" v-bind:value="true" id="userStateActive" v-model="filter.query" selected>
            </label>
            <label for="userStateInactive">
                No:
                <input type="radio" v-bind:value="false" id="userStateInactive" v-model="filter.query">
            </label>
        </span>
    </form>
</template>

<script>
export default {
    props: {
        filter: Object,
    },
    methods: {
        isActiveFilterSelected(){
            return (this.filter.field === 'isActive');
        },
        // Event listener
        changeFilterField(event){
            this.filter.query = '';
            this.$emit('change-filter-field', event.target.value);
        }
    },
    watch: {
        'filter.query': function() {
            this.$emit('change-filter-query', this.filter.query)
        }
    },
}
</script>

<style>

</style>