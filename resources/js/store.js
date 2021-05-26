import axios from 'axios';
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: null,
    },
    mutations: {
        setUser(state, user){
            state.user = user;
        },
        logoutUser(state){
            state.user = null;
        },
    },
    actions: {
        login: ({commit, dispatch}, user) => {
            return new Promise((resolve, reject) => {
                axios.post('/login', user).then(function(response){
                    const user = response.data;
                    commit('setUser', user);
                    resolve(response);
                }).catch(function(error){
                    reject(error.response.data.errors);
                });
            });
        },
        getUser: ({commit, dispatch}) => {
            return new Promise((resolve, reject) => {
                axios.get('/getuser').then(function(response){
                    //console.log(response);
                    if(response.data != ""){
                        const user = response.data;
                        commit('setUser', user);
                    }
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
            });
        },
    },
    getters: {
        isAuthenticated: (state) => {
            return !!state.user;
        },
    },
})

export default store;