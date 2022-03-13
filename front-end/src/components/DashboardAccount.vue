<template>
    <div class="
      font-montserrat
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-xl
      mx-auto
      h-full
      flex flex-col
    ">
        <div v-if="isLoading"
            class="fixed text-red-400 font-bold text-2xl z-10"
            style="top: 50%; left: 50%; transform: translate(-50%, -50%)"
        >
            <Loading></Loading>
        </div>
        <div class="p-4 sm:px-6 justify-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Account
            </h3>
        </div>
        <div v-if="isMobile" class="flex flex-col px-4 py-2 border-b border-gray-200">
            <div class="flex items-center cursor-pointer" @click="goToLink({code: 'account'})">
                <div>
                    <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M20.5 6c-2.61.7-5.67 1-8.5 1s-5.89-.3-8.5-1L3 8c1.86.5 4 .83 6 1v13h2v-6h2v6h2V9c2-.17 4.14-.5 6-1l-.5-2zM12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                    </svg>
                </div>
                <div class="flex flex-col ml-3">
                    <div class="text-lg font-semibold">
                        {{ user.name }} <!-- <span v-if="!isMobile"> {{ user.surname }} </span> -->
                    </div>
                    <button v-if="isMobile" class="text-xxs font-medium underline">
                        Visualizza profilo
                    </button>
                </div>
            </div>
        </div>
        <div class="flex flex-col p-2 xs:px-1">
            <div v-for="(field, index) in fields" :key="index">
                <div
                    class="flex justify-between items-center xs:m-2"
                    :class="{
                        'text-lg font-semibold pt-4': field.isHeader,
                        'text-sm cursor-pointer border-b border-gray-400 py-1 xs:p-2 xs:border xs:border-orangelogo xs:rounded xs:hover:bg-yellow-50': !field.isHeader
                    }"
                    @click="!field.isHeader ? goToLink(field) : null"
                    :disabled="field.isHeader || !field.isHeader ? field.code == currentRouteName : null"
                >
                    <div class="flex">
                        <div v-if="!field.isHeader" class="material-icons mr-2">
                            <span v-if="field.googleCode !== undefined">{{ field.googleCode }}</span>
                            <div v-else>
                                <img
                                    src="../assets/logor4gmin.png"
                                    class="w-6 h-6 cursor-pointer"
                                    alt="logo R4G"
                                />
                            </div>
                        </div>
                        <div>{{ field.label }}</div>
                    </div>
                    <div v-if="!field.isHeader">
                        <svg 
                            class="block xs:hidden transform -rotate-90 h-8 w-8 mx-2 hover:cursor-pointer"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        >
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="isMobile" class="flex justify-center pt-8">
            <button 
                class="font-bold px-4 py-2 mx-5 rounded text-white bg-gray-800 hover:bg-gray-900 active:bg-gray-900 focus:ring-gray-900"
                @click="logout()"
            >
                <div class="flex items-center">
                    <div class="text-lg mr-2">Esci</div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#fff">
                            <g><path d="M0,0h24v24H0V0z" fill="none"/></g>
                            <g><path d="M17,8l-1.41,1.41L17.17,11H9v2h8.17l-1.58,1.58L17,16l4-4L17,8z M5,5h7V3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h7v-2H5V5z"/></g>
                        </svg>
                    </div>
                </div>
            </button>
        </div>
    </div>
</template>

<script>
import Loading from '@/components/Loading';
export default {
    components: {
        Loading
    },
    props: {
        isMobile: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {
            user: {},
            isLoading: false,
            fields: [
                {
                    label: 'Impostazioni account',
                    isHeader: true
                },
                {
                    label: 'Informazioni personali',
                    code: 'account',
                    isHeader: false,
                    googleCode: 'perm_identity'
                },
                {
                    label: 'Notifiche',
                    code: 'notifications',
                    isHeader: false,
                    googleCode: 'notifications_none'
                },
                {
                    label: 'Assistenza',
                    isHeader: true
                },
                {
                    label: 'Come funziona R4G',
                    code: 'project-r4g',
                    isHeader: false
                },
                {
                    label: 'Domande frequenti',
                    code: 'faqs',
                    isHeader: false,
                    googleCode: 'help_outline'
                },
                {
                    label: 'Area legale',
                    isHeader: true
                },
                {
                    label: 'Termini di servizio',
                    code: 'ToS',
                    isHeader: false,
                    googleCode: 'event_note'
                },
                {
                    label: 'Impostazioni della privacy',
                    code: 'privacy-policy',
                    isHeader: false,
                    googleCode: 'lock_outline'
                },
            ]
        }
    },
    mounted() {
        this.user = JSON.parse(localStorage.getItem("AccessEmail"));
    },
    computed: {
        currentRouteName() {
        return this.$route.matched[1].name;
        },
    },
    methods: {    
        goToLink(link) {
        if (link.code != this.currentRouteName) {
                this.$router.push({
                    name: link.code,
                });
            }
        },
        async logout(){
            this.isLoading = true;
            try {
                await this.$axios.get("/r4g/logout");
                let keysToRemove = ["AccessEmail", "Zone", "Zones", "Bin", "BinUser"];
                keysToRemove.forEach(key => localStorage.removeItem(key));
                this.$router.push({
                    name: "login",
                });
            } catch(e) {
                this.$emit('catch-error', e);
            } finally {
                this.isLoading = false;
            }
        }
    },
}
</script>