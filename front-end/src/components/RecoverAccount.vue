<template>
    <div class="
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-screen
      flex flex-col
    ">
        <button @click="$router.go(-1)" :disabled="!isMobile" :class="{'cursor-auto': !isMobile}" class="w-full p-4 sm:px-6 flex justify-center items-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <div class="block xs:hidden">
                <svg class="transform rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                >
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Recupera password
            </h3>
        </button> 
        <div v-if="!isTokenSent">
            <div class="max-w-lg mx-auto my-8 flex flex-col">
                <div class="mx-auto my-4 font-medium text-center text-xl">
                    Inserisci la tua email
                </div>
                <div class="flex flex-col justify-center mx-2 my-8 max-w-screen-md">
                    <input 
                        type="email"
                        placeholder="Inserisci email"
                        name="recover"
                        autocomplete="email"
                        v-model="recoverEmail"
                        class="border-2 mx-5 px-5 rounded-lg bg-white outline-none h-12"
                        :class="{
                            'border-red-600': !recoverEmail,
                            'border-yellow-500': recoverEmail
                        }"
                    />
                    <div v-if="!recoverEmail" class="text-sm text-red-400 text-center font-medium px-2 py-1">Inserisci una mail valida!</div>
                </div>
                <div class="flex justify-center my-4">
                    <t-button2
                        @click="sendEmail()"
                        :disabled="!recoverEmail || isLoading"
                    > 
                        Invia richiesta
                    </t-button2>
                </div>
            </div>
        </div>
        <div v-else>
            <form class="flex flex-col justify-center mx-2 my-8 max-w-screen-md">
                <input 
                    type="password"
                    placeholder="Inserisci password"
                    name="newPassword"
                    autocomplete="newPassword"
                    v-model="newPassword"
                    class="border-2 mx-5 my-5 px-5 rounded-lg bg-white outline-none h-12"
                    :class="{
                        'border-red-600': !isFormValid,
                        'border-yellow-500': isFormValid
                    }"
                />
                <input 
                    type="password"
                    placeholder="Ripeti password"
                    name="repeatPassword"
                    autocomplete="repeatPassword"
                    v-model="repeatPassword"
                    class="border-2 mx-5 mt-5 px-5 rounded-lg bg-white outline-none h-12"
                    :class="{
                        'border-red-600': !isFormValid,
                        'border-yellow-500': isFormValid
                    }"
                />
                <div v-if="!isFormValid && (newPassword.length <= repeatPassword.length) && newPassword.length != 0" class="text-sm text-red-400 text-center font-medium py-1">Le due password devono corrispondere!</div>
                <div class="flex justify-center my-4">
                    <t-button2
                        @click="sendEmail()"
                        :disabled="!isFormValid || isLoading"
                    > 
                        Invia richiesta
                    </t-button2>
                </div>
            </form>
        </div>
        <div v-if="isLoading"
            class="fixed text-red-400 font-bold text-2xl z-10"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
        >
            <Loading></Loading>
        </div>
        <GoBack :isMobile="isMobile"></GoBack>
    </div> 
</template>

<script>
import Loading from "@/components/Loading";
import GoBack from "@/components/GoBack.vue";

export default {
    components: {
        GoBack,
        Loading
    },
    props: {
        isMobile: {
            type: Boolean,
            default: true
        },
    },
    data() {
        return {
            isLoading: false,
            recoverEmail: "",
            isTokenSent: false,
            newPassword: "",
            repeatPassword: ""
        }
    },
    mounted() {},
    computed: {
        isFormValid() {
            let formValid = this.newPassword == this.repeatPassword && this.newPassword != '' ? true : false;
            return formValid;
        }
    },
    methods: {
        sendEmail() {
            this.isTokenSent = true;
        }
    }
}
</script>
