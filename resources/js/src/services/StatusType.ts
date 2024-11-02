import { ref } from "vue";

type IStatus = {
    id: number
    name: string
    value: string
}

const all = ref<IStatus[]>([
    { id: 1, name: "Pending", value: 'pending' },
    { id: 2, name: "Success", value: 'success' },
    { id: 3, name: "Failed", value: 'failed' },
])