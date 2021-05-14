<template>
    <div>
        <filtering
            :filter="filter"
            @change-filter-field="changeFilter"
            @change-filter-query="changeQuery"
            ></filtering>

        <table>
            <template v-for="individual in people">
                <team-member 
                    :person="individual" 
                    :filter="filter" 
                    :key="individual.index"></team-member>
            </template>
        </table>
    </div>
</template>


<script>
import TeamMember from "../components/book/TeamMember.vue";
import Filtering from "../components/book/Filtering.vue";

export default {
    components: { TeamMember, Filtering }, 
    data (){
        return {
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
        // Event listener
        changeFilter(field){
            this.filter.query = '';
            this.filter.field = field;
        },
        changeQuery(query){
            this.filter.query = query;
        }
    },
}
</script>


<style>

</style>