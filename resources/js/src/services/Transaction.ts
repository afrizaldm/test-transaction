import { useStorage } from "@vueuse/core";
import { Transaction } from "@/types/Transaction";
import { computed } from "vue";

export const TransactionStorage = useStorage<Transaction[]>('transaction-data', []);


export const clear = () => TransactionStorage.value = []

export default {
    TransactionStorage,
    clear,
}