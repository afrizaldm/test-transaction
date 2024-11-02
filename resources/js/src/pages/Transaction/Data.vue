<script setup lang="ts">

import { ref, onMounted } from "vue";
import { TransactionStorage } from "@/services/Transaction";
import { Transaction } from "@/types";
import { axios } from "@/modules/axios";
import router from "@/router";

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


</script>
<template>
    <h2>Data Transactions</h2>

    <button @click="add">Add New</button>

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
            <tr v-for="item in TransactionStorage">
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
        
        min-width: 100px;
    }
}
</style>