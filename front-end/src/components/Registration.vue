<template>
<div class="h-full w-full" @keyup.enter="isFormValid ? userRegister() : null">
    <div v-if="!isMobile" class="h-full w-full flex flex-col">
        <LoginRegisterBar></LoginRegisterBar>
        <form class="flex flex-row">
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
                        <input :type="isInputDate == true ? 'date' : 'text'" @click="isInputDate = true" placeholder="Data di nascita" name="birthday" autocomplete="birthday" v-model="newUser.birthday" 
                            class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"
                            :max="new Date()"
                        />
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
                <div class="flex flex-row mt-5 justify-between relative">
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
                        <input :type="isPasswordHidden ? 'password' : 'text'" placeholder="Password" name="password" autocomplete="password" v-model="newUser.password" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                    <div v-if="isPasswordHidden == true" @click="isPasswordHidden = false" 
                        class="absolute top-0 right-0 mt-1 -mr-4 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/>
                            <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/>
                        </svg>     
                    </div>
                    <div v-if="isPasswordHidden == false" @click="isPasswordHidden = true"
                        class="absolute top-0 right-0 p-2 mt-1 mr-6 cursor-pointer"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                            <path d="M0 0h24v24H0V0z" fill="none"/>
                            <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/>
                        </svg>  
                    </div>
                </div>

                <div class="flex flex-row m-auto mt-5 justify-between">
                    <div class="flex flex-col m-auto">
                        <input type="checkbox" id="acceptTOS" v-model="validCheck" class="w-4 h-4">
                    </div>
                    <div class="flex flex-col pl-3">
                        <label for="acceptTOS">Accetto i <button @click="goToLink('ToS')" class="underline">Termini di Servizio</button></label>
                    </div>
                </div>

                <!-- BUTTON REGISTRATION -->
                <div class="flex flex-row m-auto mt-3">
                    <div class="flex flex-col text-white text-xl">
                        <button type="button"
                            class="font-bold px-4 py-1 rounded-full bg-black disabled:cursor-not-allowed disabled:bg-gray-500"
                            @click.stop="userRegister()"
                            :disabled="!isFormValid || isLoading"
                        >
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
        </form>
        <router-link to="/landing" class="mt-5">
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
    </div>

    <!-- VERSIONE MOBILE -->
    <form v-else class="h-full w-full flex flex-col">
        <div class="flex flex-col justify-center">
            <router-link to="/landing" class="flex justify-center items-center">
                <img
                    src="../assets/logor4gblack.png"
                    class="w-1/2 cursor-pointer"
                    alt="logo R4G"
                />
            </router-link>
        </div>

        <div class="mx-5 text-center">
            Crea il tuo account <br> e collega il tuo Cestino Smart
        </div>

        <!--NOME-->
        <div class="flex flex-col mt-5 justify-between">
            <input type='text' placeholder="Nome" name="name" autocomplete="name" v-model="newUser.name" 
                class="border-2 border-orangelogo mx-5 px-5 rounded-lg h-12 outline-none"
                :class="{
                    'border border-red-600 text-black': !isFormValid && !newUser.name,
                    'bg-white': isFormValid
                }"
            />
        </div>

        <!--COGNOME-->
        <div class="flex flex-col mt-5 justify-between">
            <input type='text' placeholder="Cognome" name="surname" autocomplete="surname" v-model="newUser.surname" 
                class="border-2 border-orangelogo mx-5 px-5 rounded-lg h-12 outline-none"
                :class="{
                    'border border-red-600 text-black': !isFormValid && !newUser.surname,
                    'bg-white': isFormValid
                }"
            />
        </div>

         <!--DATA-->
        <div class="flex flex-row mt-5 justify-between">
            <input :type="isInputDate == true ? 'date' : 'text'" @click="isInputDate = true" placeholder="Data di nascita" name="birthday" autocomplete="birthday" v-model="newUser.birthday" 
                class="border-2 border-orangelogo mx-5 px-5 rounded-lg h-12 w-full bg-white outline-none"
                :class="{
                    'border border-red-600 text-black': !isFormValid && !newUser.birthday
                }"
                :max="new Date()"
            />
        </div>

        <!--EMAIL-->
        <div class="flex flex-row mt-5 justify-between">
            <input type='text' placeholder="Email" name="email" autocomplete="email" v-model="newUser.email" 
                class="border-2 border-orangelogo mx-5 px-5 rounded-lg h-12 w-full outline-none"
                :class="{
                    'border border-red-600 text-black': !isFormValid && !newUser.email,
                    'bg-white': isFormValid
                }"
            />
        </div>

        <!--PASSWORD-->
        <div class="flex flex-row mt-5 justify-between relative">
            <input :type="isPasswordHidden ? 'password' : 'text'" placeholder="Password" name="password" autocomplete="password" v-model="newUser.password" 
                class="border-2 border-orangelogo mx-5 px-5 rounded-lg h-12 w-full outline-none"
                :class="{
                    'border border-red-600 text-black': !isFormValid && !newUser.password,
                    'bg-white': isFormValid
                }"
            />
            <div v-if="isPasswordHidden == true" @click="isPasswordHidden = false" 
                class="absolute top-0 right-0 p-2 mt-1 mr-6 cursor-pointer"
            >
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                    <path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/>
                    <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/>
                </svg>     
            </div>
            <div v-if="isPasswordHidden == false" @click="isPasswordHidden = true"
                class="absolute top-0 right-0 p-2 mt-1 mr-6 cursor-pointer"
            >
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                    <path d="M0 0h24v24H0V0z" fill="none"/>
                    <path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/>
                </svg>  
            </div>
        </div>

        <!--TOS-->
        <div class="flex flex-row justify-center items-baseline mt-5">
            <input type="checkbox" id="acceptToS" v-model="validCheck" class="w-6 h-6 ml-5 cursor-pointer">
            <label for="acceptToS" class="pl-5 my-auto">Accetto i <button @click="goToLink('ToS')" class="underline">Termini di Servizio</button></label>
        </div>

        <!--BUTTON REGISTRATION-->
        <div class="flex flex-col text-white text-lg mt-5">
            <button type="button"
                class="font-bold px-4 py-2 mx-5 rounded text-white bg-yellow-600 hover:bg-yellow-700 active:bg-yellow-700 focus:ring-yellow-300 disabled:cursor-not-allowed"
                @click.stop="userRegister()"
                :disabled="!isFormValid || isLoading"
            >
                Registrati
            </button>
        </div>
        <div class="flex text-sm m-5 justify-center">
            <span class="mr-2"> Sei già un membro? </span>
            <button
                @click="goToLink('login')"
                class="text-sm font-medium focus:outline-none"
            >
                Accedi
            </button>
        </div>
        <div v-if="!isFormValid" class="flex justify-center items-center text-center mx-5">
            <div class="border border-red-600 rounded px-2 py-1">* Campo obbligatorio</div>
        </div>
    </form>
    <div v-if="isLoading"
        class="fixed text-red-400 font-bold text-2xl z-10"
        style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
    >
        <Loading></Loading>
    </div>
