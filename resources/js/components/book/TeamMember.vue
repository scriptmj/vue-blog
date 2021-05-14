<template>
    <tr v-show="filterRow()">
        <td>{{person.name}}</td>
        <td><a :href="'mailto:' + person.email">{{person.email}}</a></td>
        <td :class="balanceClass">{{balance}}</td>
        <td>{{dateRegistered}}</td>
        <td :class="activeClass">{{status}}</td>
    </tr>
</template>

<script>
export default {
    props: {
        person: Object,
        filter: Object,
    },
    data (){
        return {
            currency: '€',
        }
    },
    methods: {

        // Filtering
        filterRow(){
            let visible = true;
            let field = this.filter.field;
            let query = this.filter.query;
            if(field){
                if(this.filter.field === 'isActive'){
                    visible = (typeof query === 'boolean') ? (query === this.person.isActive) : true;
                } else {
                    query = String(query);
                    field = this.person[field];

                    if(typeof field === 'number'){
                        query = query.replace(this.currency, '');
                        try {
                            visible = eval(field + query);    
                        } catch(e) {}
                        
                    } else {
                        field = field.toLowerCase();
                        visible = field.includes(query.toLowerCase());
                    }
                }
                
            }
            return visible;
        },
    },
    computed: {
        // CSS Classes
        activeClass(){
            return this.person.isActive ? 'active' : 'inactive';
        },
        balanceClass(){
            let balanceLevel = 'success';
            let increasing = false;
            let balance = this.person.balance / 1000;
            if(Math.round(balance) == Math.ceil(balance)){
                increasing = 'increasing';
            }

            if(this.person.balance < 2000){
                balanceLevel = 'error';
            } else if(this.person.balance < 3000){
                balanceLevel = 'warning';
            }
            return [balanceLevel, increasing];
        },
        // Display
        balance (){
            return this.currency + this.person.balance.toFixed(2);
        },
        dateRegistered() {
            let registered = new Date(this.person.registered);
            return registered.toLocaleString('en-UK');
        },
        status(){
            return (this.person.isActive) ? 'Active' : 'Inactive';
        },
    }
}
</script>

<style>
    .active, .success {
        color: green;
    }
    .inactive, .error {
        color: red;
    }
    .warning {
        color: orange;
    }
    .increasing {
        font-style: italic;
    }
</style>