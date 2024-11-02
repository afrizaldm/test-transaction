import { useStorage } from "@vueuse/core";
import { User } from "@/types";
import { computed } from "vue";
import { TokenStorage } from "./Token";

export const AuthStorage = useStorage<User>('auth-data', null);


export const clear = () => AuthStorage.value = null

export const isAuthenticated = computed(() => {
    return TokenStorage.value ? true : false;

})

export default {
    AuthStorage,
    clear,
}