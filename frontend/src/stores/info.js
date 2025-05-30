import { defineStore } from "pinia";
import { ref } from "vue";
import axios from 'axios';

export const useInfoStore = defineStore('info', ()=>{

    const info = ref({})
    const isLoadingInfo = ref(false)
    const fetchInfo = async ()=>{
        try{
            isLoadingInfo.value = true
            const response = await axios.get('/info')
        info.value = response.data.data

        }catch(err){
            console.log(err)
        }finally{
            isLoadingInfo.value = false
        }
    }

    return {info, isLoadingInfo, fetchInfo}

})