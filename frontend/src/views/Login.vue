<script setup>
import { useAuthStore } from '@/stores/auth';
import { storeToRefs } from 'pinia';
import { ref } from 'vue';
import { useLoaderStore } from '@/stores/loader';
const auth = useAuthStore();
const { isLoading, isError } = storeToRefs(useLoaderStore())
const { email, password, error, router } = storeToRefs(auth);
import SpinnerLoader from '@/components/SpinnerLoader.vue';
const { login } = auth;
</script>
<template>
    <section class="w-full h-[100vh] flex items-center justify-center  text-black relative">
        <img src="../assets/wall.webp" alt="" class="absolute w-full h-full">
        <div class="login-card bg-[rgba(255,255,255,0.8)] z-10 ">
            <div class="brand">
                <h1>Welcome Back</h1>
                <div class="text-sm text-red-600 p-2" v-if="error">{{ error }}</div>
            </div>

            <form id="loginForm" @submit.prevent="login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required v-model="email" type="email" id="email" placeholder="name@company.com"
                        autocomplete="email">

                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input required v-model="password" type="password" id="password" placeholder="Enter your password"
                        autocomplete="current-password">
                </div>

                <button type="submit" class="login-btn" id="loginButton" :disabled="isLoading">
                    <span v-if="isLoading" >Logging in...</span>
                    <span v-else>Sign In</span>
                    
                </button>
            </form>
        </div>
    </section>
</template>

<style setup>
.login-card {

    border-radius: 4px;
    padding: 3rem 2rem;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
}

.brand {
    text-align: center;
    margin-bottom: 2rem;
}

.brand-logo {
    width: 50px;
    height: 50px;
    background: #000;
    border-radius: 50%;
    margin: 0 auto 1rem;
}

.brand h1 {
    font-size: 1.6rem;
    color: #1a1a1a;
    margin-bottom: 1rem;
}

.brand p {
    color: #666;
    font-size: 0.95rem;
}

.form-group {
    margin-bottom: 1.5rem;
    position: relative;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    color: #333;
    font-size: 0.9rem;
    font-weight: 500;
}

.form-group input {
    width: 100%;
    padding: 0.8rem 1rem;
    border: 2px solid #e1e1e1;
    border-radius: 4px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-group input:focus {
    outline: none;
    border-color: #000;
    box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.1);
}

.remember-forgot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.remember-me {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.remember-me input[type="checkbox"] {
    width: 16px;
    height: 16px;
    border-radius: 4px;
}

.remember-me label {
    color: #666;
    font-size: 0.9rem;
}

.forgot-password {
    color: #000;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
}

.login-btn {
    width: 100%;
    padding: 1rem;
    background: #000;
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.login-btn:hover {
    background: #333;
    
}

.login-btn:active {
    transform: translateY(0);
}

.social-login {
    margin-top: 2rem;
    text-align: center;
}

.social-login p {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 1rem;
    position: relative;
}

.social-login p::before,
.social-login p::after {
    content: "";
    position: absolute;
    top: 50%;
    width: 45%;
    height: 1px;
    background: #e1e1e1;
}

.social-login p::before {
    left: 0;
}

.social-login p::after {
    right: 0;
}

.social-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.social-btn {
    width: 50px;
    height: 50px;
    border: 2px solid #e1e1e1;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
}

.social-btn:hover {
    border-color: #000;
    background: #f5f5f5;
}

.signup-link {
    text-align: center;
    margin-top: 1.5rem;
}

.signup-link a {
    color: #000;
    text-decoration: none;
    font-weight: 600;
}

.signup-link a:hover {
    text-decoration: underline;
}

.error {
    color: #dc3545;
    font-size: 0.85rem;
    margin-top: 0.5rem;
    display: none;
}

@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    20%,
    60% {
        transform: translateX(-5px);
    }

    40%,
    80% {
        transform: translateX(5px);
    }
}

.shake {
    animation: shake 0.5s ease;
}
</style>