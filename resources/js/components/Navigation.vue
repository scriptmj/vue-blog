<template>
    <div>
        <ul class="navbar">
            <li class="nav-item">
                <router-link to="/" exact>Home</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/about">About</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/contact">Contact</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/newpost">New post</router-link>
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
        padding: 3px 10px;
        align-items: center;
        display: flex;
    }
    .navbar {
        display:flex;
    }
    .router-link-active{
        color:red;
    }
</style>