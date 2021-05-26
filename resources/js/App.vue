<template>
    <div>
        <navigation></navigation>
        <router-view>
        </router-view>
        <footer-comp></footer-comp>
    </div>
</template>

<script>
import Navigation from './components/Navigation.vue';
import FooterComp from './components/FooterComp.vue';
import store from "./store";

export default {
    computed: {},
    components: { Navigation, FooterComp},
    mounted() {
        this.getUser();
    },
    data() {
          return {
            
        }
    },
    methods: {
        getUser(){
            this.$store.dispatch('getUser').then((response)=> {
                //
            }).catch((error)=>{
                //
            });
        },
    },
}
</script>

<style>
    body {
        font-size: 1em;
        font-weight: 400;
        line-height: 1.5;
        font-family: BlinkMacSystemFont,-apple-system,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
        background-color: rgb(240, 240, 240);
        margin:0;
        margin-top:-20px;
        margin-bottom:-35px;
    }
    a{
        color: teal;
        text-decoration: none;
    }
    .ml-5{
        margin-left:2rem;
    }
</style>