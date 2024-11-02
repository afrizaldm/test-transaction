import { isAuthenticated as isUserAuthenticated } from "@/services/Auth"

export const isAuthenticated = (to: any, from: any) => {
    if (isUserAuthenticated.value) {
        return true
    }
    return { path: '/auth/signin', query: to.query, hash: to.hash }
}