<template>
    <div>
        <div class="ml-5">
            <h2>Premium</h2>
            <response-view :response="responseText" :class="'response ' + responseClass"></response-view>

<!-- If already subscribed -->
            <div v-if="premiumLoaded">You are subscribed.
                <p>Your credit card number: {{premiumCcnumber}}</p> 
                <div v-if="user.premiumAccount.active">
                    <p>Next payment on: {{premiumExpDate}}</p>
                    <button class="button" @click="cancelPremium">Cancel premium subscription</button>
                </div>
                <div v-if="!user.premiumAccount.active">
                    Your subscription will end on {{premiumExpDate}}
                </div>
                
            </div>

<!-- If not already subscribed -->
            <div v-if="!user.premium">
                <h4>Sign up for premium content.</h4>
                <form @submit.prevent="submitPremium">
                    <div class="form-group">
                        <label for="ccname">Name (As printed on the credit card)</label>
                        <input 
                            id="ccname" 
                            name="ccname"
                            type="text"
                            class=""
                            v-model="creditcard.ccname"
                            placeholder="Name" />
                    </div>  
                    <div class="form-group">
                        <label for="ccnumber">Credit card number</label>
                        <input 
                            id="ccnumber" 
                            name="ccnumber"
                            type="text"
                            class=""
                            v-model="creditcard.ccnumber"
                            placeholder="Credit card number" />
                    </div> 
                    <div class="form-group">
                        <label for="ccexpdate">Expiration date (4 numbers MMYY, eg: 0623)</label>
                        <input 
                            id="ccexpdate" 
                            name="ccexpdate"
                            type="text"
                            class=""
                            v-model="creditcard.ccexpdate"
                            placeholder="Exp date" />
                    </div> 
                    <div class="form-group">
                        <label for="cccvv">CVV</label>
                        <input 
                            id="cccvv" 
                            name="cccvv"
                            type="number"
                            class=""
                            v-model="creditcard.cccvv"
                            placeholder="CCV" />
                    </div> 
                    
                    <div>
                        <button type="submit" class="button ml-5">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>


<script>
import ResponseView from '../components/ResponseView';
export default {
    components: {
        ResponseView
    },
    data(){
        return {
            premiumLoaded: false,
            user: {
                premiumAccount: {
                    ccnumber: '',
                    premium_expiration_date: '',
                },
            },
            creditcard: {ccexpdate: ''},
            responseClass: '',
            responseText: {},
        }
    },
    mounted(){
        this.getUser();
    },
    methods: {
        getUser(){
            var self = this;
            this.$store.dispatch('getUser').then(function(response){
                if(response){
                    self.user = response.data.data;
                    if(self.user.premium){
                        self.getUserPremium();
                    }
                }
            });
        },
        submitPremium(){
            var self = this;
            this.creditcard.ccexpdate = this.setExpDate(this.creditcard.ccexpdate);
            this.$store.dispatch('storePremium', this.creditcard).then(function(response){
                self.getUser();
            }).catch(function(response){
                self.notifyUser('error', response.response.data.errors);
            });
        },
        notifyUser(className, responseText){
            this.responseClass = className;
            this.responseText = responseText;
        },
        setExpDate(expdate){
            if(expdate.substring(2,3) == '/'){
                return expdate;
            } else {
                return expdate.substring(0, 2) + '/' + expdate.substring(2);
            }
        },
        getUserPremium(){
            var self = this;
            this.$store.dispatch('getUserPremium').then(function(response){
                console.log(response.data.data);
                self.user.premiumAccount = response.data.data;
                self.premiumLoaded = true;
                //self.user.premiumAccount.ccnumber = response.data.data.ccnumber;
            });
        },
        cancelPremium(){
            this.premiumLoaded = false;
            var self = this;
            this.$store.dispatch('cancelPremium').then(function(response){
                self.getUserPremium();
            });
        },
    },
    computed: {
        premiumCcnumber() {
            return this.user.premiumAccount.ccnumber;
        },
        premiumExpDate() {
            return this.user.premiumAccount.premium_expiration_date;
        },
    }
}
</script>


<style>
</style>