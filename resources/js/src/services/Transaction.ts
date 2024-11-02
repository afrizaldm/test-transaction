import { useStorage } from "@vueuse/core";
import { Transaction } from "@/types/Transaction";
import { computed } from "vue";

export const UserStorage = useStorage<Transaction>('transaction-data');

export const isAuthenticated = computed(() => {
    return UserStorage.value?.uuid ? true : false;

})

export const clear = () => UserStorage.value = null

export default {
    UserStorage,
    clear,
    isAuthenticated,
}