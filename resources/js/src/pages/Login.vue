<script setup lang="ts">
import { ref } from "vue";
import { axios } from "@/modules/axios";
import router from "@/router";
import { TokenStorage } from "@/services/Token";
import { AuthStorage } from "@/services/Auth";


const formData = ref<any>({
    email: '',
    password: '',
})


const handleSubmit = async () => {

    const res = await axios.post('auth/login', formData.value)

    console.log(res)

    if (res?.data.data.token == null) {
        alert(res?.data.error.message ?? 'Server Error')
        return
    }

    TokenStorage.value = res?.data.data.token
    AuthStorage.value = res?.data.data.user

    console.log(TokenStorage.value, AuthStorage.value)

    router.push('/')
}


</script>
<template>
    <p>Login</p>
    <form @submit.prevent="handleSubmit">

        <div>
            <label for="email">Email:</label>
            <input v-model="formData.email" id="email" type="email" required />
        </div>

        <div>
            <label for="city">Password:</label>
            <input v-model="formData.password" id="password" type="password" required />
        </div>

        <button type="submit">Login</button>
    </form>
</template>
<style lang="sass"></style>