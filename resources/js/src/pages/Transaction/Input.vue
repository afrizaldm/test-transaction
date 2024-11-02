<template>
    <div class="form-container">
        <form @submit.prevent="handleSubmit">
            <div>
                <label for="name">User ID:</label>
                <input v-model="formData.user_id" id="name" type="text" required />
            </div>

            <div>
                <label for="city">Amount:</label>
                <input v-model="formData.amount" id="city" type="number" required />
            </div>

            <div>
                <label for="state">Status:</label>
                <input v-model="formData.status" id="state" type="text" required />
            </div>

            <label for="county">Status:</label>
            <select v-model="formData.status" id="county" required>
                <option disabled value="">Please select status</option>
                <option :selected="formData.status == status.value" v-for="status in all_status" :key="(status.id as number)" :value="status.value">
                    {{ status.name }}
                </option>
            </select>

            <button type="submit">Save</button>
        </form>
    </div>
</template>
<script setup lang="ts">
import { ref, onMounted } from "vue";
import { Transaction } from "@/types";
import { axios } from "@/modules/axios";
import router from "@/router";
import { useRoute } from "vue-router";

const route = useRoute()

const all_status = [
    { id: 1, name: "Pending", value: 'pending' },
    { id: 2, name: "Success", value: 'success' },
    { id: 3, name: "Failed", value: 'failed' },
]

const formData = ref<Transaction>({
    id: null,
    amount: 0,
    status: '',
    user_id: 0,
})

const init = async () => {
    const id = route.params?.id ?? null

    if(!id) {
        return
    }

    const res = await axios.get('/transactions/' + id)

    formData.value = res.data.data as Transaction
    
}

const handleSubmit = async () => {

    if(formData.value.id == null) {

        const res = await axios.post('/transactions', formData.value)
        console.log({ date: res.data })
        
    } else {
        const res = await axios.put(`/transactions/${formData.value.id}`, formData.value)
        console.log({ date: res.data })
    }

    clearForm()
    router.back()

}

const clearForm = () => {
    formData.value = {
        id: 0,
        amount: 0,
        status: '',
        user_id: 0,
    }
};

onMounted(() => init())

</script>
<style scoped lang="scss">
.form-container {
    width: 300px;
    margin: auto;
}

form div {
    margin-bottom: 10px;
}

input,
select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
}

input:focus,
select:focus {
    outline: none;
    border-color: #4a90e2;
    /* Highlight color on focus */
}

button {
    margin-top: 10px;
    padding: 10px;
    background-color: #4a90e2;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

button:hover {
    background-color: #357ab7;
}
</style>