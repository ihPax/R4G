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
                    <button @click="goToRegistration()"
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
                        Accedi
                    </button>
                </div>
            </div>
        </div>
        <form class="flex flex-row">
            <div class="flex flex-col border-2 border-black rounded-2xl m-auto px-20 py-10">
                <div class="flex flex-row justify-center mb-8">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-3xl">Accedi</span>
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
                        <span class='text-red-500 font-bold' v-if="!user.email">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Email" name="email" autocomplete="email" v-model="user.email" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
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
                        <span class='text-red-500 font-bold' v-if="!user.password">*</span>
                        <span v-else>&nbsp;&nbsp;</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='password' placeholder="Password" name="password" v-model="user.password" autocomplete="password" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <div class="flex flex-row m-auto mt-5">
                    <div class="flex flex-col m-auto mr-3">
                        <input type="checkbox" id="rememberMe" v-model="isRemembered" class="w-4 h-4">
                    </div>
                    <div class="flex flex-col">
                        <label for="rememberMe">Ricordami</label>
                    </div>
                </div>

                <!-- BUTTON LOGIN -->
                <div class="flex flex-row m-auto mt-3">
                    <div class="flex flex-col text-white text-xl">
                        <button type="button"
                            :disabled="!isFormValid || isLogging"
                            class="font-bold px-4 py-1 rounded-full"
                            :class="{
                                'cursor-pointer bg-black': isFormValid,
                                'cursor-not-allowed bg-gray-500': !isFormValid
                            }"
                            @click="goToHome()" 
                        >
                            Accedi
                        </button>
                    </div>
                </div>

                <div class="flex flex-row m-auto mt-3">
                    <div class="flex flex-col">
                        <span class="cursor-pointer"> Hai dimenticato la password? </span>
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
        <div v-if="isLogging"
            class="fixed text-red-400 font-bold text-2xl z-10"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
        >
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600">
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data(){
        return{
            user:{
                email: "",
                password: ""
            },
            Alluser:[],
            isLogging: false,
            isRemembered: false
        }
    },
    mounted(){
        let emailStoraged = JSON.parse(localStorage.getItem("Email"));
        if (emailStoraged) {
            this.user.email = emailStoraged;
            this.isRemembered = true;
        }
    },
    computed:{
        isFormValid(){
            let formValid = !!this.user.email && !!this.user.password ? true : false;
            return formValid;
        }
    },
    methods:{
        rememberEmail() {
            if (this.isRemembered === true) {
                let emailSaved = JSON.stringify(this.user.email);
                localStorage.setItem("Email", emailSaved);
            } else {
                localStorage.removeItem("Email");
            }
        },
        goToRegistration(){
            this.$router.push({
                name: "registration"
            });
        },
        async goToHome(){
            this.isLogging = true;
            this.rememberEmail();
            let res = await axios
            .post("http://localhost:8000/r4g/login",this.user)
            .catch((e) => {
                let err;
                if (e.response) {
                    err = e.response;
                } else if (e.request) {
                    err = e.request;
                } else {
                    console.log('Error', e.message);
                }
                if (err.status == 401) {
                    err.statusText = "Email e/o password non corretta";
                } else if (err.status == 422) {
                    err.statusText = "Email non valida e/o password con meno di 6 caratteri";
                }
                if (err) {
                    this.$fire({
                    text: err.statusText,
                    type: "warning",
                    timer: 3000,
                    }).then(() => {
                        this.isLogging = false
                    });
                    // this.$alert(err.statusText).then(() => {
                    //     this.isLogging = false;
                    // });
                }
            });

            if (res) {
                this.Alluser = res.data.user;

                //archivazione dell'email nel local storage per la sessione
                let parsed = JSON.stringify(this.Alluser);
                localStorage.setItem("AccessEmail", parsed);
                if(this.Alluser.zone_id != null){
                    let res = await axios.get("http://localhost:8000/r4g/zone-calendar/"+ this.Alluser.zone_id);
                    let zone = res.data;
                    let calendar = JSON.stringify(zone);
                    localStorage.setItem(
                        "Zone",
                        calendar
                    );
                }
                //controllo sullo stato della richiesta proveniente dal back-end
                if(res.status === 200){
                    this.$router.push({
                        name: "home"
                    });
                }
            }
        }
    }
}
</script>