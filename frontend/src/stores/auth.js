import { defineStore } from "pinia";
import { ref } from 'vue';
import axios from 'axios'
import { storeToRefs } from 'pinia';
import { useLoaderStore } from '@/stores/loader';
import { useRouter } from 'vue-router';
import { Notivue, Notification, push } from 'notivue';
export const useAuthStore = defineStore('auth', () => {
    const siteMaintain = ref(import.meta.env.VITE_MAINTAIN);
    
    const email = ref('');
    const password = ref('');
    const error = ref('');
    const router = useRouter();
    const label = ref({
        head: '',
        headsec: '',
        sub: '',
    })
    const { isLoading, isError, isLoadingSpinner } = storeToRefs(useLoaderStore())

    const clearData = () => {
        email.value = '';
        password.value = '';
        error.value = '';
    }
    const login = async () => {
        isError.value = false;
        isLoading.value = true;
        try {
            const response = await axios.post('/login', { email: email.value, password: password.value })
            console.log("response: ", response.data);
            localStorage.setItem('token', (response.data.token));
            localStorage.setItem('user', (JSON.stringify(response.data.user)));
            axios.defaults.headers.Authorization = `Bearer ${response.data.token}`;
            router.push('/admin');
            clearData();
        } catch (err) {

            if (err.response.status == 401) {
                error.value = 'Invalid credentials';
            } else {
                isError.value = true
                push.error("Network Error")

            }


            console.log(err)
        } finally {
            isLoading.value = false
        }
    };

    const logout = async () => {
        try {

            isError.value = false;
            isLoading.value = true;
            // Get the token from localStorage before clearing it
            const token = localStorage.getItem('token');

            // Send the logout request with Authorization header
            const response = await axios.post('/logout', {}, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            console.log("After logout: ", response);


            
            localStorage.removeItem('token');
            localStorage.removeItem('user');

            
            router.push('/login');

        } catch (err) {
            console.error('Logout failed:', err);
            if (err.response && err.response.status === 401) {
                isError.value = true;
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                router.push('/login');
            }
        }finally{
            isLoading.value = false;
        }
    };


    return { siteMaintain, email, password, error, router, login, logout, label }
})