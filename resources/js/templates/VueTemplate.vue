<template>
    <div>
        <p>P Text {{ computedProperty }}</p>
    </div>
</template>


<script>
export default {
    data (){
        return {
            item: 15,
            currency: '€',
        }
    },
    methods: {
        methodName(input){
            return input;
        },
    },
    computed: {
        computedProperty() {
            return methodName(this.item);
        },
    },
}
</script>


<style>

</style>