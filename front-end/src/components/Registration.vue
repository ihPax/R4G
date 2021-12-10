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
                    <span class="font-bold text-3xl">Registrazione</span>
                </div>
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <img src="https://img.icons8.com/material-outlined/24/000000/calendar--v1.png" />
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold mr-5' v-if="!newUser.name">*</span>
                    </div>
                    <div class="flex-col">
                        <input type='text' placeholder="Nome" name="name" v-model="newUser.name" class="border-2 border-gray-300 px-1 rounded-md w-full"/>
                    </div>
                </div>
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <img src="https://img.icons8.com/material-outlined/24/000000/calendar--v1.png"/>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold mr-5' v-if="!newUser.surname">*</span>
                    </div>
                    <div class="flex-col">
                        <input type='text' placeholder="Cognome" name="surname" v-model="newUser.surname" class="border-2 border-gray-300 px-1 rounded-md w-full"/>
                    </div>
                </div>
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <img src="https://img.icons8.com/material-outlined/24/000000/calendar--v1.png"/>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold' v-if="!newUser.birthday">*</span>
                    </div>
                    <div class="flex-col">
                        <input type='date' placeholder="Data di nascita" name="birthday" v-model="newUser.birthday" class="border-2 border-gray-300 px-1 rounded-md w-full"/>
                    </div>
                </div>
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <img src="https://img.icons8.com/material-outlined/24/000000/calendar--v1.png"/>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold mr-5' v-if="!newUser.email">*</span>
                    </div>
                    <div class="flex-col">
                        <input type='text' placeholder="Email" name="email" v-model="newUser.email" class="border-2 border-gray-300 px-1 rounded-md w-full"/>
                    </div>
                </div>
                <div class="flex flex-row mt-5">
                    <div class="flex flex-col">
                        <img src="https://img.icons8.com/material-outlined/24/000000/calendar--v1.png"/>
                    </div>
                    <div class="flex flex-col">
                        <span class='text-red-500 font-bold mr-5' v-if="!newUser.password">*</span>
                    </div>
                    <div class="flex-col">
                        <input type='text' placeholder="Password" name="password" v-model="newUser.password" class="border-2 border-gray-300 px-1 rounded-md w-full"/>
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