<script setup lang="ts">

import { ref, onMounted } from "vue";
import { TransactionStorage } from "@/services/Transaction";
import { Transaction } from "@/types";
import { axios } from "@/modules/axios";
import router from "@/router";

const init = async () => {
    const res = await axios.get('/transactions')

    console.log(res?.data)

    if(res?.data.message != 'success') {
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


</script>
<template>
    <table>
        <thead>
            <td>ID</td>
            <td>User ID</td>
            <td>Amount</td>
            <td>Status</td>
            <td>action</td>
        </thead>
        <tr v-for="item in TransactionStorage">
            <td>{{ item.id }}</td>
            <td>{{ item.user_id }}</td>
            <td>{{ item.amount }}</td>
            <td>{{ item.status }}</td>
            <td>
                <button @click="edit(item)">Edit</button>
                <button @click="destroy(item)">Delete</button>
            </td>
        </tr>
    </table>
</template>
<style lang="sass" scoped></style>