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

                    commit('setUser', response.data);
                    resolve(response);
                }).catch(function(error){
                    reject(error.response.data.errors);
                });
            });
        },
        async getUser ({commit, dispatch}) {
            return new Promise((resolve, reject) => {
                axios.get('/getuser').then(function(response){
                    //console.log(response);
                    if(response.data != ""){
                        commit('setUser', response.data);
                    }
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
            });
        },
        async fetchPostsByUser ({commit, dispatch}) {
            await dispatch('getUser');
            return new Promise((resolve, reject) => {
                axios.get('/user/posts/' + this.state.user.id).then(function(response){
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
            });
        },
        getPost: ({commit, dispatch}, postId) => {
            return new Promise((resolve, reject) => {
                axios.get('/get/' + postId).then(function(response){
                    resolve(response.data);
                }).catch(function(error){
                    reject(error);
                })
            })
        }
    },
    getters: {
        isAuthenticated: (state) => {
            return !!state.user;
        },
        userId: (state) => {
            return state.user.id;
        },
    },
})

export default store;