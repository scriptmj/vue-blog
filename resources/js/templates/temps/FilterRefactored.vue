<template>
    <div>
        <form>
            <label for="filterField">
                Field:
                <select id="filterField" @change="changeFilter($event)">
                    <option value="">Disable filters</option>
                    <option value="isActive">Active user</option>
                    <option value="name">Name</option>
                    <option value="email">Email</option>
                    <option value="balance">Balance</option>
                    <option value="registered">Date registered</option>
                </select>
            </label>

            <label for="filterQuery" v-show="filter.field && !isActiveFilterSelected()">
                Query:
                <input type="text" id="filterQuery" v-model="filter.query">
            </label>

            <span v-show="filter.field && isActiveFilterSelected()">
                Active
                <label for="userStateActive">
                    Yes: 
                    <input type="radio" v-bind:value="true" id="userStateActive" v-model="filter.query" selected>
                </label>
                <label for="userStateInactive">
                    No:
                    <input type="radio" v-bind:value="false" id="userStateInactive" v-model="filter.query">
                </label>
            </span>
        </form>

        <table>
            <tr v-for="person in people" :key="person.index" v-show="filterRow(person)">
                <td>{{person.name}}</td>
                <td><a :href="'mailto:' + person.email">{{person.email}}</a></td>
                <td :class="balanceClass(person)">{{format(person, 'balance')}}</td>
                <td>{{format(person, 'registered')}}</td>
                <td :class="activeClass(person)">{{activeStatus(person)}}</td>
            </tr>
        </table>
    </div>
</template>


<script>
export default {
    data (){
        return {
            currency: '€',
            people: [
                        {
                            "index": 0,
                            "guid": "aa401ba4-093e-45a7-bb3f-428441a48320",
                            "isActive": true,
                            "balance": 2322.33,
                            "name": "Brennan Carey",
                            "email": "brennancarey@strezzo.com",
                            "registered": "2014-02-17T05:36:34"
                        },
                        {
                            "index": 1,
                            "guid": "4fba74da-5038-4de9-b36a-8daf131d5890",
                            "isActive": true,
                            "balance": 1361.1,
                            "name": "Dillon Bird",
                            "email": "dillonbird@strezzo.com",
                            "registered": "2017-06-09T12:29:51"
                        },
                        {
                            "index": 2,
                            "guid": "876846b9-a3d6-4ffb-8c17-ff7be67dcec5",
                            "isActive": false,
                            "balance": 1616.81,
                            "name": "Bradshaw Mckay",
                            "email": "bradshawmckay@strezzo.com",
                            "registered": "2019-10-12T09:52:50"
                        },
                        {
                            "index": 3,
                            "guid": "08a70eca-bf7a-47d4-af8e-a5060389e528",
                            "isActive": true,
                            "balance": 3652.16,
                            "name": "Wooten Howell",
                            "email": "wootenhowell@strezzo.com",
                            "registered": "2020-04-28T03:59:45"
                        },
                        {
                            "index": 4,
                            "guid": "9aa912e8-4ea6-4111-b866-03dc7cbd8a37",
                            "isActive": true,
                            "balance": 2507.86,
                            "name": "Marks Jarvis",
                            "email": "marksjarvis@strezzo.com",
                            "registered": "2014-11-21T02:23:24"
                        }
                    ],
            filter: {
                field: '',
                query: '',
            },
            
        }
    },
    methods: {
        isActiveFilterSelected(){
            return (this.filter.field === 'isActive');
        },
        activeStatus(person){
            return (person.isActive) ? 'Active' : 'Inactive';
        },
        // Display
        format(person, key){
            let field = person[key];
            let output = field.toString().trim();

            switch(key){
                case 'balance':
                    output = this.currency + field.toFixed(2);
                    break;
                case 'registered':
                    let registered = new Date(field);
                    output = registered.toLocaleString('en-UK');
                    break;
                default:
                    break;
            }
            return output;
        },
        // Filtering
        filterRow(person){
            let visible = true;
            let field = this.filter.field;
            let query = this.filter.query;
            if(field){
                if(this.isActiveFilterSelected()){
                    visible = (typeof query === 'boolean') ? (query === person.isActive) : true;
                } else {
                    query = String(query);
                    field = person[field];

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
        // CSS Classes
        activeClass(person){
            return person.isActive ? 'active' : 'inactive';
        },
        balanceClass(person){
            let balanceLevel = 'success';
            let increasing = false;
            let balance = person.balance / 1000;
            if(Math.round(balance) == Math.ceil(balance)){
                increasing = 'increasing';
            }

            if(person.balance < 2000){
                balanceLevel = 'error';
            } else if(person.balance < 3000){
                balanceLevel = 'warning';
            }
            return [balanceLevel, increasing];
        },
        // Event listener
        changeFilter(event){
            this.filter.query = '';
            this.filter.field = event.target.value;
        }
    },
    computed: {

    },
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