<script setup lang="ts">

import { ref, onMounted } from "vue";
import { TransactionStorage } from "@/services/Transaction";
import { Transaction } from "@/types";
import { axios } from "@/modules/axios";
import router from "@/router";
import { TokenStorage } from "@/services/Token";
import { AuthStorage } from "@/services/Auth";

const filteredString = ref<string>('')
const filteredDataTransaction = ref<Transaction[]>([])

const init = async () => {
    const res = await axios.get('/transactions')

    console.log(res?.data)

    if (res?.data.message != 'success') {
        return
    }

    TransactionStorage.value = res?.data.data as Transaction[]
}

onMounted(() => {
    init()
})

const filter = (status: string) => {
    filteredString.value = status
    filteredDataTransaction.value = TransactionStorage.value.filter(transaction => transaction.status == status)
}

const edit = async (item: Transaction) => {
    router.push('/transactions/' + item.id)
}

const destroy = async (item: Transaction) => {
    const res = await axios.delete('/transactions/' + item.id)

    init()
}

const add = () => {
    router.push('transactions/add')
}

const logout = () => {
    TokenStorage.value = ''
    AuthStorage.value = null
    router.replace('/auth/signin')
}


</script>
<template>
    <h2>Data Transactions</h2>
    <div>
        <button :class="{'select': filteredString == ''}" @click="filter('')">All</button>
        <button :class="{'select': filteredString == 'pending'}" @click="filter('pending')">Pending</button>
        <button :class="{'select': filteredString == 'failed'}" @click="filter('failed')">Failed</button>
        <button  :class="{'select': filteredString == 'success'}" @click="filter('success')">Success</button>
        <button style="background-color: red;" @click="logout">Logout</button>
    </div>

    <div>
        <button @click="add">Add New</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in (filteredString == '' ? TransactionStorage : filteredDataTransaction)">
                <td>{{ item.id }}</td>
                <td>{{ item.user?.id }} - {{ item.user?.name }}</td>
                <td>{{ item.amount }}</td>
                <td>{{ item.status }}</td>
                <td>
                    <button @click="edit(item)">Edit</button>
                    <button @click="destroy(item)">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

</template>
<style scoped lang="scss">
.table {
    border: 1px solid black;

    td {
        border: 1px solid black;

        padding: 2px;
        
        min-width: 100px;
    }
}

button {
    margin: 3px 5px;
}

.select {
    background-color: green;
}
</style>