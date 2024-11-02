import { useStorage } from "@vueuse/core";
import { User } from "@/types";
import { computed } from "vue";

export const AuthStorage = useStorage<User>('auth-data', null);


export const clear = () => AuthStorage.value = null

export const isAuthenticated = computed(() => {
    return AuthStorage.value?.id ? true : false;

})

export default {
    AuthStorage,
    clear,
}