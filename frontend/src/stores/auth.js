import { defineStore } from "pinia";
import { ref } from 'vue';
import axios from 'axios'
import { useRouter } from 'vue-router';
export const useAuthStore = defineStore('auth', () => {

    const email = ref('');
    const password = ref('');
    const error = ref('');
    const router = useRouter();

    const clearData = () => {
        email.value = '';
        password.value = '';
        error.value = '';
    }
    const login = async () => {
        console.log("logging in...")
        try {
            const response = await axios.post('/login', { email: email.value, password: password.value })
            console.log("response: ", response.data);
            localStorage.setItem('token', (response.data.token));
            localStorage.setItem('user', (JSON.stringify(response.data.user)));
            axios.defaults.headers.Authorization = `Bearer ${response.data.token}`;
            router.push('/admin');
            clearData();
        } catch (err) {
            error.value = 'Invalid credentials';
            console.log(err)
        }
    };

    const logout = async () => {
        try {
            // Get the token from localStorage before clearing it
            const token = localStorage.getItem('token');

            // Send the logout request with Authorization header
            await axios.post('/logout', {}, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            // Clear localStorage after logout request
            localStorage.removeItem('token');
            localStorage.removeItem('user');

            // Redirect to login page
            router.push('/login');

        } catch (err) {
            console.error('Logout failed:', err);
            if (err.response && err.response.status === 401) {
                // Force logout if token is invalid
                localStorage.removeItem('token');
                localStorage.removeItem('user');
                router.push('/login');
            }
        }
    };


    return { email, password, error, router, login, logout }
})