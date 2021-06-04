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
        /*
        User interaction
        */
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
        logout: ({commit, dispatch}) => {
            return new Promise((resolve) => {
                axios.post('/logout').then(function(response){
                    commit('logoutUser');
                    self.$router.push('/');
                }).catch(function(error){
                    console.log(error);
                });
            })
        },

        async getUser ({commit, dispatch}) {
            return new Promise((resolve, reject) => {
                axios.get('/getuser').then(function(response){
                    if(response.data != ""){
                        commit('setUser', response.data.data);
                    }
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
            });
        },

        /*
        Posts
        */
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

        getPost: ({commit, dispatch}, postId) => {
            return new Promise((resolve, reject) => {
                axios.get('/get/' + postId).then(function(response){
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                })
            })
        },
        storePost: ({commit, dispatch}, post) => {
            return new Promise((resolve, reject) => {
                axios.post('/post/store', post).then(function(response){
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
            });
        },
        editPost: ({commit, dispatch}, post) => {
            return new Promise((resolve, reject) => {
                axios.post('/post/edit/' + post.id, post.post).then(function(response){
                    resolve(response);
                }).catch(function(error){
                    reject(error);
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


        /* 
        Tags
        */
        getTags: () => {
            return new Promise((resolve) =>{
                axios.get('/tags').then(function(response) {
                    resolve(response.data.data);
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
        },

        /*
        Comments 
        */
       storeComment: ({commit, dispatch}, comment) => {
           return new Promise((resolve, reject) => {
                axios.post('/newcomment', comment).then(function(response){
                    resolve(response);
                }).catch(function(error){
                    reject(error);
                });
           });
       },
       getComments: ({commit, dispatch}, postId) => {
           return new Promise((resolve, reject) => {
               axios.get('/comments/' + postId).then(function(response){
                   resolve(response);
               }).catch(function(error){
                   console.log(error);
               });
           });
       },

       /*
       Premium 
       */
       storePremium: ({commit, dispatch}, creditcard)=> {
           return new Promise((resolve, reject) => {
               axios.post('/premium/new', creditcard).then(function(response){
                   resolve(response);
               }).catch(function(error){
                   reject(error);
               });
           });
       },
       getUserPremium: ({commit, dispatch}) => {
           return new Promise((resolve, reject) => {
               axios.get('/premium').then(function(response){
                   resolve(response);
               }).catch(function(error){
                   reject(error);
               });
           });
       },
       cancelPremium: ({commit, dispatch}) => {
           return new Promise((resolve, reject) => {
               axios.post('/premium/cancel').then(function(response){
                   resolve(response);
               }).catch(function(error){
                   console.log(error);
               });
           });
       },

    },
    getters: {
        isAuthenticated: (state) => {
            return !!state.user;
        },
        userId: (state) => {
            return state.user.id;
        },
        isPremium: (state) => {
            return state.user.premium;
        },
    },
})

export default store;