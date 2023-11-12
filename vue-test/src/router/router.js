import {createRouter, createWebHistory} from "vue-router";
import Home from "../views/Home.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import DefaultLayout from "../layouts/DefaultLayout.vue";
import AuthLayout from "../layouts/AuthLayout.vue";

const routes = [
    {
        path: '/',
        name: 'Default',
        redirect: 'home',
        component: DefaultLayout,
        children: [
            {
                path: '/home',
                name: 'home',
                component: Home,
            }
        ]

    },
    {
        path: '/auth',
        name: 'Auth',
        component: AuthLayout,
        children: [
            {
                path: 'login',
                name: 'login',
                component: Login
            },
            {
                path: 'register',
                name: 'register',
                component: Register
            }
        ]
    },
    {
        path: '/login',
        redirect: 'auth/login'
    },
    {
        path: '/register',
        redirect: 'auth/register'
    },
]

const router = createRouter({
    routes,
    history: createWebHistory()
});

export default router