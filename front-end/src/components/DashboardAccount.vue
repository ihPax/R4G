<template>
    <div class="
      font-montserrat
      bg-white
      xs:shadow-orangexl
      overflow-hidden
      sm:rounded-lg
      max-w-2xl
      mx-auto
      h-full
    ">
        <div class="p-4 sm:px-6 justify-center text-center border-b border-gray-200 bg-blue-50 xs:bg-white">
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Account
            </h3>
        </div>
        <div v-if="isMobile" class="flex flex-col px-4 py-2 border-b border-gray-200">
            <div class="flex items-center cursor-pointer" @click="goToLink({code: 'account'})">
                <div class="material-icons text-4xl">
                accessibility_new
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
                    <div class="material-icons">logout</div>
                </div>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        isMobile: {
            type: Boolean,
            default: false,
        }
    },
    data() {
        return {
            user: {},
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
            await this.$axios.get("/r4g/logout");
            localStorage.removeItem("AccessEmail");
            localStorage.removeItem("Zone");
            localStorage.removeItem("Zones");
            this.$router.push({
                name: "login",
            });
        }
    },
}
</script>