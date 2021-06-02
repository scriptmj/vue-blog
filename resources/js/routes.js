import Vue from 'vue';
import VueRouter from 'vue-router';
import store from './store';


let routes = [
    {
        path: '/',
        component: require('./views/Home.vue').default,
    },
    {
        path: '/newpost',
        component: require('./views/NewPost.vue').default,
        //meta: { requiresAuth: true },
    },
    {
        name: 'post',
        path: '/view/:id',
        component: require('./views/ViewPost.vue').default,
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: require('./views/EditPost.vue').default,
        //meta: { requiresAuth: true },
    },
    {
        name: 'userPosts',
        path: '/yourposts',
        component: require('./views/UserPosts.vue').default,
        //meta: { requiresAuth: true },
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
    {
        name: 'tags',
        path: '/tags',
        component: require('./views/TagControl.vue').default,
    },
];

const router = new VueRouter({
    routes,
    
});

// router.beforeEach((to, from, next) => {
//     if(to.meta.requiresAuth){
//         if(!store.state.user){
//             next({
//                 name: "login"
//             });
//         } else {
//             next();
//         }
//     } else {
//         next();
//     }
// });

export default router;