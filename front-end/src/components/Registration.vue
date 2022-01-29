<template>
    <div class="h-full w-full flex flex-col font-montserrat">
        <div class="flex flex-row">
            <div class="flex flex-col">
                <router-link to='/landing'>
                    <img src="../assets/logor4gblack.png" class="w-3/4 cursor-pointer" alt="logo R4G" />
                </router-link>
            </div>
            <div class="flex-col flex flex-grow justify-center items-end align-center">
                <div class="flex-row flex">
                    <button
                        class="
                        px-4
                        py-2
                        rounded-md
                        text-sm
                        font-medium
                        border
                        focus:outline-none focus:ring
                        rounded-xl
                        transition
                        text-yellow-600
                        border-yellow-600
                        mx-8
                        hover:text-white hover:bg-yellow-600
                        active:bg-yellow-700
                        focus:ring-yellow-300
                        "
                    >
                        Registrati
                    </button>
                    <button @click="goToLogin()"
                        class="
                        px-4
                        py-2
                        rounded-md
                        text-sm
                        font-medium
                        border
                        focus:outline-none focus:ring
                        rounded-xl
                        transition
                        text-yellow-600
                        border-yellow-600
                        mx-8
                        hover:text-white hover:bg-yellow-600
                        active:bg-yellow-700
                        focus:ring-yellow-300
                        "
                    >
                        Accedi
                    </button>
                </div>
            </div>
        </div>
        <router-link to="/landing" class="mb-5">
            <div class="flex flex-row justify-center cursor-pointer">
                <div class="flex flex-col">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span>Torna alla Landing</span>
                </div>
            </div>
        </router-link>
        <div class="flex flex-row">
            <div class="flex flex-col border-2 border-black rounded-2xl m-auto px-20 py-10">
                <div class="flex flex-row justify-center mb-8">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-3xl">Registrazione</span>
                    </div>  
                </div>

                <!--NOME-->
                <div class="flex flex-row mt-5 justify-between">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.name">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Nome" name="name" autocomplete="name" v-model="newUser.name" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <!--COGNOME-->
                <div class="flex flex-row mt-5 justify-between">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.surname">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Cognome" name="surname" autocomplete="surname" v-model="newUser.surname" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <!--DATA-->
                <div class="flex flex-row mt-5 justify-between">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.birthday">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <input type='date' placeholder="Data di nascita" name="birthday" autocomplete="birthday" v-model="newUser.birthday" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>
                
                <!--EMAIL-->
                <div class="flex flex-row mt-5 justify-between">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.email">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Email" name="email" autocomplete="email" v-model="newUser.email" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <!--PASSWORD-->
                <div class="flex flex-row mt-5 justify-between">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.password">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='password' placeholder="Password" name="password" autocomplete="password" v-model="newUser.password" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <div class="flex flex-row m-auto mt-5 justify-between">
                    <div class="flex flex-col m-auto mr-3">
                        <input type="checkbox" v-model="validCheck" class="w-4 h-4">
                    </div>
                    <div class="flex flex-col">
                        <span> Accetto i Termini di Servizio </span>
                    </div>
                </div>

                <!-- BUTTON REGISTRATION -->
                <div class="flex flex-row m-auto mt-3">
                    <div class="flex flex-col text-white text-xl">
                        <button :disabled="!isFormValid" class="font-bold"
                            :class="{'bg-black px-4 py-1 rounded-full cursor-pointer':isFormValid,'bg-black opacity-60 px-4 py-1 rounded-full cursor-not-allowed':!isFormValid}"
                            @click="userRegister()">
                            Registrati
                        </button>
                    </div>
                </div>

                <div class="flex flex-row m-auto mt-5 text-sm">
                    <div class="flex flex-col">
                        <router-link to="/privacy-policy">
                            <span class="cursor-pointer"> Politica sulla privacy </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data(){
        return{
            validCheck: false,
            newUser:{
                name:"",
                surname:"",
                birthday:"",
                email:"",
                password:""
            },
        }
    },
    computed:{
        isFormValid(){
            let formValid = this.newUser.name && this.newUser.surname && this.newUser.birthday && this.newUser.email && this.newUser.password && this.validCheck ? true : false;
            return formValid;
        }
    },
    methods:{
        goToLogin(){
            this.$router.push({
                name: "login"
            });
        },
        async userRegister(){
            if (this.newUser.password.length < 6) {
                this.$fire({
                    text: "Password must be long at least 6 characters",
                    type: "warning",
                    timer: 2500,
                    }).then(() => {
                        this.isLogging = false
                    });
            } else {
                let response = await axios.post("http://localhost:8000/r4g/register",this.newUser);
                this.newUser = response.data;
                this.$router.push({
                    name: "login"
                });
            }
        }
    }
}
</script>