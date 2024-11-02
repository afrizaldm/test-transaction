import { useStorage } from "@vueuse/core";

export const TokenStorage = useStorage<string>('token-data', null);


export const clear = () => TokenStorage.value = null


export default {
    TokenStorage,
    clear,
}