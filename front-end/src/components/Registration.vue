<template>
    <div class="h-screen w-full flex flex-col">
        <div class="flex flex-row">
            <div class="flex flex-col">
                <img src="../assets/logor4gblack.png" class="w-3/4" alt="" />
            </div>
            <div class="flex-col flex flex-grow justify-center items-end align-center">
                <div class="flex-row flex">
                    <button @click="goToRegistration()"
                        class="
                        bg-transparent
                        hover:bg-yellow-600
                        text-yellow-600
                        font-semibold
                        hover:text-white
                        py-2
                        mx-8
                        px-4
                        border border-black
                        hover:border-transparent
                        rounded-xl
                        "
                    >
                        Registrati
                    </button>
                    <button @click="goToLogin()"
                        class="
                        bg-transparent
                        hover:bg-yellow-600
                        text-yellow-600
                        font-semibold
                        hover:text-white
                        py-2
                        px-4
                        mx-8
                        border border-black
                        hover:border-transparent
                        rounded-xl
                        "
                    >
                        Accedi
                    </button>
                </div>
            </div>
        </div>
        <div class="flex flex-row">
            <div class="flex flex-col border-2 border-black rounded-2xl m-auto px-20 py-16">
                <div class="flex flex-row justify-center mb-10">
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
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.name">*</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Nome" name="name" v-model="newUser.name" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <!--COGNOME-->
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.surname">*</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Cognome" name="surname" v-model="newUser.surname" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <!--DATA-->
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.birthday">*</span>
                    </div>
                    <div class="flex flex-col w-full">
                        <input type='date' placeholder="Data di nascita" name="birthday" v-model="newUser.birthday" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>
                
                <!--EMAIL-->
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.email">*</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Email" name="email" v-model="newUser.email" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <!--PASSWORD-->
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.password">*</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Password" name="password" v-model="newUser.password" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
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
            let formValid = true;
            this.forms.forEach(field =>{
                formValid = formValid && !!this.newUser[field.code];
            });
            return formValid;
        }
    }
}
</script>