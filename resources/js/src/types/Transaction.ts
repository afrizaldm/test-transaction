export type Transaction = {
    id: number | null
    amount: number
    user_id: number
    status: 'pending' | 'failed' | 'success' | ''
    created_at?: any
    deleted_at?: any
}

export default Transaction