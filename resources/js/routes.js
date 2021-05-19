import Vue from 'vue';
import VueRouter from 'vue-router';


let routes = [
    {
        path: '/',
        component: require('./views/Home.vue').default,
    },
    {
        path: '/about',
        component: require('./views/About.vue').default,
    },
    {
        path: '/contact',
        component: require('./views/Contact.vue').default,
    },
    {
        path: '/newpost',
        component: require('./views/NewPost.vue').default,
    },
    {
        name: 'post',
        path: '/view/:id',
        component: require('./views/ViewPost.vue').default,
    },
    {
        name: 'login',
        path: '/login',
        component: require('./views/Login.vue').default,
    },
    {
        name: 'register',
        path: '/register',
        component: require('./views/Register.vue').default,
    },

];

export default new VueRouter({
    routes
});