</div>

</template>

<script>
import LoginRegisterBar from '@/components/LoginRegisterBar.vue';
import Loading from "@/components/Loading";

export default {
    components: {
      LoginRegisterBar,
      Loading
    },
    props: {
        isMobile: {
            type: Boolean,
            default: false
        },
    },
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
            isLoading: false,
            isPasswordHidden: true,
            isInputDate: false
        }
    },
    computed:{
        isFormValid(){
            let formValid = this.newUser.name && this.newUser.surname && this.newUser.birthday && this.newUser.email && this.newUser.password && this.validCheck ? true : false;
            return formValid;
        }
    },
    mounted() {},
    methods:{
        goToLink(link){
            this.$router.push({
                name: link
            });
        },
        showAlert(textToShow) {
            this.$fire({
                text: textToShow,
                type: "warning",
                timer: 3000,
            }).then(() => {
                this.isLoading = false
            });
        },
        async userRegister(){
            this.isLoading = true;
            if (this.newUser.password.length < 6) {
                this.showAlert("La password dev'essere lunga almeno 6 caratteri!");
            } else {
                try {
                    let response = await this.$axios.post("/r4g/register",this.newUser)
                    this.newUser = response.data;
                    localStorage.setItem("EmailFromRegistration", this.newUser.email);
                    
                    this.$router.push({
                        name: "login"
                    });
                } catch(e) {
                    this.$emit('catch-error', e);
                } finally {
                    this.isLoading = false;
                }
            }
        }
    }
}
</script>