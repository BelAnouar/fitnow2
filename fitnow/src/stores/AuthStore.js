import axiosClient from "@/apis/apiCient";

import {defineStore} from "pinia"
import {useRouter} from "vue-router";


export const AuthStore = defineStore("authStore", {

    actions: {
        async login(values) {
            try {
                console.log(values);
                const response = await axiosClient.post("/login", values);
                localStorage.setItem('userToken', response.data.token);
            } catch (error) {
                console.error("Login failed:", error);
            }
        },

        async register(values) {
            try {
                const response = await axiosClient.post("/signup", values);
                console.log("User created:", response.data);
            } catch (error) {
                console.error("Registration failed:", error);
            }
        }
        , async logout() {
            try {

                localStorage.removeItem('userToken');


                const router = useRouter();
                await router.push('/login');
            } catch (error) {
                console.error("Logout failed:", error);
            }
        }
    }
});
