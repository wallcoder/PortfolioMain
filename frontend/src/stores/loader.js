import { defineStore } from "pinia";
import { ref } from "vue";
export const useLoaderStore = defineStore('loader', ()=>{
    const isError = ref(false);
    const isLoading = ref(false);
    const isLoadingSpinner = ref(false);

    return {isLoading, isError, isLoadingSpinner}
})