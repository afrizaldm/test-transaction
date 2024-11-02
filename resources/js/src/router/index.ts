// import { createRouter, createWebHistory } from 'vue-router'

import { createRouter, createWebHistory } from "vue-router";
import { RouteRecordRaw } from 'vue-router';

import Home from '@/pages/Home.vue'
import Login from '@/pages/Login.vue'
import TransactionData from '@/pages/Transaction/Data.vue'
import TransactionInput from '@/pages/Transaction/Input.vue'

import { isAuthenticated } from "@/guard/isLogin";
import { isNotAuthenticated } from "@/guard/isNotLogin";

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        name: '',
        redirect: { name: 'transactions' }
    },
    {
        path: '/auth/signin',
        name: 'signin',
        component: Login,
        beforeEnter: isNotAuthenticated,
    },
    {
        path: '/transactions',
        name: 'transactions',
        component: TransactionData,
        beforeEnter: isAuthenticated,
    },
    {
        path: '/catalogue/add',
        name: 'transactions-add',
        component: TransactionInput,
        beforeEnter: isAuthenticated,
    },
    {
        path: '/transactions/:id',
        name: 'transactions-show',
        component: TransactionInput,
        beforeEnter: isAuthenticated,
    },
]

const router = createRouter({
    history: createWebHistory('/app'),
    routes,
})

export default router