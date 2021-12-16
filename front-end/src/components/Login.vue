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
        <div class="flex flex-row">
            <div class="flex flex-col border-2 border-black rounded-2xl m-auto px-20 py-10">
                <div class="flex flex-row justify-center mb-8">
                    <div class="flex flex-col">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-3xl">Login</span>
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
                        <span class='text-red-500 font-bold' v-if="!user.email">*</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Email" name="email" v-model="user.email" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
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
                        <span class='text-red-500 font-bold' v-if="!user.password">*</span>
                    </div>
                    <div class="flex flex-col">
                        <input type='text' placeholder="Password" name="password" v-model="user.password" class="ml-5 border-2 border-gray-200 px-2 rounded-lg w-full"/>
                    </div>
                </div>

                <div class="flex flex-row m-auto mt-5">
                    <div class="flex flex-col m-auto mr-3">
                        <input type="checkbox" >
                    </div>
                    <div class="flex flex-col">
                        <span> Ricordami </span>
                    </div>
                </div>
                <div class="flex flex-row m-auto mt-3">
                    <div class="flex flex-col text-white text-xl">
                        <button :disabled="!isFormComplete" class="font-bold"
                            :class="{'bg-black border-2 px-4 py-1 rounded-full cursor-pointer':isFormValid,'bg-black opacity-60 px-4 py-1 rounded-full cursor-not-allowed':!isFormValid}">
                            Accedi
                        </button>
                    </div>
                </div>
                <div class="flex flex-row m-auto mt-3">
                    <div class="flex flex-col">
                        <span> Hai dimenticato la password? </span>
                    </div>
                </div>
                <div class="flex flex-row m-auto mt-10 text-sm">
                    <div class="flex flex-col">
                        <span> Politica sulla privacy </span>
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
            user:{
                email:"",
                password:""
            }
        }
    },
    computed:{
        isFormValid(){
            let formValid = true;
            if(this.user.email && this.user.password){
                return formValid;
            }else{
                formValid = false;
                return formValid;
            }
        }
    },
    methods:{
        goToRegistration(){
            this.$router.push({
                name: "registration"
            });
        }
    }
}
</script>