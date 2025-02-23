<script setup>
import { RouterLink } from 'vue-router'
import { useAuthStore } from '@/stores/auth';
import { ref } from 'vue'
import { storeToRefs } from 'pinia';

const user = ref(null);
const auth = useAuthStore();
const token = ref(null)
const { email, password, error, router } = storeToRefs(auth);
const { logout } = auth;
// Retrieve user data from localStorage
const storedUser = localStorage.getItem('user');
const storedToken = localStorage.getItem('token');
if (storedUser) {
    user.value = JSON.parse(storedUser);
}
if (storedToken) {
    token.value = storedToken;
}
</script>

<template>
    <header class="sticky top-0 z-10 min-w-[220px] bg-admin-sb-bg h-[100vh] flex flex-col items-center px-8 py-6 gap-2">
        <div class="flex flex-col items-center py-8 gap-8 relative">
            <img src="../assets/fracturedjinx.jpg" alt="" class="object-cover w-[120px] h-[120px] rounded-full">
            <div class="flex flex-col items-center">
                <h3 class="text-lg text-gray-600" v-if="user">{{ user.name }}</h3>
                <h3 class="text-xs text-gray-600" v-if="user">{{ user.email }}</h3>
               

            </div>
            <div class="glowing-circle top-11 right-2"></div>
        </div>
        <nav
            class="text-[#575757] flex flex-col py-4 gap-1  w-full  border-t-[#BE77E0] border-t-solid border-t-4 border-b-4 border-b-[#BE77E0] ">
            <RouterLink to="/admin" exact-active-class="active"
                class="w-full px-3 py-2 flex items-center text-md gap-2 hover:bg-gray-200 rounded-lg"><i
                    class="fa-solid fa-gauge text-lg"></i> <span class="">DASHBOARD</span></RouterLink>

            <RouterLink to="/admin/blogs" exact-active-class="active"
                class="w-full px-3 py-2 flex items-center text-md gap-2 hover:bg-gray-200 rounded-lg"><i
                    class="fa-solid fa-paperclip"></i><span class="">BLOGS</span></RouterLink>
            <RouterLink to="/admin/blog/create" exact-active-class="active"
                class="w-full px-3 py-2 flex items-center text-md gap-2 hover:bg-gray-200 rounded-lg"><i
                    class="fa-solid fa-pen-nib"></i><span class="">CREATE BLOG</span></RouterLink>

        </nav>
        <div class="w-full">
            <button class="w-full p-2 bg-[#b67dd1] hover:bg-[#c386df] font-semibold text-white rounded-lg"
                @click="logout()">LOG OUT</button>

        </div>


    </header>
</template>
<style scoped>
.active {
    background-color: #E5E7EB;
}

@keyframes flicker {

    0%,
    100% {
        background-color: rgba(3, 180, 18, 1);
        /* Dim yellow */
        filter: brightness(1);
        box-shadow: 0 0 15px rgba(3, 180, 18, 0.8), 0 0 30px rgba(3, 180, 18, 0.6);
    }

    50% {
        background-color: rgb(33, 230, 49);
        /* Bright yellow */
        filter: brightness(1);
        box-shadow: 0 0 25px rgb(73, 236, 86), 0 0 30px rgba(3, 180, 18, 0.8);
    }
}

.glowing-circle {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    position: absolute;

    transform: translate(-50%, -50%);
    animation: flicker 2s infinite ease-in-out;
}
</style>
