import Axios, { AxiosRequestConfig, AxiosResponse } from "axios";
// import { watch } from "vue";
// import { TokenStorage } from "@/services/main";

// Import axios library and create a new instance with a specified baseURL
export const axios = Axios.create({
    baseURL: '/api',
});

// Set default headers for all requests
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// axios.defaults.headers.common["Authorization"] = "Bearer " + TokenStorage.value;

// Watch for changes in TokenStorage and update the Authorization header accordingly
// watch(TokenStorage, (newVal) => {
//     axios.defaults.headers.common["Authorization"] = "Bearer " + TokenStorage.value;
// });

export default axios;