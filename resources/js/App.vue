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

export default {
    computed: {},
    components: { Navigation, FooterComp},
    data() {
          return {
            
        }
    }
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
        margin-left:1.2rem;
    }
</style>