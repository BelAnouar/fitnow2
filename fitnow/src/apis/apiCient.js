import axios from "axios";

const axiosClient = axios.create({
    baseURL: `http://localhost/api`
})

axiosClient.interceptors.request.use((config) => {
    const token = localStorage.getItem('userToken');
    config.headers.Authorization = `Bearer ${token}`
    return config;
})

axiosClient.interceptors.response.use((response) => {
    return response
}, (error) => {
    const {response} = error;
    if (response.status === 401) {
        localStorage.removeItem('userToken')

    } else if (response.status === 404) {

    }

    throw error;
})

export default axiosClient
