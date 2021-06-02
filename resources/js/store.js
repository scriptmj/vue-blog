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
        register: ({commit, dispatch}, user) => {
            return new Promise((resolve, reject) => {
                axios.post('/register', user).then(function(response){
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
        },
        getAllPosts: ({commit, dispatch}, page) => {
            return new Promise((resolve, reject) => {
                axios.get('/blogposts?page=' + page).then(function(response){
                    resolve(response.data);
                }).catch(function(error){
                    console.log(error);
                });
            });
        },
        fetchPostsByTag: ({commit, dispatch}, tagId) => {
            return new Promise((resolve) => {
                axios.get('/blogposts/tag/' + tagId).then(function(response){
                    resolve(response.data);
                }).catch(function(error){
                    console.log(error);
                })
            })
        },
        getTags: () => {
            return new Promise((resolve) =>{
                axios.get('/tags').then(function(response) {
                    resolve(response.data.data);
                }).catch(function(error){
                    console.log(error);
                });
            });
        },
        deletePost: ({commit, dispatch}, postId) => {
            return new Promise((resolve) => {
                axios.delete('/post/destroy/' + postId).then(function(response){
                    resolve(response);
                }).catch(function(error){
                    console.log(error);
                });
            });
        },

        storeTag: ({commit, dispatch}, tag) => {
            return new Promise((resolve, reject) => {
                axios.post('/tags/new', tag).then(function(response) {
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
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