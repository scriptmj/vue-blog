<template>
    <div>
        <ul class="navbar">
            <li class="nav-item">
                <router-link to="/" exact class="nav-a">Home</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/about" class="nav-a">About</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/contact" class="nav-a">Contact</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/newpost" class="nav-a">New post</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/login" class="nav-a">Login</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/register" class="nav-a">Register</router-link>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    setup() {
        
    },
    data() {
        return {
           
        }
    }
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
</style>