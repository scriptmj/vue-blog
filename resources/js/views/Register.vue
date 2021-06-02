<template>
    <div>
        <h2 class="ml-5">Register</h2>

        <response-view :response="responseText" :class="'response ' + responseClass"></response-view>
        <form @submit.prevent="submitRegister">
        <div class="form-group">
            <label for="name">Name</label>
            <input 
                id="name" 
                name="name"
                type="text"
                class=""
                v-model="register.name" />
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input 
                id="email" 
                name="email"
                type="email"
                class=""
                v-model="register.email" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input 
                id="password" 
                name="password"
                type="password"
                class=""
                v-model="register.password" />
        </div>
        <div class="form-group">
            <label for="password_confirmation">Repeat password</label>
            <input 
                id="password_confirmation" 
                name="password_confirmation"
                type="password"
                class=""
                v-model="register.password_confirmation" />
        </div>
        <div>
            <button type="submit" class="button ml-5">Submit</button>
        </div>
    </form>
    </div>
</template>

<script>
import ResponseView from '../components/ResponseView.vue';
import store from "../store";
export default {
    components: { ResponseView },
    data() {
        return {
            register: {
                'name': '',
                'email': '',
                'password': '',
                'password_confirmation': '',
            },
            responseText: {},
            responseClass: 'hidden',
        }
    },
    methods: {
        submitRegister(){
            var self = this;
            const { name, email, password, password_confirmation } = this.register;
            this.$store.dispatch('register', { name, email, password, password_confirmation }).then((response)=> {
                this.$router.push('/');
            }).catch((error)=>{
                console.log(error);
                self.notifyUser('error', error);
            });
        },
        notifyUser(className, responseText){
            this.responseClass = className;
            this.responseText = responseText;
        },
    }
}
</script>

<style>

</style>