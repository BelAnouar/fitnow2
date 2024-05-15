import axiosClient from "@/apis/apiCient.js";
import {defineStore} from "pinia";


export const useProgressStore=defineStore("ProgressStore",{
    state: () => ({
        progress:[],
        editedProgression:{}
    }),

    getters:{
       getProgress:(state)=> state.progress,

    },
    actions:{
      async  fetchProgress(){
          axiosClient.get('/events').then(({data})=>{
              this.progress=data

          })
      }
      ,
         deleteProgress(id){
          axiosClient.delete(`/events/${id}`)
             this.fetchProgress();
        },
        async editProgress(id){
          axiosClient.get(`/events/${id}`).then(({data})=>{
              console.log(data)
              this.editedProgression=data
          })
        }
        ,
        async updateProgress(formData,id){
          axiosClient.put(`/events/${id}`,formData).then((res)=>{
              this.fetchProgress();
          })
        },
        async updateComplete(id){
            axiosClient.patch(`/event/${id}`).then((res)=>{
                this.fetchProgress();
            })
        }
    },

})
