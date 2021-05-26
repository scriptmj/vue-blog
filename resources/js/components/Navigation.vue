<template>
    <div>
        <ul class="navbar">
            <li class="nav-item">
                <router-link to="/" exact class="nav-a">Home</router-link>
            </li>
            <li class="nav-item" v-if=auth>
                <router-link to="/newpost" class="nav-a">New post</router-link>
            </li>
            <li class="nav-item" v-if=auth>
                <router-link to="/yourposts" class="nav-a">Your posts</router-link>
            </li>
            <div class="float-right">
                <li class="nav-item" v-if=!auth>
                    <router-link to="/login" class="nav-a">Login</router-link>
                </li>
                <li class="nav-item" v-if=!auth>
                    <router-link to="/register" class="nav-a">Register</router-link>
                </li>
                <span v-if="auth" class="welcome-message">{{ username }}</span>
                <logout v-if=auth></logout>  
            </div>
            
        </ul>
    </div>
</template>


<script>
import Logout from './Logout.vue';
import store from '../store';

export default {
    components: {Logout},
    data() {
        return {
        }
    },
    computed: {
        username(){ return this.$store.state.user.name},
        auth(){ return this.$store.getters.isAuthenticated},
    },
}
</script>


<style>
    .nav-item {
        margin: 0;
        align-items: center;
        display: flex;
        font-size:1.7rem;
        font-weight:600;
    }
    .nav-a{
        padding:10px;
    }
    .navbar {
        display:flex;
        border-bottom: 4px solid teal;
        background-color: white;
        margin-bottom:20px;
    }
    .router-link-active{
        color:white;
        background-color: teal;
    }
    .router-link-active:hover{
        color:white;
        background-color: teal;
        text-decoration-line: none;
    }
    .float-right{
        margin-left: auto;
        display:flex;
    }
    .welcome-message{
        color: teal;
        align-items: center;
        font-size: 1rem;
        font-weight: 300;
        margin-top:auto;
        margin-bottom: auto;
    }
</style>