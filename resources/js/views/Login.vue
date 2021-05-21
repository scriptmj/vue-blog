<template>
    <div>
        <response-view :response="responseText" :class="'response ' + responseClass"></response-view>
        <form @submit.prevent="submitLogin">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input 
                id="email" 
                name="email"
                type="email"
                class=""
                v-model="login.email" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input 
                id="password" 
                name="password"
                type="password"
                class=""
                v-model="login.password" />
        </div>
        <div>
            <button type="submit" class="button ml-5">Submit</button>
        </div>
    </form>
    </div>
</template>

<script>
import ResponseView from '../components/ResponseView.vue';
export default {
    components: { ResponseView },
    data() {
        return {
            login: {
                'name': '',
                'password': '',
            },
            responseText: {},
            responseClass: 'hidden',
        }
    },
    methods: {
        submitLogin(){
            var self = this;
            axios.post('/login', this.login).then(function(response){
                if(response.status == 200){
                    self.notifyUser('success', {body:['Your post has been published']});
                }
            }).catch(function(response){
                self.notifyUser('error', response.response.data.errors);
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