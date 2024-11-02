import './bootstrap';

import { createApp } from "vue";
import { axios } from "@/modules/axios";
import { AuthStorage } from "@/services/Auth";
import App from "@/App.vue";

import router from "@/router";
import { TokenStorage } from '@/services/Token';

const auth = async () => {
    try {
        const res = await axios.post('/auth/user');

        if (res?.data?.data?.token) {
            return res.data?.data;
        }

        return null
    } catch (e) {

        return null
    }
}

const app = createApp(App)
app.use(router)

router.isReady().then(async () => {

    const data = await auth()

    console.log(data?.user)

    if (data?.token) {
        AuthStorage.value = data?.user
        TokenStorage.value = data?.token
    } else {
        TokenStorage.value = ''
        TokenStorage.value = null
    }

    console.log(AuthStorage.value, TokenStorage.value)

    app.mount('#app')
})

