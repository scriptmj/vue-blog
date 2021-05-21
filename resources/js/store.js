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
            router.push('/');
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
    },
    getters: {
        isAuthenticated: (state) => {
            return !!state.user;
        },
    },
})

export default store;