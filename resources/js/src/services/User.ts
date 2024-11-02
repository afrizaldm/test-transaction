import { useStorage } from "@vueuse/core";
import { User } from "@/types";

export const UserStorage = useStorage<User[]>('user-data', []);


export const clear = () => UserStorage.value = []

export default {
    UserStorage,
    clear,
}