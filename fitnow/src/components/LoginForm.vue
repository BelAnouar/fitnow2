<script >
import { AuthStore } from '@/stores/AuthStore';
import {useRouter} from "vue-router";


    export  default{
          setup(){
              const router = useRouter()
              const authStore=AuthStore()
              return {authStore,router}
          },

          data(){
            return {
                email:"",
                password:""
            }
          },
          methods:{
            async login(){
                const values={"email":this.email,"password":this.password}
                 this.authStore.login(values)
                 this.router.push("/")
            }
          }
    }
</script>

<template>

    <main class="p-8">
        <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image:url('https://wallpaperaccess.com/full/5469421.jpg')">
        </div>
        <div class="w-full p-8 lg:w-1/2">
            <h2 class="text-2xl font-semibold text-center text-gray-700">Login</h2>
            <p class="text-xl text-center text-gray-600">Welcome back!</p>
           <form @submit.prevent="login">
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b lg:w-1/4"></span>
                <a href="#" class="text-xs text-center text-gray-500 uppercase">or login with email</a>
                <span class="w-1/5 border-b lg:w-1/4"></span>
            </div>
            <div class="mt-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Email Address</label>
                <input v-model='email' class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="email" />
            </div>
            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-bold text-gray-700">Password</label>
                    <a href="#" class="text-xs text-gray-500">Forget Password?</a>
                </div>
                <input v-model="password" class="block w-full px-4 py-2 text-gray-700 bg-gray-200 border border-gray-300 rounded appearance-none focus:outline-none focus:shadow-outline" type="password" />
            </div>
            <div class="mt-8">
                <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-gray-700 rounded hover:bg-gray-600">Login</button>
            </div>
            <div class="flex items-center justify-between mt-4">
                <span class="w-1/5 border-b md:w-1/4"></span>
                <a href="#" class="text-xs text-gray-500 uppercase">or sign up</a>
                <span class="w-1/5 border-b md:w-1/4"></span>
            </div></form>
        </div>
    </div>
    </main>

</template>
