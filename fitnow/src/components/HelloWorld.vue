<script setup>
defineProps({
  msg: {
    type: String,
    required: true
  }
})
</script>

<template>

    <div class="relative bg-gradient-to-r mt-1 from-orange-900 to-red-800 py-16 font-sans">
        <div class="relative max-w-screen-xl mx-auto px-8 z-10 text-center text-white">
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">Welcome to Our Premium Experience</h1>
            <p class="text-lg md:text-xl mb-8">Embark on a journey of excellence with our exclusive products and services.</p>
            <router-link to="/progress">
                <button type="button" class="bg-indigo-600 hover:bg-indigo-700 text-white text-base font-semibold px-8 py-2.5 rounded-full transition duration-300 ease-in-out shadow-lg hover:shadow-xl">View My Progress</button>
            </router-link>
        </div>
    </div>



    <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
            <span class="relative inline-block">
                <svg
                    viewBox="0 0 52 24"
                    fill="currentColor"
                    class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block"
                >
                    <defs>
                        <pattern
                            id="ea469ae8-e6ec-4aca-8875-fc402da4d16e"
                            x="0"
                            y="0"
                            width=".135"
                            height=".30"
                        >
                            <circle cx="1" cy="1" r=".7" />
                        </pattern>
                    </defs>
                    <rect
                        fill="url(#ea469ae8-e6ec-4aca-8875-fc402da4d16e)"
                        width="52"
                        height="24"
                    />
                </svg>

            </span>Ajouter une Progression
    </h2>

    <form class="mt-16 font-sans m-6 max-w-4xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="flex flex-col">
                <label for="poids" class="text-sm font-semibold">Poids</label>
                <input v-model="progressionData.poids" id="poids" type="number" placeholder="Enter poids"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
            <div class="flex flex-col">
                <label for="poitrine" class="text-sm font-semibold">Poitrine</label>
                <input v-model="progressionData.Poitrine" id="poitrine" type="number" placeholder="Enter poitrine"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
            <div class="flex flex-col">
                <label for="mollet" class="text-sm font-semibold">Mollet</label>
                <input v-model="progressionData.Mollet" id="mollet" type="number" placeholder="Enter mollet"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
            <div class="flex flex-col">
                <label for="bras" class="text-sm font-semibold">Bras</label>
                <input v-model="progressionData.Bras" id="bras" type="number" placeholder="Enter bras"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
            <div class="flex flex-col">
                <label for="hauteur" class="text-sm font-semibold">Hauteur</label>
                <input v-model="progressionData.Hauteur" id="hauteur" type="number" placeholder="Enter hauteur"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
            <div class="flex flex-col">
                <label for="poidsleve" class="text-sm font-semibold">PoidsLeve</label>
                <input v-model="progressionData.PoidsLeve" id="poidsleve" type="number" placeholder="Enter poidsleve"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
            <div class="flex flex-col sm:col-span-2">
                <label for="tempsdecourse" class="text-sm font-semibold">TempsDeCourse</label>
                <input v-model="progressionData.TempsDeCourse" id="tempsdecourse" type="number" placeholder="Enter tempsdecourse"
                       class="px-4 py-3.5 bg-white text-black text-sm border border-gray-300 focus:border-blue-500 rounded outline-none" />
            </div>
        </div>
        <button type="button" @click="addProgression"
                class="mt-8 px-6 py-2.5 w-full text-sm font-semibold bg-blue-500 text-white rounded hover:bg-blue-600">Submit</button>
    </form>

</template>

<script>
import axios from 'axios';
import axiosClient from "@/apis/apiCient.js";

export default {

    data() {
        return {
            progressionData: {
                poids: '',
                Poitrine: '',
                Mollet: '',
                Bras: '',
                Hauteur: '',
                PoidsLeve: '',
                TempsDeCourse: ''
            },
        };
    },


    methods: {
        addProgression() {

            axiosClient.post('/events', this.progressionData)
                .then(res => {
                    alert('success , progressopn bien ajouter' );
                    console.log(res.data);
                    this.progressionData = {
                        poids: '',
                        Poitrine: '',
                        Mollet: '',
                        Bras: '',
                        Hauteur: '',
                        PoidsLeve: '',
                        TempsDeCourse: '',
                    }
                }).catch(err => {
                console.error(err.response.data);
            });
        }
    }

}
</script>
