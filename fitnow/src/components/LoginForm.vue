<script >
import { AuthStore } from '@/stores/AuthStore';

    
    export  default{
          setup(){
             const authStore=AuthStore()
             return {authStore}
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
            }
          }
    }
</script>

<template>

    <main class="p-8">
        <div class="flex max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg lg:max-w-4xl">
        <div class="hidden bg-cover lg:block lg:w-1/2"
            style="background-image:url('https://images.unsplash.com/photo-1546514714-df0ccc50d7bf?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=667&q=80')">
        </div>
        <div class="w-full p-8 lg:w-1/2">
            <h2 class="text-2xl font-semibold text-center text-gray-700">Brand</h2>
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
