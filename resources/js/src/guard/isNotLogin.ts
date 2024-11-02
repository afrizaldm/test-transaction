import { isAuthenticated as isUserAuthenticated } from "@/services/Auth"

export const isNotAuthenticated = (to: any, from: any) => {
    if (!isUserAuthenticated.value) {
        return true
    }
    return { path: '/', query: to.query, hash: to.hash }
}