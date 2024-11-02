// import { createRouter, createWebHistory } from 'vue-router'

import { createRouter, createWebHistory } from "vue-router";
import { RouteRecordRaw } from 'vue-router';

import Home from '@/pages/Home.vue'
import TransactionData from '@/pages/Transaction/Data.vue'
import TransactionInput from '@/pages/Transaction/Input.vue'

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        name: '',
        redirect: { name: 'transactions' }
    },
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path: '/transactions',
        name: 'transactions',
        component: TransactionData,
    },
    {
        path: '/catalogue/add',
        name: 'transactions-add',
        component: TransactionInput,
    },
    {
        path: '/transactions/:id',
        name: 'transactions-show',
        component: TransactionInput,
    },
]

const router = createRouter({
    history: createWebHistory('/app'),
    routes,
})

export default router