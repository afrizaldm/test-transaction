import './bootstrap';

import { createApp } from "vue";
import { axios } from "@/modules/axios";
import { AuthStorage } from "@/services/Auth";
import App from "@/App.vue";

import router from "@/router";
import { TokenStorage } from '@/services/Token';

const auth = async () => {
    try {
        const res = await axios('/auth/user');

        if (res?.data?.data != null) {
            return res.data.data;
        }

        return null
    } catch (e) {

        return null
    }
}

const app = createApp(App)
app.use(router)

router.isReady().then(async () => {

    const res = await auth()

    if (res?.data.data.token != null) {
        AuthStorage.value = res?.data.data.user
        TokenStorage.value = res?.data.data.token
    }

    app.mount('#app')
})

