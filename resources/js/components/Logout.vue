<template>
    <li class="nav-item">
        <button @click="logout" type="submit" class="logout-button">Logout</button>
    </li>
</template>


<script>
//import store from '../store';
export default {
    methods: {
        logout() {
            var self = this;
            axios.post('/logout').then(function(response){
                if(response.status == 200){
                    self.$store.commit('logoutUser');
                    //self.notifyUser('success', {body:['You have successfully logged in.']});
                    //redirect
                }
            }).catch(function(response){
                //self.notifyUser('error', response.response.data.errors);
            });
        },
    },
}
</script>


<style>
    button.logout-button{
        cursor: pointer;
        background-color:inherit;
        color:teal;
        border: none;
        padding: 10px;
        line-height: 1.5;
        font-size: 1.7rem;
        font-weight: 600;
        font-family: BlinkMacSystemFont,-apple-system,"Segoe UI",Roboto,Oxygen,Ubuntu,Cantarell,"Fira Sans","Droid Sans","Helvetica Neue",Helvetica,Arial,sans-serif;
    }
    button.logout-button:hover{
        text-decoration-line: underline;
    }
</style>